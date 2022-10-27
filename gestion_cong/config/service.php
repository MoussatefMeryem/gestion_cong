<?php  
 require_once('dbaccess.php');
 $db = new Dbconfig();

  class Services {
     
      
function getServices(){
    global $db;
   $query = $db->connection->prepare("SELECT * FROM `service` ");
   $query->execute();
   $services =$query->fetchAll();
   return $services;
         }
   
         
function serviceCount(){
  global $db;
 $query = $db->connection->prepare("SELECT * FROM `service` ");
 $query->execute();
 $rowsService = $query->rowCount();
 return $rowsService;
       }
  }

?>