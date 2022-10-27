<?php
require_once('dbaccess.php');
$db = new Dbconfig();


class Demandes{

    function demandeCount(){
        global $db;
       $query = $db->connection->prepare("SELECT * FROM `demande_cong`  ");
       $query->execute();
       $rowsDemandes = $query->rowCount();
       return $rowsDemandes;
             }
    function myAllRequest(){
        $id = $_SESSION['Id'];
      global $db;
     $query = $db->connection->prepare("SELECT * FROM `demande_cong` WHERE Id=? ORDER BY `demande_cong`.`Id-D` DESC ");
     $query->execute(array($id));
     $rowsMyreq =$query->fetchAll();
     return $rowsMyreq;
         }
             
 function getAllRequest(){
    global $db;
      if(isset($_POST['search']) && !empty($_POST['search'])){
        $ppr = $_POST['search'];
        $stmt = $db->connection->prepare("SELECT * FROM ((employe INNER JOIN demande_cong ON employe.Id = demande_cong.Id) INNER JOIN service ON employe.NumS = service.NumS) WHERE PPR=? AND Statut<> ?  ORDER BY `demande_cong`.`Id-D` DESC ");
        $stmt->execute(array($ppr,'En cours'));
        return $stmt->fetchAll();
    }
     $stmt = $db->connection->prepare("SELECT * FROM ((employe INNER JOIN demande_cong ON employe.Id = demande_cong.Id) INNER JOIN service ON employe.NumS = service.NumS) WHere`Statut`= ? OR `Statut`=? ORDER BY `demande_cong`.`Id-D` DESC 
     ");
  $stmt->execute(array('accepté','refusé'));
  return $stmt->fetchAll();
 }
 function getRecentRequest(){
    global $db;
     $stmt = $db->connection->prepare("SELECT * FROM `demande_cong` INNER JOIN employe ON demande_cong.Id = employe.Id WHERE `Statut` = ? ORDER BY `demande_cong`.`Id-D` DESC ");
  $stmt->execute(array('En cours'));
  return $stmt->fetchAll();
 }
             


    function insertRequest(){
        global $db;
      
if(isset($_POST['send'])){
 
 $ID = $_SESSION['Id'];
$dateReuest = date('Y-m-d');
 $startDate = filter_var($_POST['dd'], FILTER_SANITIZE_STRING);
 $endDate = filter_var($_POST['df'], FILTER_SANITIZE_STRING);
 $holiday = filter_var($_POST['congé'], FILTER_SANITIZE_STRING);
 $date1 = date_create($startDate);
 $date2 = date_create($endDate);
          // Calculates the difference between DateTime objects
$interval = date_diff($date1, $date2);
            // Display the result
 $holidayDays = (int)$interval->format('%a');

if(empty($dateReuest) && empty($startDate) && empty($endDate) && empty($holiday)){
 return "Veuillez remplir tous les champs";
}elseif(empty($startDate)){
    return "Entrer la date début du congé"; 

}elseif(empty($endDate)){
    return "Entrer la date fin du congé";
    
    }elseif( empty($holiday) ){
        return "Entrer type de congé";
    }else{
         $stmt = $db->connection->prepare("INSERT INTO `demande_cong` (`Date-D`,`Date-D-D`,`Date-F-D`, `Nbr-J-C`, `Type-cong`,`Id`) VALUES (?,?,?,?,?,?)");
         $stmt->execute(array($dateReuest,$startDate,$endDate,$holidayDays,$holiday,$ID));
             if($stmt){
                
             return "Vous Avez". ' '. $holidayDays .' '." Jours Dans Vos Vacances";
             }else{
             return "Not insert success";
  
        
 }  
}
}
}  

function getDataRequestUser(){
    if(isset($_GET['id_dem'])){
    global $db;
    $idUser= $_GET['id_dem'];
     $stmt = $db->connection->prepare("SELECT * FROM ((employe INNER JOIN demande_cong ON employe.Id = demande_cong.Id) INNER JOIN service ON employe.NumS = service.NumS) WHere`demande_cong`.`Id-D` = ?
     ");
  $stmt->execute(array($idUser));
  return $stmt->fetch();
    }
 }

 function UpdateDataRequestUser(){
                
  global $db;
  if(isset($_POST['send'])){
     $id = $_POST['idDem'];
     $status = filter_var($_POST['statut'], FILTER_SANITIZE_STRING);

if(empty($status)){
 return "Veuillez remplir Statut";
}else{ 
     $stmt = $db->connection->prepare("UPDATE `demande_cong` SET `Statut`= ?  WHERE `Id-D`= ?");
     $stmt->execute(array($status,$id));
        if($stmt){
            header("location:demandeRecente.php");
         }else{
               return "Not insert success";
}      
}
}
  }






} //END class