<?php
   require_once("../config/helper.php");
  
 
if(isset($_SESSION["admin"]) ){
  require_once("../config/service.php");
  require_once("../config/utilisateurs.php");
  $services = new Services();
  $serviceData =$services->getServices();
  $users = new Utilisateur();
   $msg =$users->insertUsers();

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
 if(isset($msg)){
          
        if($msg == "Insert success"){
          echo '<div class="alert-success">
          <strong>'.$msg.' </strong>.
          </div>';
        }else{

            echo '<div class="alert">
            <strong>'.$msg.' </strong>.
            </div>';        }
        

    }
  
 ?>
    

     <h1 class='title-display'>Ajouté Utilisateur</h1>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<div class='form_grid'>
    <div class="col">
    <label for="fname">Nom</label>
  <input class='form-control' type="text" placeholder='Enter le Nom'  name="nom" required>
    </div>
    <div class="col">
    <label >Prenom</label>
  <input class='form-control' type="text" placeholder='Enter le Prenom'  name="prenom" required>
    </div>
    <div class="col">
    <label >PPR</label>
  <input class='form-control' type="text" placeholder='Enter PPR'  name="ppr" required>
    </div>
    <div class="col">
    <label >cin</label>
  <input class='form-control' type='text' placeholder='Enter Cin'  name="cin" required>
    </div>
    <div class="col">
    <label >adrresse</label>
  <input class='form-control' type="text" placeholder='Enter Adreese'  name="adresse" required>
    </div>
    <div class="col">
    <label >Tel</label>
  <input class='form-control' type='tel'  placeholder='Enter Tel'  name="tel" required>
    </div>
  
    <div class="col-select">
    <label >Genre</label>
  <select class='form-control'  name="sexe" required>
  <option disabled selected value="">choisissez Genre ...</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
  
    </div>
    <div class="col-select">
    <label >Type</label>
  <select class='form-control'  name="type" required>
  <option disabled selected value="">choisissez Type ...</option>
    <option value="admin">Admin</option>
    <option value="rh">Rh</option>
    <option value="salarie">Salarie</option>
  </select>
    </div>
    <div class="col-select">
    <label >service</label>
  <select class='form-control'  name="service" required>
  <option  disabled selected value="">choisissez Service ...</option>
    <?php foreach($serviceData as $row){ ?>
    <option value="<?php echo $row["NumS"] ?>"> <?php echo $row["Intitule-S"]?></option>
    <?php }?>
    
  </select>
    </div>
</div>
<button class='btn' type="submit" name="send" >Ajouté</button>
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
  