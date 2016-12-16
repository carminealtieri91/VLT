<?php

include 'gestoreProfilo.php';

$email=$_POST['email']; 
$pwd=$_POST['pwd']; 

$gestoreProfilo = new gestoreProfilo();
 
if($gestoreProfilo->login($email, $pwd)){
    header("Location: index.php");
}
else{
    echo 'Login incorretto. Utente non trovato.<br>Assicurati di aver inserito correttamente le credenziali.<br>Tra 10 secondi verrai ridiretto alla pagina di login...';
    echo '<script type="text/javascript">window.setTimeout(function(){document.location.href="login.php";}, 10000);</script>';
}
 

