<?php include 'shared/header.php';

$email = $_SESSION['email'];

if (!empty($email)) {
  header("Location: client.php");
  exit;
}
echo $email;

?>
 

<div class="card" style="max-width: 500px; margin: 100px auto 0 auto;" >
<form class="card-body" method="POST" action="client.php">
  <!-- Email input -->

      <img class="mb-4 center"
            src="https://ft.univ-boumerdes.dz/images/logo.png"
            style="width: 250px; height: 90px; margin: auto; display: block;" />

  <div class="form-outline mb-4">
    <input type="email" name="email" id="form1Example1" class="form-control" />
    <label class="form-label" for="form1Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4"    >
    <input type="password" name="password" id="form1Example2" class="form-control" />
    <label class="form-label" for="form1Example2">Password</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
</form>
</div>

<?php include 'shared/footer.php'; ?>