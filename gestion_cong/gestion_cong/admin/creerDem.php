<?php
require_once("../config/helper.php");
 if(isset($_SESSION["rh"]) || isset($_SESSION["salarie"]) ){
  require_once("../config/demande.php");

  $users = new Demandes();
   $msg =$users->insertRequest();


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

    <!-- 
        show session
-->
            <!-- ======================= Cards ================== -->
           

    <!-- =========== Scripts =========  -->
    <script src="../styles/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
     
     <div class="form_cotainer">
     <?php
 if(isset($msg)){
          
        if($msg == "Not insert success"){
          echo '<div class="alert">
          <strong>'.$msg.' </strong>.
          </div>';
        }else{

            echo '<div class="alert-success">
            <strong>'.$msg.' </strong>.
            </div>';        }
        

    }
  
 ?>
     <h1 class='title-display'>Créer Demande</h1>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
<div class='form_grid'>
   
    <div class="col-select">
    <label >Date de la demande</label>
  <input class='form-control'  type='text' disabled value="<?php echo date('Y-m-d') ?>"   >
    </div>
    <div class="col">
    <label >Date début du congé</label>
  <input class='form-control' type="date" placeholder='Entrer la date début du congé'  name="dd" required>
    </div>
    <div class="col">
    <label >Date fin du congé</label>
  <input class='form-control' type="date" placeholder='Entrer la date fin du congé'  name="df" required>
    </div>
    <div class="col-select">
    <label >type du congé</label>
  <select class='form-control'  name="congé" required>
  <option value=""selected disabled>Choisissez le type du congé</option>
    <option value="maladie">Maladie</option>
    <option value="administratif">Administratif</option>
  </select>
    </div>
  
</div>
<button class='btn' type="submit" name="send" >Crée</button>
</form>
     </div> 
</html>
<?php }else{
    header("location: ../index.php");
     exit();
  } ?>