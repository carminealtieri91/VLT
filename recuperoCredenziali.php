<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recupero credenziali VLT</title>
        <style type="text/css">
            #header{  
                width:100%;
            }
      
            #content{  
                margin-top: 10px; 
                background:transparent;
                width:100%; 
                text-align:center;
            }
      
      

            body{
                margin:0px;
                top:0;
                left:0;
                font-family:serif;
                border-radius:30px;
                font-size:medium;
            }
            input{
                border-radius:30px;
            }
            fieldset{
                border-radius:30px; 
                border-color:brown;
            }
            legend{
                margin-left:30px; 
            }
            #tavola5{
                display:table; 
                width:30%; 
                height:50%; 
                margin-left:auto;
                margin-right:auto;
                padding-top:35px;
            }
            div.riga{
                display:table-row; 
    
            }
   
            span.cella{
                display:table-cell; 
                padding:5px;
                width:150px;
            }
   
            input[type="submit"]{
                margin-left:50px;
                padding:5px;
                border-radius:30px; 
                border-color:brown; 
                background-color:white;
                margin-right:5px; 
      
   
            }
  
            input[type="reset"]{
  
                margin-left:30px; 
                padding:5px;
                border-radius:30px; 
                border-color:brown; 
                background-color:white;
            }
            label{
                padding:60px;
            }
  
            a{
                text-decoration:none; 
                color:brown; 
     
   
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
        <script type="text/javascript">
            function validaModulo(oggModulo) {
		if (oggModulo.email.value == "") {
                    alert("Devi inserire una email");
                    oggModulo.email.focus();
                    return false;
		} 
		var caratteriNonValidi = " /:,;"

		for (var i=0; i<caratteriNonValidi.length; i++) {
                    var noCar = caratteriNonValidi.charAt(i);
                    if (oggModulo.email.value.indexOf(noCar,0) > -1) {
			alert("L'email non può contenere / : , ;");
			oggModulo.email.focus();
			oggModulo.email.select();
			return false;
                    }
		}
		//cerchiamo @
		atPos = oggModulo.email.value.indexOf("@",1);
		if (atPos == -1){
                    alert("Devi inserire una email");
                    oggModulo.email.focus();
                    oggModulo.email.select();
                    return false;
		} 
		//ci deve essere solo un simbolo @
		if (oggModulo.email.value.indexOf("@",atPos+1) != -1) {
                    alert("Devi inserire una email");
                    oggModulo.email.focus();
                    return false;
		} 
		//cerchiamo il .
		dotPos = oggModulo.email.value.indexOf(".",atPos);
		if (dotPos == -1) {
                    alert("Devi inserire una email");
                    oggModulo.email.focus();
                    return false;
		} 
				
		dotPos=oggModulo.email.value.lastIndexOf(".");
		//aggiustare
		if (oggModulo.email.value.length - dotPos>5 || oggModulo.email.value.length - dotPos<2){
                    alert("Email non può terminare con un .");
                    oggModulo.email.focus();
                    return false;
		}
                return true;
            }
        </script>
        <?php
            include_once 'view/header.php';
        ?>
        <div id="content">
            <div id="tavola5">
                <fieldset> 
                    <legend> Recupero credenziali </legend>
                    <p> Hai dimenticato la password per accedere a VLT?<br>
                        Inserisci il tuo indirizzo email, ti invieremo un'email contenente la password,<br>
                        poi segui le istruzioni nella mail.
                    </p>
                    <form action="controllaRecuperoCredenziali.php" method="post" onsubmit="return validaModulo(this)">
			<div class="riga">
                            <span class="cella"><label for="email">Email*: </label> </span>
                            <span class="cella"><input id="email" name="email" autofocus="" required="" type="text"> </span></div>
                        <div class="riga"> 
                            <span class="cella"><input value="Invia Richiesta" type="submit"> </span>
                            <span class="cella"><input value="Annulla" type="reset"> </span> </div>
                    </form>
		</fieldset>
            </div>
	</div>
    </body>
</html>
