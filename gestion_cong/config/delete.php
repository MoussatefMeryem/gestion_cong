<?php


require_once('dbaccess.php');
$db = new Dbconfig();
class Remove {


function delete(){
    global $db;
  
      //Delete admins and users by  id
  if (isset($_GET['ppr_user'])){
  
       $id_user = $_GET['ppr_user'];
      
  $stmt = $db->connection->prepare("DELETE FROM `employe` WHERE PPR = ? ");
  $stmt->execute(array($id_user));
   if ($stmt){
      header("location:afficherUtilisateurs.php");
      exit();
   }
  }elseif(isset($_GET['id_demande'])){
  
      $id_demande = $_GET['id_demande'];
     
 $stmt = $db->connection->prepare("DELETE FROM `demande_cong` WHERE `Id-D`= ? ");
 $stmt->execute(array($id_demande));
  if ($stmt){
     header("location:afficherDemandes.php");
     exit();
  }
 }
  

}//End  delete Function

  
    } //End Class