<?php
   require_once("../config/helper.php");
  
 
if(isset($_SESSION["admin"]) ){
  require_once("../config/demande.php");
  $demandes = new Demandes();
   $userData =$demandes->getDataRequestUser();
   $demandes->UpdateDataRequestUser();


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

     
     <div class="form_cotainer">
      


     <h1 class='title-display'>Validé Demandes</h1>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<div class='form_grid'>
    <div class="col">
    <label for="fname">Nom</label>
  <input class='form-control' type="text"  value="<?php if(isset($userData['Nom'])){echo $userData['Nom'];}?>" disabled>
    </div>
    <div class="col">
    <label >Prenom</label>
  <input class='form-control' type="text"  value="<?php if(isset($userData['Prenom'])){echo $userData['Prenom'];}?>" disabled>
    </div>
    <div class="col">
    <label >PPR</label>
  <input class='form-control' type="text"  value="<?php if(isset($userData['PPR'])){echo $userData['PPR'];}?>" disabled>
    </div>
    <div class="col">
    <label >cin</label>
  <input class='form-control' type='text' value="<?php if(isset($userData['Cin'])){echo $userData['Cin'];}?>" disabled>
    </div>
    <div class="col">
    <label >adrresse</label>
  <input class='form-control' type="text"  value="<?php if(isset($userData['Adresse'])){echo $userData['Adresse'];}?>" disabled>
    </div>
    <div class="col">
    <label >Tel</label>
  <input class='form-control' type='tel'  value="<?php if(isset($userData['Tel'])){echo $userData['Tel'];}?>" disabled>
    </div>
    <div class="col">
    <label >service</label>
  <input class='form-control' type='text'  value="<?php if(isset($userData['Intitule-S'])){echo $userData['Intitule-S'];}?>" disabled>
</div>
    <div class="col">
    <label >type</label>
  <input class='form-control' type='text'  value="<?php if(isset($userData['Type'])){echo $userData['Type'];}?>" disabled>
</div>
<div class="col">
    <label >Date Demande</label>
  <input class='form-control' type='text'  value="<?php if(isset($userData['Date-D'])){echo $userData['Date-D'];}?>" disabled>
</div>
<div class="col">
    <label >Date Début congé</label>
  <input class='form-control' type='text'  value="<?php if(isset($userData['Date-D-D'])){echo $userData['Date-D-D'];}?>" disabled>
</div>
<div class="col">
    <label >Date fin congé</label>
  <input class='form-control' type='text'  value="<?php if(isset($userData['Date-F-D'])){echo $userData['Date-F-D'];}?>" disabled>
  <input class='form-control' type='hidden' name="idDem"  value="<?php if(isset($userData['Id-D'])){echo $userData['Id-D'];}?>" >

</div>
<div class="col">
    <label >Statut</label>
  <select class='form-control'  name="statut" required>
  <?php  if(isset($userData['Statut'])){ ?>
    <option value ="" disabled selected>Choissez un statut....</option>
   <option value ="accepté">Accepté</option>
   <option value ="refusé">Refusé</option>
            
         <?php } ?>
  </select>
    </div>
</div>
<button class='btn' type="submit" name="send" >Valider</button>
</form>
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
  