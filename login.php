<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style type="text/css">
            #content{  
                margin-top: 10px; 
                background: lightgray;
                background:transparent;
                width:100%;}
            body{
                margin:0;
    		width:100%;
    		height:100%;
                font-family:serif;
                border-radius:30px;
                font-size:medium;}
            input{
            	border-radius:30px;}
            input[type="submit"]{
		float:right; 
		margin-right:5px; 
		padding:5px;
		border-radius:30px; 
		border-color:brown; 
		background-color:white}
            input[type="reset"]{
		float:left; 
		margin-left:5px; 
		padding:5px;
		border-radius:30px; 
		border-color:brown; 
		background-color:white;}
            a{
                text-decoration:none; 
		color:black; 
		font-style:italic;}
            #tavola2{
                display:table;
                width:auto;
                height:50%;
                margin-left: auto;
                margin-right:auto;
                margin-top:30px;
                text-align:left;
            }
            fieldset{
                border-color: brown;
                border-radius:30px;
            }
            legend{
                margin-left:120px;
            
            }
            div.righe{
                display:table-row;
                text-align:left;
            }
            span.celle{
                display:table-cell;
                padding:5px;
            }
            a{ 
                text-decoration:none;
                color:brown;}	
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
		padding:5px}
            button{
		border-radius:30px; 
		border-color:brown; 
		background-color:white}
        </style>
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
			alert("L'email non puo contenere / : , ;");
			oggModulo.email.focus();
			oggModulo.email.select();
			return false;
                    }
                }
                //cerco @
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
                    alert("Email non puo terminare con un .");
                    oggModulo.email.focus();
                    return false;
                }
                if (oggModulo.password.value == "") {
                    alert("Devi inserire una password");
                    oggModulo.password.focus();
                    return false;
                }
				
                return true;
            }
        </script>
        <title>VLT Login</title>
    </head>
    <body>
        <div id="header">
            <style type="text/css">  
                body{
                    margin:0;
                    width:100%;
                    height:100%;
                    }
                #tavola{
                    display:table;
                    border:2px inset black;
                    background:white;
                    width:100%; height:100px; top:2px; left:0px;
                    position:relative;
                    }
                #tavola div{
                    display:table-row;
                    position:relative;
                    height:150px;
                    }
		span.cella2{	
                    display:table-cell;
                    width: 200px;
                    height: 50px;
                    margin: 0 auto;
                    }
                button{
                    border-radius:30px; 
                    border-color:brown; 
                    background-color:white
                    }
		button[type="submit"]{
                    margin-right:5px; 
                    padding:5px
                    }
		.arrotonda { 
                    border-radius: 10px 10px 10px 10px; 
                    width:350px;
                    }
            </style>
            <div id="tavola">
                <div>
                    <span class="cella2" style="position: absolute; top: 10px;">
                        <img src="Immagini/logo.JPG" width="180px" height="130px">
                    </span>
                    <span class="cella2" style="position: absolute; top: 100px; left: 200px">
                        <button type="submit" onclick="location.href= 'index.php'"> Homepage </button>
                    </span>
                    <span style="position:absolute; top:100px; right:30px;"> 
                        <button type="submit" onclick="location.href='registrazione.php'"> Registrati </button> 
                        <button type="submit" onclick="location.href='login.php'"> Login </button> 
                    </span>
                </div>
            </div>
        </div>
        <div id="content">
            <div id="tavola2">
                <form method="POST" action="controllaDatiLogin.php" onsubmit="return validaModulo(this);">
                    <fieldset>
			<legend>Login</legend>
			<div class="righe">
                            <span class="celle">
				<label for="mail">Email:</label> 
                            </span>
                            <span class="celle">
				<input id="mail" name="email" tabindex="1" required="" autofocus="" type="text"> 
                            </span>
			</div>

			<div class="righe">
                            <span class="celle">
				<label for="pwd">Password:</label>
                            </span> 
                            <span class="celle">
				<input id="pwd" name="pwd" tabindex="2" required="" type="password">
                            </span>
			</div>
			<div class="righe">
                            <span class="celle"> 
				<a href="recuperoCredenziali.php">Hai dimenticato la password?</a>
                            </span>
			</div>
			<div class="righe">
                            <span class="celle">
				<input id="sub" value="Accedi" tabindex="3" type="submit">
                            </span>
                            <span class="celle">
				<input id="ann" value="Annulla" tabindex="4" type="reset">
                            </span>
                        </div>
                    </fieldset>
		</form>
            </div>
        </div>
    </body>
</html>
