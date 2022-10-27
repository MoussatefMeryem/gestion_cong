<?php
   require_once("../config/helper.php");
   if(isset($_SESSION["rh"]) || isset($_SESSION["salarie"]) ){
    require_once("../config/utilisateurs.php");
  
    $MyAccount = new Utilisateur();
    $MyAcountData =$MyAccount->myAccount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../styles/assets/css/style.css">
    <link rel="stylesheet" href="../styles/css/mainStyle.css">

</head>

<body>
        <!-- Call SideBar from folder includes -->
     <?php include_once('../includes/sidebar.php') ?>

    <!-- 
        show session
-->
<div class="form_cotainer">  
         <h2 class='profile-title'>Profile</h2>
<div class="profile">
<?php if(isset($_SESSION['Sexe']) && $_SESSION['Sexe'] == 'male'){
    echo '<img src="../styles/images/avatar.png" alt="Avatar" style="width:200px;border-radius:50%">';
}else{
    echo '<img src="../styles/images/avatar2.png" alt="Avatar" style="width:200px;border-radius:50%">';

} 
?>

<h2><?php if(isset($_SESSION['Sexe']) && $_SESSION['Sexe'] == 'male'){echo 'M';}else{echo 'Mme';} ?> <?php if(isset($MyAcountData['Nom'])){echo $MyAcountData['Nom'].' '. $MyAcountData['Prenom'];}?></h2>
</div>
 <div class='profile-container'>
    <span>Nom: <?php if(isset($MyAcountData['Nom'])){echo $MyAcountData['Nom'];}?></span> <br>
    <span>Prenom: <?php if(isset($MyAcountData['Prenom'])){echo $MyAcountData['Prenom'];}?> </span> <br>
    <span>PPR: <?php if(isset($MyAcountData['PPR'])){echo $MyAcountData['PPR'];}?></span> <br>
    <span>Cin: <?php if(isset($MyAcountData['Cin'])){echo $MyAcountData['Cin'];}?></span> <br>
    <span>Service: <?php if(isset($MyAcountData['Intitule-S'])){echo $MyAcountData['Intitule-S'];}?> </span>

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
  