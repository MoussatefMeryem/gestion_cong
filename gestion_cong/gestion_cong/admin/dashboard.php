<?php
require_once("../config/helper.php");
   if(isset($_SESSION["admin"])  ){
    require_once("../config/utilisateurs.php");
    require_once("../config/service.php");
    require_once("../config/demande.php");
    require_once("../config/demande.php");

   $countUsers = new Utilisateur();
   $totalUsers = $countUsers->emploiCount();  
   $countUsers = new Services();
   $totalService = $countUsers->serviceCount(); 
   $countDemande = new Demandes();
   $totalDemandes = $countDemande->demandeCount();    
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
</head>

<body>
     <?php include_once('../includes/sidebar.php') ?>

    <!-- 
        show session
-->
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php if(isset($totalUsers)){ echo $totalUsers; }?></div>
                        <div class="cardName">Nombre Employés</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php if(isset($totalDemandes)){ echo $totalDemandes; }?></div>
                        <div class="cardName">Nombre demandes</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="document"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php if(isset($totalService)){ echo $totalService; }?></div>
                        <div class="cardName">Services</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="list"></ion-icon>
                    </div>
                </div>

                
            </div>
            <!-- ================ demande Details List ================= -->
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
<?php }else{
    header("location: ../index.php");
     exit();
  } ?>