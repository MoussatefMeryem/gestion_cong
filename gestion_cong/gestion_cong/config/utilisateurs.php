<?php
require_once('dbaccess.php');
$db = new Dbconfig();


class Utilisateur{

 function getAllUsers(){
    global $db;
     $stmt = $db->connection->prepare("SELECT * FROM `service` INNER JOIN employe ON service.NumS = employe.NumS ORDER BY `employe`.`Id` DESC ");
  $stmt->execute();
  return $stmt->fetchAll();
 }

    function insertUsers(){
        global $db;
      
if(isset($_POST['send'])){
 
 $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
 $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
 $ppr = filter_var((int)$_POST['ppr'], FILTER_VALIDATE_INT);
 $cin = filter_var($_POST['cin'], FILTER_SANITIZE_STRING);
 $adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_STRING);
 $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
 $sexe = filter_var($_POST['sexe'], FILTER_SANITIZE_STRING);
 $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
$service = filter_var($_POST['service'], FILTER_VALIDATE_INT);

if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['cin']) && empty($_POST['adreese']) && empty($_POST['tel']) && empty($_POST['sexe']) && empty($_POST['type']) && empty($_POST['service'])){
 return "Veuillez remplir tous les champs";
}elseif( empty($_POST['nom']) ){
    return "Enter Nom";

}elseif( empty($_POST['prenom']) ){
    return "Enter prenom";


}elseif(empty($_POST['ppr'])){
    return "Enter PPR";

}elseif(empty($_POST['cin'])){
    return "Enter Cin"; 

}elseif(empty($_POST['adresse'])){
    return "Enter Adreese";
    
    }elseif( empty($_POST['tel']) ){
        return "Enter Numéro Telephone";
    
    
    }elseif(empty($_POST['sexe'])){
        return "Enter sexe";
    
    }elseif(empty($_POST['type'])){
        return "Enter type";
        
    }elseif(empty($_POST['service'])){
        return "Enter service";
        
    }elseif(filter_var($ppr, FILTER_VALIDATE_INT)== false){
        return "Enter PPR comme un nombre";
        
    }else{
        $query = $db->connection->prepare("SELECT * FROM employe WHERE PPR = ? OR Cin = ?");
        $query->execute(array($ppr,$cin));
         $data = $query->fetch();
         $rows = $query->rowCount();
        if($rows > 0){
             return 'PPR OU CIN déja existe';
          }else{
        $stmt = $db->connection->prepare("INSERT INTO `employe` (`PPR`,`Cin`,`Nom`, `Prenom`, `Adresse`,`Tel`, `Sexe`, `Type`, `NumS`) VALUES (?,?,?,?,?,?,?,?,? )");
        $stmt->execute(array($ppr,$cin,$nom,$prenom,$adresse,$tel,$sexe,$type,$service));
            if($stmt){
            return "Insert success";
            }else{
            return "Not insert success";
 }
 }  
}
}
}  

     function editUserget(){
        global $db;
  if(isset($_GET['ppr_user'])){
  
      $user_ppr = $_GET['ppr_user'];
  $stmt = $db->connection->prepare("SELECT * FROM `service` INNER JOIN employe ON service.NumS = employe.NumS  WHERE PPR=? ");
  $stmt->execute(array($user_ppr));
  return $stmt->fetch();
  }  
     }

 function editUserpost(){
                
  global $db;
  if(isset($_POST['send'])){
    $id = $_POST['id'];
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
    $ppr = filter_var((int)$_POST['ppr'], FILTER_VALIDATE_INT);
    $cin = filter_var($_POST['cin'], FILTER_SANITIZE_STRING);
    $adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_STRING);
    $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
    $sexe = filter_var($_POST['sexe'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
     $service = filter_var($_POST['service'], FILTER_SANITIZE_STRING);
   
   if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['cin']) && empty($_POST['adreese']) && empty($_POST['tel']) && empty($_POST['sexe']) && empty($_POST['type']) && empty($_POST['service'])){
    return "Veuillez remplir tous les champs";
   }elseif( empty($_POST['nom']) ){
       return "Enter Nom";
   
   }elseif( empty($_POST['prenom']) ){
       return "Enter prenom";
   
   
   }elseif(empty($_POST['ppr'])){
       return "Enter PPR";
   
   }elseif(empty($_POST['cin'])){
       return "Enter Cin";
   
   }elseif(empty($_POST['adresse'])){
       return "Enter Adreese";
       
       }elseif( empty($_POST['tel']) ){
           return "Enter Numéro Telephone";
       
       
       }elseif(empty($_POST['sexe'])){
           return "Enter sexe";
       
       }elseif(empty($_POST['type'])){
           return "Enter type";
           
       }elseif(empty($_POST['service'])){
           return "Enter service";
           
       }elseif(filter_var($ppr, FILTER_VALIDATE_INT)== false){
           return "Enter PPR comme un nombre" ;
           
       }else{
          
           $stmt = $db->connection->prepare("UPDATE `employe` SET `PPR`= ? ,`Cin`= ?,`Nom`= ?,`Prenom`= ?,`Adresse`= ? ,`Tel`= ?,`Sexe`= ?,`Type`= ? ,`NumS`= ?  WHERE `Id`= ?");
           $stmt->execute(array($ppr,$cin,$nom,$prenom,$adresse,$tel,$sexe,$type,$service,$id));
               if($stmt){
                header("location:afficherUtilisateurs.php");
               }else{
               return "Not insert success";
}      
}
}
  }


function emploiCount(){
    global $db;
   $query = $db->connection->prepare("SELECT * FROM `employe` ");
   $query->execute();
   $rowsUsers = $query->rowCount();
   return $rowsUsers;
         }


function myAccount(){
        global $db;
      $user_ppr = $_SESSION['ppr'];
      $stmt = $db->connection->prepare("SELECT * FROM `service` INNER JOIN employe ON service.NumS = employe.NumS  WHERE PPR=? ");
      $stmt->execute(array($user_ppr));
      return $stmt->fetch();
      }  
         



} //END class