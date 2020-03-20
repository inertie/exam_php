<?php
require_once '../functions/user.php';

$registernews = NULL;

if (!empty($_POST) && !empty($_POST['email'])) {
    $email = $_POST['email'];

    $registernews = registerNews($email);
}
?>

<form method="POST">
    <h3>Register me for the newsletter !</h3>
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="email">Email</label>
      <input type="text" class="form-control mb-2" id="email" name="email" placeholder="Your email...">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">SEND</button>
    </div>
  </div>
</form>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>