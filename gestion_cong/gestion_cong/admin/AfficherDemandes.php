<?php
   require_once("../config/helper.php");
  
 
if(isset($_SESSION["admin"]) || isset($_SESSION["rh"]) ){
  require_once("../config/demande.php");

  $demandes = new Demandes();
   $getAllRequest =$demandes->getAllRequest();
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
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<div class='form_grid'>
    <div class="col-select">
  <input class='form-control' type="text" placeholder='Rechercher PPR.....'  name="search" required>
    </div>
</div>
<button style='margin-bottom:5px' class='btn' type="submit" name="send" >Rechercher</button>
</form>
     
                <div class="recentRequest">
                    <div class="cardHeader">
                        <h2>Afficher Demandes</h2>
                    </div>
<table>
  <thead>
  <tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>PPR</th> 
    <th>CIN</th>    
    <th>Type</th>
    <th>Service</th>
    <th>Date Demande</th>
    <th>Date Debut</th>
    <th>Date fin</th>
    <th>Jours Congé</th>
    <th>Status</th>
    <?php if(isset($_SESSION["admin"])){ ?>
    <th>Action</th>
    <?php } ?>
  </tr>
</thead>
<tbody>
  <?php foreach($getAllRequest as $row){ ?>
  <tr>
    <td><?php echo $row['Nom']?></td>
    <td><?php echo $row['Prenom']?></td>
    <td><?php echo $row['PPR']?></td>
    <td><?php echo $row['Cin']?></td>
    <td><?php echo $row['Type']?></td>
    <td><?php echo $row['Intitule-S']?></td>
    <td><?php echo $row['Date-D']?></td>
    <td><?php echo $row['Date-D-D']?></td>
    <td><?php echo $row['Date-F-D']?></td>
    <td><?php echo $row['Nbr-J-C']?></td>
    <td><?php if($row['Statut'] == 'accepté'){
            echo '<span class="status accepted">'.$row['Statut'].'</span>';
            }else{
              echo '<span class="status return">'.$row['Statut'].'</span>';
            } ?>
  </td>
    <?php if(isset($_SESSION["admin"])){ ?>
    <td><button class='btn-table-delete'><a href="delete.php?id_demande=<?php echo $row['Id-D'] ?>">Supprimer</a></button>
    <?php } ?>

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
  