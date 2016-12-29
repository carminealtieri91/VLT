<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'model/Utente.php';
include_once 'gestoreProfilo.php';
$gestoreProfilo = new gestoreProfilo();
$utente = $gestoreProfilo->recuperaProfilo($_SESSION['utenteLoggato']);
$medFeed = $utente->getMediaFeedback();

?>

<div class="riga">
    <span class="cella"> 
        <img src="Immagini/user.png" width="150px" height="150px">
    </span>
</div>
<div class="riga">
    <span class="cella">
        <?php 
                        
            $y=20;
            for($x=0; $x<5; $x++){
                if($medFeed>=$y){
                    echo "<span class='stella'><img src='../Immagini/stellaPiena.png' width='32px' height='28px'></span>";
                }
                else{
                    echo "<span class='stella'><img src='../Immagini/stellaVuota.png' width='32px' height='28px'></span>";
                }
                $y+=20;
            }
                      
        ?>
    </span>
</div>
<div class="riga"> 
    <span class="cella"><?php echo $medFeed ?> % feedback positivi</span>
</div>