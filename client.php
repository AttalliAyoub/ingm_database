<?php include 'shared/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $email = test_input( $_POST["email"]);
  $password = test_input( $_POST["password"]);

  if (empty($email) || empty($password)) {
    header("Location: login.php");
    exit;
  }

  $_SESSION['email'] = $email;

} else if (!empty($_SESSION['email'])) {

} else {
  header("Location: login.php");
  exit;
}
?>

<div class="card" style="max-width: 500px; margin: 100px auto 0 auto;" >

  <div class="card-body">
    <h5 class="card-title"> Welcome <?php echo $email ?> </h5>
    <p class="card-text">
      Welcome to INGM Gestion des clients.<br>
      you can add users and see the list of users
    </p>
    <a href="ajout-client.php" class="btn btn-primary"  > Add a user </a>
    <a href="afficher-client.php" class="btn btn-primary"> See the list of users </a>
    <a href="logout.php" class="btn btn-danger">Sign Out</a>
  </div>
</div>


<?php include 'shared/footer.php'; ?>