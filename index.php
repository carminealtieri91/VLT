<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start()?>
<html>
    <head>
        <style type="text/css">
  		#header{  
                    width:100%;}
      		#content{  
                    margin-top: 10px; 
                    background:lightgrey;
                    width:100%; 
                    text-align:left;}
		body{
                    font-family:serif;
                    border-radius:30px;
                    font-size:medium;
                    margin:0;
                    width:100%;
                    height:100%;}
                input{
                    border-radius:30px;}
                fieldset{
                    border-radius:30px; 
                    border-color:lime;}
		legend{
                    margin-left:120px;}
                #tavola2{
                    display:table; 
                    width:40%; 
                    height:50%; 
                    margin-left:auto;
                    margin-right:auto;
                    margin-top:30px;}
                div.riga{
                    display:table-row;}
		span.cella{
                    display:table-cell; 
                    margin-left:auto;
                    margin-right:auto;
                    padding:5px;
                    padding-left:10px;}
                #registrazione{
                    float:right; 
                    margin-right:5px; 
                    padding:5px}
		button[type="reset"]{
                    float:left; 
                    margin-left:5px; 
                    padding:5px;}
                button[type="submit"]{
                    float:right; 
                    margin-left:5px; 
                    padding:5px;}
                button{
                    border-radius:30px; 
                    border-color:lime; 
                    background-color:white}
		a:link {
                    font-weight: bold;
                    color: brown;
                    text-decoration: none;}
                a:visited {
                    font-weight: bold;
                    color: red;
                    text-decoration: none;}
                a:hover {
                    font-weight: bold;
                    color: red;
                    text-decoration: underline;}
                #fenomeno{
                    border:solid black;
                    background: white;
                    border-radius:30px; 
                    position: relative;
                    display:table-cell;
                    margin-left:5px;
                    margin-top:5px;
                    text-align:center;
                    float:left;
                    min-width:40px;
                    width:calc(((100% - 610px) / 2) - 50px);}
		p{
                    font-size:large;}
                #cartina{
                    display:inline !important;}
                #disco{	
                    border:solid black;
                    background: white;
                    border-radius:30px; 
                    text-align: center; 
                    margin-right:5px;
                    margin-top:5px;
                    float:right;
                    min-width:40px;
                    width:calc(((100% - 610px) / 2) - 50px);}
                p.f1{
                    color:brown;
                    font-weight:bold;
                    font-size:x-large;}
        </style>
        <title>VLT Homepage</title>
    </head>
    <body>
        <?php 
            if(isset($_SESSION['utenteLoggato'])){
                include_once 'view/headerAreaRiservata.php';
            }
            else{
                include_once 'view/header.php';
            }
                
        ?>
        <div id="content">
            <div id="fenomeno">
		<p class="f1"> 
                    Benvenuto nel sito!.
                </p>
		<p>Per prenotarti agli eventi disponibili nel sito VLT <br> (accedi a <a href="registrazione.php">REGISTRATI</a>).</p>
		<p>Ulteriori info sul fenomeno VLT <a href="fenomeno.php">FENOMENO</a></p>
            </div>

            <div id="cartina" style="display:inline">
                <img src="Immagini/Italia.png" usemap="#regioni" width="610" height="700">
		
		<map name="regioni">
			<area shape="circle" coords="40,90,20" href="eventi.php?regione=Valle-DAosta"> <!-- Valle D'Aosta-->
			<area shape="circle" coords="65,150,35" href="eventi.php?regione=Piemonte"> <!-- Piemonte-->
			<area shape="circle" coords="160,103,28" href="eventi.php?regione=Lombardia"> <!-- Lombardia-->
			<area shape="circle" coords="110,180,9" href="eventi.php?regione=Liguria"> <!-- Liguria-->
			<area shape="circle" coords="230,58,18" href="eventi.php?regione=Trentino-Alto-Adige"> <!-- Trentino Alto Adige-->
			<area shape="circle" coords="327,73,18" href="eventi.php?regione=Fiuli-Venezia-Giulia"> <!-- Friuli Venezia Giulia-->
			<area shape="circle" coords="265,118,30" href="eventi.php?regione=Veneto"> <!-- Veneto-->
			<area shape="circle" coords="220,178,30" href="eventi.php?regione=Emilia-Romagna"> <!-- Emilia Romagna-->
			<area shape="circle" coords="225,255,35" href="eventi.php?regione=Toscana"> <!-- Toscana-->
			<area shape="circle" coords="285,280,20" href="eventi.php?regione=Umbria"> <!-- Umbria-->
			<area shape="circle" coords="335,251,18" href="eventi.php?regione=Marche"> <!-- Marche-->
			<area shape="circle" coords="300,350,25" href="eventi.php?regione=Lazio"> <!-- Lazio-->
			<area shape="circle" coords="360,328,20" href="eventi.php?regione=Abruzzo"> <!-- Abruzzo-->
			<area shape="circle" coords="395,373,17" href="eventi.php?regione=Molise"> <!-- Molise-->
			<area shape="circle" coords="413,413,22" href="eventi.php?regione=Campania"> <!-- Campania-->
			<area shape="circle" coords="495,401,22" href="eventi.php?regione=Puglia"> <!-- Puglia-->
			<area shape="circle" coords="470,444,20" href="eventi.php?regione=Basilicata"> <!-- Basilicata-->
			<area shape="circle" coords="511,520,20" href="eventi.php?regione=Calabria"> <!-- Calabria-->
			<area shape="circle" coords="389,641,20" href="eventi.php?regione=Sicilia"> <!-- Sicilia-->
			<area shape="circle" coords="110,450,28" href="eventi.php?regione=Sardegna"> <!-- Sardegna-->		
		</map>
            </div>
            <div id="disco" style="display:inline">
                <p> <img src="Immagini/vinyl-record-animation.gif" width="280px" height="280px"> </p>
            </div>
</div>
    </body>
</html>
