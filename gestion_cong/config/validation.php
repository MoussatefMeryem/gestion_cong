<?php
    
    require_once('dbaccess.php');
    $db = new Dbconfig();

  class Login extends Dbconfig{
     
       function check(){

        global $db;

           if(isset($_POST['validation'])){

                $nom =filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
                $ppr = filter_var($_POST['ppr'], FILTER_SANITIZE_STRING);

                if(empty($nom) || empty($ppr)){
                        return  "Veuillez remplir tous les champs";
                }else{
                         
                    $stmt = $db->connection->prepare("SELECT * FROM employe WHERE nom = ? and ppr = ?");
                    $stmt->execute(array($nom,$ppr));
                    $data = $stmt->fetch();
                    $rows = $stmt->rowCount();

                    if($rows > 0){
                        if($data['Type'] == 'Admin'){
     
                             $_SESSION['admin'] = 'Admin';
                             header('location: admin/dashboard.php');
                             exit();
    
                        }else{
                                
                            if($data['Type'] == 'RH'){
    
                                 $_SESSION['rh'] = 'RH';
                                 $_SESSION['ppr'] = $data['PPR'];
                                 $_SESSION['Id'] = $data['Id']; 
                                 $_SESSION['Sexe'] = $data['Sexe'];                             
                                 header('location: admin/MesDemandes.php');
                                 exit();
    
                            }else{
                                
                                $_SESSION['salarie'] = 'Salarie';
                                $_SESSION['ppr'] = $data['PPR'];
                                $_SESSION['Id'] = $data['Id'];
                                $_SESSION['Sexe'] = $data['Sexe'];
                                header('location: admin/MesDemandes.php');
                                exit();
                            }
                        }
                    }else{
                        return "introuvable";
                    }
                                         
    
                }

                
           }

    

       }
    

  }

?>