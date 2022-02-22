<?php
include 'Navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Employe</title>
</head>
<style>
    .Pictures{
        width: 120px
    }
</style>
<body>
<div class="container"> 

<h1>Search</h1>
            <form class="form" method="POST">
                <div>
                    <label>Search by :</label>
                    <select name="searchType">
                        <option value="Matricule">Matricule</option>
                        <option value="Nom">Nom</option>
                        <option value="Prénom">Prénom</option>
                        <option value="Département">Département</option>
                    </select>
                </div>
                <div>
                    <input id="searchInput" type="text" name="search" placeholder="Search">
                </div>
                <div>
                    <button class="submit" type="submit">Search</button>
                </div>
            </form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Département</th>
      <th scope="col">Salaire</th>
      <th scope="col">Fonction</th>
      


    </tr>
  </thead>
  <tbody>
   
    <?php
    include 'Connexion.php';
    
    
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $searchType = $_POST['searchType'];
        if($searchType == "Matricule"){
            $sql = "SELECT * FROM employe WHERE Matricule LIKE '%$search%';";
        }
        elseif($searchType == "Nom"){
            $sql = "SELECT * FROM employe WHERE Nom LIKE '%$search%';";
        }
        elseif($searchType == "Prénom"){
            $sql = "SELECT * FROM employe WHERE Prénom LIKE '%$search%';";
        }
        else{
            $sql = "SELECT * FROM employe WHERE Département LIKE '%$search%';";
        }
    }
    else{
        $sql = "SELECT * FROM employe";
    }
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td><?php echo '<img class="Pictures" src=Pictures/'. $row['Photo'] .'>';?></td>
                <td><?php echo $row['Matricule'];?></td>
                <td><?php echo $row['Nom'];?></td>
                <td><?php echo $row['Prénom'];?></td>
                <td><?php echo $row['Date'];?></td>
                <td><?php echo $row['Département'];?></td>
                <td><?php echo $row['Salaire'];?></td>
                <td><?php echo $row['Fonction'];?></td>
                
                
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>