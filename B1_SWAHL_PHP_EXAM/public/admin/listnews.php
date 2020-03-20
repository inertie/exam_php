<?php 

session_start();
if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') {
} else {
    header('Location: ../login.php');
    exit;
}

require_once '../../functions/user.php';
require_once '../../views/layout/header.php';

$email = getNews();
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($email as $em) { ?>
      <tr>
        <td><a href="/admin/delete.php?id=<?php echo $em['ID']; ?>" class="btn btn-warning">Delete</a></td>
        <td><?php echo $em['ID']; ?></td>
        <td><?php echo $em['email']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>