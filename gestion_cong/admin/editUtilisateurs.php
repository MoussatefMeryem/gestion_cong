<?php
   require_once("../config/helper.php");
  
 
if(isset($_SESSION["admin"]) ){
  require_once("../config/utilisateurs.php");
  require_once("../config/service.php");
  $services = new Services();
  $serviceData =$services->getServices();
  $users = new Utilisateur();
  $userData =$users->editUserget();
  $sendData = $users->editUserpost();

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
      
     <?php
 if(isset($sendData)){
          
        if($sendData == "Insert success"){
          echo '<div class="alert-success">
          <strong>'.$sendData.' </strong>.
          </div>';
        }else{

            echo '<div class="alert">
            <strong>'.$sendData.' </strong>.
            </div>';        }
        

    }
  
 ?>
    

     <h1 class='title-display'>Edité Utilisateur</h1>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<div class='form_grid'>
    <div class="col">
    <label for="fname">Nom</label>
  <input class='form-control' type="text" name="nom" value="<?php if(isset($userData['Nom'])){echo $userData['Nom'];}?>" required>
    </div>
    <div class="col">
    <label >Prenom</label>
  <input class='form-control' type="text" name="prenom" value="<?php if(isset($userData['Prenom'])){echo $userData['Prenom'];}?>" required>
    </div>
    <div class="col">
    <label >PPR</label>
  <input class='form-control' type="text" name="ppr" value="<?php if(isset($userData['PPR'])){echo $userData['PPR'];}?>" required>
    </div>
    <div class="col">
    <label >cin</label>
  <input class='form-control' type='text' name="cin" value="<?php if(isset($userData['Cin'])){echo $userData['Cin'];}?>" required>
    </div>
    <div class="col">
    <label >adrresse</label>
  <input class='form-control' type="text" name="adresse" value="<?php if(isset($userData['Adresse'])){echo $userData['Adresse'];}?>" required>
    </div>
    <div class="col">
    <label >Tel</label>
  <input class='form-control' type='tel' name="tel" value="<?php if(isset($userData['Tel'])){echo $userData['Tel'];}?>" required>
  <input class='form-control' type='hidden' name="id" value="<?php if(isset($userData['Id'])){echo $userData['Id'];}?>" >

    </div>
  
    <div class="col-select">
    <label >Genre</label>
  <select class='form-control'  name="sexe" required>
  <?php  if(isset($userData)){ 
         if($userData['Sexe'] == "male"){ 
          echo '<option value ="male" selected >Male</option>
             <option value ="female">Female</option>';
            }elseif($userData['Sexe'] == "female"){ 
           echo
             '<option value ="male" >Male</option>
             <option value ="female" selected >Female</option>';
            }
        }
         ?>
 
  </select>
  
    </div>
    <div class="col-select">
    <label >Type</label>
  <select class='form-control'  name="type" required>
  <?php  if(isset($userData)){ 
         if($userData['Type'] == "admin"){ 
          echo '<option value ="admin" selected >Admin</option>
             <option value ="rh">RH</option>
             <option value ="salarie">salarie</option>';
            }elseif($userData['Type'] == "rh"){ 
              echo '<option value ="admin">Admin</option>
              <option value ="rh" selected>RH</option>
              <option value ="salarie">salarie</option>';
            }else{
              echo '<option value ="admin">Admin</option>
              <option value ="rh">RH</option>
              <option value ="salarie" selected>salarie</option>';
            }
        }
         ?>
  </select>
    </div>
    <div class="col-select">
    <label >service</label>
  <select class='form-control'  name="service" required>
  <?php  if(isset($userData)){ 
         if($userData['Intitule-S'] == "informatique"){ 
          echo '<option value ="1" selected >Informatique</option>
          <option value ="2" >Administrative</option>';
            }elseif($userData['Intitule-S'] == "economique"){ 
              echo '<option value ="1">Informatique</option>
              <option value ="2" selected>economique</option>';
            }
        }
         ?>
  </select>
    </div>
</div>
<button class='btn' type="submit" name="send" >Edité</button>
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
  