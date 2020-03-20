<?php
require_once '../functions/user.php';
require_once '../views/layout/header.php';

$register = NULL;

if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $_POST['login'];

    $register = registerUser($email, $password, $login);
}
?>

<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="login">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Login">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

<?php if ($register) { ?>
  <div class="alert alert-success" role="alert">
    Account created with success.
  </div>
<?php } ?>

<?php if ($register === false) { ?>
  <div class="alert alert-danger" role="alert">
    An error occured.
  </div>
<?php } ?>

<?php
require_once '../views/layout/footer.php';
?>