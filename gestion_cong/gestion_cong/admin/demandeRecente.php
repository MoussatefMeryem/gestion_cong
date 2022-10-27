<?php
   require_once("../config/helper.php");
 
if(isset($_SESSION["admin"]) ){
  require_once("../config/demande.php");

  $demandeRecent = new Demandes();
   $recentData =$demandeRecent->getRecentRequest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../styles/assets/css/style.css"> 
    <link rel="stylesheet" href="../styles/css/mainStyle.css">


    
</head>

<body>
     <?php include_once('../includes/sidebar.php') ?>

     
<div class="details">
  <div class="recentRequest">
      <div class="cardHeader">
          <h2>Demande Recentes</h2>
      </div>
<table>
  <thead>
  <tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>CIN</th>    
    <th>Type</th>
    <th>Date Demande</th>
    <th>DateDébut</th>
    <th>Date fin</th>
    <th>Jours Congé</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php foreach($recentData as $row){ ?>
  <tr>
    <td><?php echo $row['Nom']?></td>
    <td><?php echo $row['Prenom']?></td>
    <td><?php echo $row['Cin']?></td>
    <td><?php echo $row['Type']?></td>
    <td><?php echo $row['Date-D']?></td>
    <td><?php echo $row['Date-D-D']?></td>
    <td><?php echo $row['Date-F-D']?></td>
    <td><?php echo $row['Nbr-J-C']?></td>
    <td><button class='btn-table-edit'><a href="validerDemandes.php?id_dem=<?php echo $row['Id-D'] ?>">Validé</a></button>
</td>

  
  </tr>
  <?php } ?>
</tbody>
   
</table>
</div>
</div>
    


    <!-- =========== Scripts =========  -->
    <script src="../styles/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php 
}else{
    header("location: ../index.php");
     exit();
  } 
  ?>
  