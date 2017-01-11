<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'model/Utente.php';
include_once 'gestoreProfilo.php';
$email = $_GET['Email'];
$gestoreProfilo = new gestoreProfilo();
$utente = $gestoreProfilo->recuperaProfilo($email);
$usr = $utente->getUsername();
$em = $utente->getEmail();
$medFeed = $utente->getMediaFeedback();


if($em!=$_SESSION['utenteLoggato']){
    echo "<h1> Il profilo di ".$usr."</h1>";
}
else{
    echo "<h1> Il mio profilo </h1>";
}

?>

<div>
    <img class="immagine" src="Immagini/user.png" width="200px" height="200px">
</div>
<div id="info"> 
    <div id="riga">
        <span class="cella">
            <span style="font-weight:bold; color:brown;"> Username </span> 
            <span><?php echo "$usr" ?></span>
        </span>
    </div>
    <div id="riga">
        <span class="cella"> 
            <span id="emailUtente" style="font-weight:bold; color:brown;"> Email </span>
            <span><?php echo "$em" ?></span> 
        </span>
    </div>
    <div id="riga">
        <span class="cella"> 
            <span> 
                
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
        </span> 
    </div>
    <div id="riga">
        <span class="cella"><span>
                   <?php echo "$medFeed" ?> % feedback positivi</span></span> </div> 
</div>