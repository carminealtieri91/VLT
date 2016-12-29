<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Errore</title>
        <style type="text/css">
            h1{
		color:brown;
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
            body{
		margin:0;
                top:0;
                left:0;
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
	</style>
    </head>
    <body>
        <?php
            include_once 'view/header.php';
        ?>
        <form>
            <fieldset>
                <legend>Errore</legend>
		<p>Non hai effettuato il Login. Effettua il Login prima di visualizzare questa pagina.</p>
                <p>Lo sviluppatore di VLT.</p>
            </fieldset>
	</form>
    </body>
</html>
