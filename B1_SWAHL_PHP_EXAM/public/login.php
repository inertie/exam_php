<?php
require_once '../functions/db.php';
require_once '../views/layout/header.php';

$pdo = getPdo();
$login = "";
$error = false;

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login = :login";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'login' => $login
    ]);

    $tab = $stmt->fetch(PDO::FETCH_ASSOC);

    if($tab && password_verify($password, $tab['password']) && $tab['admin'] == 0) {
        $_SESSION['state'] = 'connected';
        $_SESSION['role'] = $tab['admin'];
        header('Location: /index.php');
        exit;
    } elseif ($tab['admin'] == 1) {
        $_SESSION['state'] = 'connected';
        $_SESSION['role'] = $tab['admin'];
        header('Location: /admin/index.php');
        exit;
    } else {
        $error = true;
    }
}

?>

<form method="POST">
    <div class="form-group col-md-6">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Login">
    </div>
    <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
        <button type="submit" class="btn btn-primary">Log in</button>
</form>

<?php if ($error) { ?>
    <div class="alert alert-danger" role="alert">
        Wrong login and/or password.
    </div>
<?php } ?>

<?php require_once '../views/layout/footer.php'; ?>