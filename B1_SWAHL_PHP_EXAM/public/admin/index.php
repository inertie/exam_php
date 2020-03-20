<?php 

session_start();
if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') {
} else {
    header('Location: ../login.php');
    exit;
}

require_once '../../functions/user.php';
require_once '../../views/layout/header.php';

$users = getUsers();
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">ID</th>
      <th scope="col">Login</th>
      <th scope="col">Email</th>
      <th scope="col">Admin</th>
      <th scope="col">Active</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
      <tr>
        <td><a href="/admin/edit.php?id=<?php echo $user['ID']; ?>" class="btn btn-warning">Modify</a></td>
        <td><?php echo $user['ID']; ?></td>
        <td><?php echo $user['login']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['admin']; ?></td>
        <td>
            <?php if ($user['active'] == 1) { ?>
                <span class="badge badge-success">ACTIVATED</span>
            <?php } else { ?>
                <span class="badge badge-danger">DESACTIVED</span>
            <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>