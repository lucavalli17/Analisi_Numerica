<html>
    <meta charset="utf-8">
    <title> Convertitore numeri - parola</title>
    <meta name="generator" content="AlterVista - Editor HTML"/>
   	<body bgcolor=#82e0aa>
    <style>
        .container{
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
        tr{
            border-radius: 5px;
        }
        td{
            border-radius: 5px;
            text-align: center;
        }
        table{
            border-radius: 5px;
        }
        input{
            border-radius: 5px;
        }
    </style>
    <head>
    	<div class="container" style="text-align: left;">
			<a class="img"> 
				<img src="http://britta.altervista.org/img/britta_altervista_definitivo.png" alt="Logo sito" width="158" height="42" /> 
			</a>
		</div>
    </head>
    <?php
        if(isset($_POST['submit'])){
            $numero = $_POST['numero'];
            $lunghezza = strlen($numero);
            $unità = [0,1,2,3,4,5,6,7,8,9];
            $unità_lettere = ["zero", "uno", "due", "tre", "quattro", "cinque", "sei", "sette", "otto", "nove"];
            $decine = [0,10,20,30,40,50,60,70,80,90];
            $decine_lettere = ["zero","dieci", "venti", "trenta", "quaranta", "cinquanta", "sessanta", "settanta", "ottanta", "novanta"];
            $numeri_eccezioni = [0,11,12,13,14,15,16,17,18,19,100,1000];
            $lettere_eccezioni = ["zero", "undici", "dodici", "tredici", "quattordici", "quindici", "sedici", "diciassette", "diciotto", "diciannove", "cento", "mille"];       
            
            # CONTROLLO DELL'INPUT #
            if ($numero < 0 OR $numero > 1000){
                echo '<script> alert ("ATTENZIONE: non hai rispettato le richieste, riprova!") </script>';
            }

            # CONTROLLO SUBITO SE IL NUMERO E' ECCEZIONALE #
            if ($posizione = array_search($numero, $numeri_eccezioni)){
                $risultato = $lettere_eccezioni[$posizione];
            } 
            
            else{
        
                # NUMERO COMPRESO TRA ZERO E NOVE #
                if ($lunghezza == 1){

                    # NUMERO = 0 #
                    if($numero==0){
                        $risultato="zero";
                    }

                    # NUMERO COMPRESO TRA 1 E 9 #
                    elseif ($posizione = array_search($numero, $unità)){
                        $risultato = $unità_lettere[$posizione];
                    }
                }

                # NUMERO COMPRESO TRA 10 E 99 #
                elseif ($lunghezza == 2){
                    $prima_cifra = substr($numero, 0, 1);
                    $seconda_cifra = substr($numero, 1, 1);

                    # CONTROLLO SE IL NUMERO HA COME ULTIMA CIFRA 1 O 8 #
                    if ($seconda_cifra == 1 OR $seconda_cifra == 8){
                        $risultato = substr($decine_lettere[$prima_cifra], 0, strlen($decine_lettere[$prima_cifra])-1).$unità_lettere[$seconda_cifra];
                    }

                    # CONTROLLO SE IL NUMERO E' 10 O UN SUO MULTIPLO #
                    elseif($posizione = array_search($numero, $decine)){
                        $risultato = $decine_lettere[$posizione];
                    }

                    # CONTROLLO SE IL NUMERO SI TROVA TRA 11 E 19 (FANNO TUTTI ECCEZIONE) #
                    elseif ($numero > 10 AND $numero < 20 AND $posizione = array_search($numero, $numeri_speciali_2)){
                        $risultato = $speciali_2[$posizione];
                    }

                    elseif ($numero > 20){ 
                        $risultato = $decine_lettere[$prima_cifra].$unità_lettere[$seconda_cifra]; 
                    }
                }

                # NUMERO TRA 100 E 999 #
                elseif ($lunghezza == 3){
                    $prima_cifra = substr($numero, 0, 1);
                    $seconda_cifra = substr($numero, 1, 1);
                    $terza_cifra = substr($numero, 2, 1);

                    # CONTROLLO SE IL NUMERO HA COME ULTIMA CIFRA 1 O 8 #
                    if(($terza_cifra == 1 OR $terza_cifra == 8) AND $posizione = array_search($prima_cifra, $unità)){
                        $risultato = $unità_lettere[$posizione]."cento".substr($decine_lettere[$seconda_cifra], 0, strlen($decine_lettere[$seconda_cifra])-1).$unità_lettere[$terza_cifra];
                    }
                    
                    # CONTROLLO SE IL NUMERO E' MULTIPLO DI 100 #
                    elseif ($seconda_cifra == 0 AND $terza_cifra == 0 AND $posizione = array_search($prima_cifra, $unità)){
                        $risultato = $unità_lettere[$posizione]."cento";
                    }

                    # CONTROLLO SE IL NUMERO E' COMPRESO TRA 101 E 199 (caso particolare, non va nulla dopo "- cento") #
                    elseif($numero > 100 AND $numero < 200 AND $posizione = array_search($prima_cifra, $unità)){
                        $risultato = "cento".$decine_lettere[$seconda_cifra].$unità_lettere[$terza_cifra];
                    }

                    elseif($numero > 200 AND $posizione = array_search($prima_cifra, $unità)){
                        $risultato = $unità_lettere[$posizione]."cento".$decine_lettere[$seconda_cifra].$unità_lettere[$terza_cifra];
                    }
                    

                }
            }
        }    
        $NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
        //$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioè il nome di questo file.
            echo '<form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
            echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
            echo '	    <tr>';
            echo '          <td colspan="2" align="center"> <b>Convertitore da numero a lettere (<u>NUMERO COMPRESO TRA 0 E 1000</u>)</b> </td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td>Inserisci il numero da trasformare</td>';
            echo '          <td><input type="text" name="numero" size="150" value="'.$_POST['numero'].'"/></td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td>Numero in lettere</td>';
            echo '          <td><input type="text" name="numero_trasformato" size="150" value="'.$risultato.'"/></td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td colspan="2" align="center"><input type="submit" name="submit" value="Invia"/> 
                            <input type="reset" value="Reset"> </td>';
            echo '	    </tr>';
            echo '  </table>';
            echo '</form>';
    ?>	
</body>
</html>