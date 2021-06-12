<?php include 'shared/header.php';

if ($_SESSION['email'] !== null && empty($_SESSION['email'])) {
    header("Location: login.php");
    exit;
  }
  $sql = "SELECT * FROM clients";
  $result = $conn->query($sql);
?>

<div class="card" style="margin: 100px 50px 100px 50px; padding: 20px;" >

    <h5 h5 class="card-title"> List of users </h5>
    <p class="card-text">
        here you can see the list of all the user in the database
    </p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Address</th>
          <th scope="col">Birthday</th>
          <th scope="col">NCCP</th>
          <th scope="col">TEL</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          
          echo
          "<tr>" .
              "<th scope=\"row\">" . $row["id"] . "</th>" .
              "<td>" . $row["firstname"] . "</td>" .
              "<td>" . $row["lastname"] . "</td>" .
              "<td>" . $row["address"] . "</td>" .
              "<td>" . $row["birthday"] . "</td>" .
              "<td>" . $row["NCCP"] . "</td>" .
              "<td>" . $row["TEL"] . "</td>" .
          "</tr>";
        }
        } else {
          echo "0 results";
        }
      ?>
      </tbody>
    </table>
</div>

<?php
  include 'shared/footer.php';
?>