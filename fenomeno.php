<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start()?>

<html>
    <head>
        <title>Scopri il fenomeno: Vinyl Listening Together</title>
        <style type="text/css">
            #header{  
                width:100%;
            }
            #content{  
                margin-top: 10px; 
                background:transparent;
                width:100%; 
                text-align:left;
            }
            h1{
		color:brown;
                text-align:center;
            }
            body{
        	margin:0;
   		width:100%;
    		height:100%;
                font-family:serif;
		border-radius:30px;
		font-size:medium;
            }
            legend{
                margin-left:130px; 
            }
            fieldset{
		border-radius:30px; 
		border-color:brown;
                margin:10px;
            }	
            p{
        	text-align:center;
            }
            #registrazione{
                float:right; 
                margin-right:5px; 
                padding:5px
            }
            button[type="reset"]{
                float:left; 
                margin-left:5px; 
                padding:5px;
            }
            button[type="submit"]{
                float:right; 
                margin-left:5px; 
                padding:5px
            }
            button{
                border-radius:30px; 
                border-color:brown; 
                background-color:white
            }
	</style>
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
	<h1>Vinyl Listening Together</h1>
		<form>
			<fieldset>
				<legend>Scopri di piu'!</legend>
                                <p>
                                    Sito in costruzione!....
                                </p>
                                <p>
                                    Sito in costruzione!....
                                </p>
                                <p>
                                    Sito in costruzione!....
                                </p>
                                <p>
                                    Sito in costruzione!....
                                </p>
                                <p>
                                    Sito in costruzione!....
                                </p>
			</fieldset>
		</form>
		<div>
			<marquee scrollamount="3" scrolldelay="1" direction="right" align="middle" width="100%" height="100">
				<img src="../Immagini/vinyl-record-animation.gif" width="160" height="160" border="0">
			</marquee>
		</div>
	</div>
    </body>
</html>
