<?php
   require_once("../config/helper.php");
  
 
if(isset($_SESSION["rh"]) || isset($_SESSION["salarie"]) ){
  require_once("../config/demande.php");

  $MyRequest = new Demandes();
  $AllMyRequest =$MyRequest->myAllRequest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Demandes</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../styles/assets/css/style.css"> 
    <link rel="stylesheet" href="../styles/css/mainStyle.css">


    
</head>

<body>
     <?php include_once('../includes/sidebar.php') ?>

     
<div class="details">
                <div class="recentRequest">
                    <div class="cardHeader">
                        <h2>Mes Demandes</h2>
                    </div>
<table>
  <thead>
  <tr>
  
    <th>date Demande</th>
    <th>date Debut</th>
    <th>date fin</th>
    <th>Jours Congé</th>
    <th>Statut</th>
  </tr>
</thead>
<tbody>
  <?php foreach($AllMyRequest as $row){ ?>
  <tr>
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
  