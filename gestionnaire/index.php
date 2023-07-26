<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `taches`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Gestion de taches</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="text-center">
              <a class="navbar-brand" href="#">Navbar</a>
            </div>
          </nav>
          <h1 class="text-center">Gestionnaire de tâche</h1></br>
          <div class="row"></div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tâches à faire</th>
                <th scope="col">Terminer</th>
                <th scope="col">Supprimer</th>
              </tr>
            </thead>
            <?php
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tbody>
              <tr>
                <th scope="row"><?= $row['id']?></th>
                <td><?= $row['titre']?></td>
                <td><a href=""><button type="button" class="btn btn-success">Terminer</button></a>
                </td>
                <td><a href="delete.php?id=<?= $row['id'];?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
                </td>
              </tr>
              <?php 
}
}?>
            </tbody>
          </table>
          <a href="formulaire.html"><button type="button" class="btn btn-primary">Ajouter</button></a>
    </div>
</body>
</html>
