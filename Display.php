<?php
include 'Navbar.php';
include 'Connexion.php';
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
<table class="table">
  <thead>
    <tr>
      <th scope="col" >Photo</th>
      <th scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Département</th>
      <th scope="col">Salaire</th>
      <th scope="col">Fonction</th>
      
      <th scope="col" style="width: 500px;">Edit/delete</th>


    </tr>
  </thead>
  <tbody>
    <?php
        $sql="Select * from `employe`";
        $result=mysqli_query($con,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $Photo=$row['Photo'];
                $Matricule=$row['Matricule'];
                $Nom=$row['Nom'];
                $Prénom=$row['Prénom'];
                $Date=$row['Date'];
                $Département=$row['Département'];
                $Salaire=$row['Salaire'];
                $Fonction=$row['Fonction'];
                

                echo '<tr>
                <td> <img class="Pictures" src=Pictures/'.$Photo.'></td>
                <th scope="row">'.$Matricule.'</th>
                <td>'.$Nom.'</td>
                <td>'.$Prénom.'</td>
                <td>'.$Date.'</td>
                <td>'.$Département.'</td>
                <td>'.$Salaire.'</td>
                <td>'.$Fonction.'</td>
                
                <td>
                <button class="btn btn-primary"><a href="Update.php?updateMatricule='. $row['Matricule'] .'" class="text-light" >Update</a></button>
                <button class="btn btn-danger" onclick="myFunction()" ><a href="Delete.php?Matricule='. $row['Matricule'] .'" class="text-light"  >Delete</a></button>
                </td>
              </tr>';
            }
        }
    ?>
    <script>
      function myFunction() {
  alert("Are You Sure About That ??");
}
    </script>

    
  </tbody>
</table>
    </div>
    
</body>
</html>