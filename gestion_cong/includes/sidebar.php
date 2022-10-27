<!-- =============== Navigation ================ -->

<div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="people"></ion-icon>
                        </span>
                        <span class="title">Gestion Congés</span>
                    </a>
                </li>
                <?php if( isset($_SESSION["admin"]) ){ ?>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
               
                </li>
               
                    <li>
                    <a href="ajouterUtilisateurs.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Crée Utilisateur</span>
                    </a>
                    
                </li>
                <li>
                    <a href="afficherUtilisateurs.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Afficher Utilisateurs</span>
                    </a>
                    
                </li>
                <li>
                    <a href="demandeRecente.php">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Demande Recentes</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isset($_SESSION["admin"]) || isset($_SESSION["rh"])){ ?>

                <li>
                    <a href="afficherDemandes.php">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Afficher Demandes</span>
                    </a>
                </li>
                <?php } ?>

         

         <?php if(isset($_SESSION["rh"]) || isset($_SESSION["salarie"]) ){ ?>

                <li>
                    <a href="creerDem.php">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Creé demande</span>
                    </a>
                </li>
                <li>
                    <a href="MesDemandes.php">
                        <span class="icon">
                            <ion-icon name="folder-open-outline"></ion-icon>
                        </span>
                        <span class="title">Mes demandes</span>
                    </a>
                </li>
               
                <li>
                    <a href="MonCompte.php">
                        <span class="icon">
                            <ion-icon name="options-outline"></ion-icon>
                        </span>
                        <span class="title">Mon Compte</span>
                    </a>
                </li>
             <?php } ?>
                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Déconnecter</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>