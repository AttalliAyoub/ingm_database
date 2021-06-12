<?php include 'shared/header.php';

if ($_SESSION['email'] !== null && empty($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$add_user_error = $_SESSION['add_user_error'];
$_SESSION['add_user_error'] = null;

if ($add_user_error)
echo "you have to fill all the fields";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $firstname = test_input( $_POST["firstname"]);
    $lastname = test_input( $_POST["lastname"]);
    // $birthday = date("Y-m-d",strtotime(test_input( $_POST["birthday"])));
    $birthday = test_input( $_POST["birthday"]);
    $address = test_input( $_POST["address"]);
    $nccp = test_input( $_POST["nccp"]);
    $tel = test_input( $_POST["tel"]);

    if (
    empty($firstname) ||
    empty($lastname) ||
    empty($birthday) ||
    empty($address) ||
    empty($nccp) ||
    empty($tel)
    ) {
        $_SESSION['add_user_error'] = TRUE;
      header("Location: ajout-client.php");
      exit;
    }

    $sql = "INSERT INTO clients (firstname, lastname, address, birthday, NCCP, TEL)
            VALUES ('$firstname', '$lastname', '$address', '$birthday', '$nccp', '$tel')";
    if ($conn->query($sql) === TRUE) {
        echo "the user named $firstname $lastname is added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}



?>
 
<div class="card" style="max-width: 500px; margin: 50px auto 0 auto;" >
<form class="card-body" method="POST">

    <h5 class="card-title"> Add new user </h5>
    <p class="card-text">
        put the new user information
    </p>

  <div class="form-outline mb-4">
    <input name="firstname" class="form-control" />
    <label class="form-label" for="form1Example1">First Name</label>
  </div>


  <div class="form-outline mb-4">
    <input name="lastname" class="form-control" />
    <label class="form-label" for="form1Example1">Last Name</label>
  </div>
  
    <div class="form-outline datepicker mb-4">
        <input type="date" name="birthday" class="form-control"/>
        <!-- <label for="exampleDatepicker1" class="form-label">Birth Day</label> -->
    </div>

  <div class="form-outline mb-4">
    <input name="address" class="form-control" />
    <label class="form-label" for="form1Example1">Address</label>
  </div>

  <div class="form-outline mb-4">
    <input name="nccp" class="form-control" />
    <label class="form-label" for="form1Example1">CCP</label>
  </div>


  <div class="form-outline mb-4">
    <input name="tel" class="form-control" />
    <label class="form-label" for="form1Example1">Phone</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block">Add</button>
</form>
</div>

<?php include 'shared/footer.php'; ?>