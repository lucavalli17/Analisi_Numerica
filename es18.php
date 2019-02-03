<html>
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="/img/favicon_britta_altervista.png">
        <!-- Author Meta -->
        <meta name="author" content="Britta">
        <!-- Meta Title -->
        <meta name="title" content ="Es 18 | Targhe e numeri amici">
        <!-- Meta Description -->
        <meta name="description" content="Le targhe e i numeri amici">
        <!-- Meta Keyword -->
        <meta name="keywords" content="Numeri amici Britta NUMERI AMICI numeri amici targhe italia italiane targa TARGA NUMERI">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Es 18 | Targhe e numeri amici</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    </head>
    <style>
        .container{
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
        .pseudocodice{
            background: grey;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            height: auto;
        }
        .codice{
            background: grey;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            height: auto;
        }
        .singolo{
            color: black;
            text-align: left;
            margin-left: 50px;
            margin-right: 10px;
            font-size: 18px;
            font-family: sans-serif;
        }
        .doppio{
            color: black;
            text-align: left;
            margin-left: 90px;
            margin-right: 10px;
            font-size: 18px;
            font-family: sans-serif;
        }
        .triplo{
            color: black;
            text-align: left;
            margin-left: 120px;
            margin-right: 10px;
            font-size: 18px;
            font-family: sans-serif;
        }
        h1{
            color: white;
            text-align: center;
            font-size: 32px;
            font-family: sans-serif
        }
        h2{
            color: black;
            text-align: left;
            margin-left: 10px;
            margin-right: 10px;
            font-size: 24px;
            font-family: sans-serif;
        }
        h3{
            color: black;
            text-align: left;
            margin-left: 10px;
            margin-right: 10px;
            font-size: 18px;
            font-family: sans-serif;
        }
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
    <body bgcolor=#82e0aa>
        <div class="container" style="text-align: left;">
            <a href="http://britta.altervista.org" class="img"> 
                <img src="http://britta.altervista.org/img/britta_altervista_definitivo.png" alt="Logo sito" width="158" height="42" /> 
            </a>
        </div>
        <?php
            if(isset($_POST["submit"])){

                ####### OTTENGO I VALORI IN POST DAL FORM E TRASFORMO TUTTO IN MAIUSCOLO #######
                $targa1 = strtoupper($_POST["targa1"]);
                $targa2 = strtoupper($_POST["targa2"]);

                ####### CONTROLLO L'INPUT (DEVE ESSERE UNA TARGA IN FORMATO ITALIANO [7 CARATTERI, FORMATO LLNNNLL]) #######
                if(strlen($targa1) != 7 OR is_numeric(substr($targa1, 0, 1)) OR is_numeric(substr($targa1, 1, 1)) OR is_numeric((substr($targa1, 2, 3)))==0 OR is_numeric(substr($targa1, 5, 1))==1 OR is_numeric(substr($targa1, 6, 1))==1) echo "<script> alert ('ATTENZIONE: La prima targa non è italiana o è sbagliata') </script>";
                if(strlen($targa2) != 7 OR is_numeric(substr($targa2, 0, 1)) OR is_numeric(substr($targa2, 1, 1)) OR is_numeric((substr($targa2, 2, 3)))==0 OR is_numeric(substr($targa2, 5, 1))==1 OR is_numeric(substr($targa2, 6, 1))==1) echo "<script> alert ('ATTENZIONE: La seconda targa non è italiana o è sbagliata') </script>";
                
                else{
                    ####### DICHIARAZIONE VARIABILI DI CONTROLLO #######
                    $numero1 = substr($targa1, 2, 3);
                    $numero2 = substr($targa2, 2, 3);
                    $somma_div1 = 0;
                    $somma_div2 = 0;
                    $div1 = 0;
                    $div2 = 0;

                    ####### CONTROLLO DIVISORI PRIMA TARGA #######
                    for($i=1;$i<=$numero1-1;$i++){
                        if($numero1 % $i == 0) {
                            //echo "divisore primo numero = ".$i."<br>";
                            $somma_div1 += $i;
                            $div1++;
                        }
                    }
                    if($div1 == 1) echo "TARGA 1 --> ".$numero1." E' PRIMO <br><br>";
                    //else echo "TARGA 1 --> La somma dei divisori del numero è: ".$somma_div1."<br><br>";
                    
                    ####### CONTROLLO DIVISORI SECONDA TARGA #######
                    for($i=1;$i<=$numero2-1;$i++){
                        if($numero2 % $i == 0) {
                            //echo "divisore secondo numero = ".$i."<br>";
                            $somma_div2 += $i;
                            $div1++;
                        }
                    }
                    if($div2 == 1) echo "TARGA 2 --> ".$numero2." E' PRIMO <br>";
                    //else echo "TARGA 2 --> La somma dei divisori del numero è: ".$somma_div2."<br>";

                    ####### CONTROLLO SE RISPETTANO I CRITERI DEI NUMERI AMICI #######
                    if($numero1 == $somma_div2 OR $numero2 == $somma_div1) $output = "NUMERI AMICI (somma divisori prima targa --> ".$somma_div1." somma divisori seconda targa --> ".$somma_div2.")";
                    else $output = "NUMERI NON AMICI (somma divisori prima targa --> ".$somma_div1." somma divisori seconda targa --> ".$somma_div2.")";

                }
            }

            $NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
            //$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioè il nome di questo file.
                echo '<form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
                echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
                echo '	    <tr>';
                echo '          <td colspan="2" align="center"> Numeri amici nelle targhe italiane </td>';
                echo '      </tr>';
                echo '      <tr>';
                echo '          <td>Prima targa</td>';
                echo '          <td><input type="text" name="targa1" size="150" value="'.$_POST["targa1"].'"/></td>';
                echo '       </tr>';
                echo '      <tr>';
                echo '      <tr>';
                echo '          <td>Seconda targa</td>';
                echo '          <td><input type="text" name="targa2" size="150" value="'.$_POST["targa2"].'"/></td>';
                echo '       </tr>';
                echo '      <tr>';
                echo '          <td>Risultato</td>';
                echo '          <td><input type="text" name="output" size="150" value="'.$output.'"/></td>';
                echo '      </tr>';
                echo '      <tr>';
                echo '          <td colspan="2" align="center"><input type="submit" name="submit" value="Invia"/> 
                                <input type="reset" value="Reset"> </td>';
                echo '	    </tr>';
                echo '  </table>';
                echo '</form>';
        ?>	

        <!-- MOSTRO PSUDOCODICE -->
        <div class="pseudocodice">
            <h1>PASSAGGI<h1>
            <h2> PASSO 1: <i>TRASFORMO L'INPUT DELL'UTENTE IN MAIUSCOLO</i><h2>
            <h2> PASSO 2: <i>CONTROLLO L'INPUT (DEVE ESSERE UNA TARGA IN FORMATO ITALIANO [7 CARATTERI, FORMATO LLNNNLL])</i><h2>
            <h2> PASSO 3: <i>DICHIARAZIONE VARIABILI DI CONTROLLO</i><h2>
            <h2> PASSO 4: <i>CONTROLLO DIVISORI PRIMA TARGA</i><h2>
            <h2> PASSO 5: <i>CONTROLLO DIVISORI SECONDA TARGA</i><h2>
            <h2> PASSO 6: <i>CONTROLLO SE I VALORI OTTENUTI RISPETTANO I CRITERI DEI NUMERI AMICI</i><h2>
        </div>
        
        <!-- MOSTRO SCRIPT PHP (invertire < con > e viceversa negli alert) -->
        <div class="codice">
            <h1>CODICE PHP<h1>
            <h3>
            <br>
                $targa1 = strtoupper($_POST["targa1"]); <br>
                $targa2 = strtoupper($_POST["targa2"]); <br> <br>
                if(strlen($targa1) != 7 OR is_numeric(substr($targa1, 0, 1)) OR is_numeric(substr($targa1, 1, 1)) OR is_numeric((substr($targa1, 2, 3)))==0 OR is_numeric(substr($targa1, 5, 1))==1 OR is_numeric(substr($targa1, 6, 1))==1) echo " >script< alert ('ATTENZIONE: La prima targa non è italiana o è sbagliata') >/script<"; <br>
                <br>
                if(strlen($targa2) != 7 OR is_numeric(substr($targa2, 0, 1)) OR is_numeric(substr($targa2, 1, 1)) OR is_numeric((substr($targa2, 2, 3)))==0 OR is_numeric(substr($targa2, 5, 1))==1 OR is_numeric(substr($targa2, 6, 1))==1) echo " >script< alert ('ATTENZIONE: La seconda targa non è italiana o è sbagliata') >/script<"; <br>
                <br>
                else{ </h3>
                <h3 class="singolo">
                    $numero1 = substr($targa1, 2, 3); <br>
                    $numero2 = substr($targa2, 2, 3); <br>
                    $somma_div1 = 0; <br>
                    $somma_div2 = 0; <br>
                    $div1 = 0; <br>
                    $div2 = 0;<br>
                    <br>
                    for($i=1;$i<=$numero1-1;$i++){<br>
                        </h3>
                        <h3 class="doppio"> 
                        if($numero1 % $i == 0) {
                        </h3>
                        <h3 class="triplo">
                            //echo "divisore primo numero = ".$i; <br>
                            $somma_div1 += $i;<br>
                            $div1++;<br>
                            </h3>
                        <h3 class="doppio">
                        }<br>
                        </h3>
                    <h3 class="singolo">
                    }<br>
                    </h3>
                    <h3 class="singolo">
                    if($div1 == 1) echo "TARGA 1 --> ".$numero1." E' PRIMO";<br>
                    //else echo "TARGA 1 --> La somma dei divisori del numero è: ".$somma_div1;<br>
                    <br>
                    for($i=1;$i<=$numero2-1;$i++){<br>
                        </h3>
                        <h3 class="doppio"> 
                            if($numero2 % $i == 0) {<br>
                        <h3>
                        <h3 class="triplo">
                            //echo "divisore secondo numero = ".$i;<br>
                            $somma_div2 += $i;<br>
                            $div1++;<br>
                        </h3>
                        <h3 class="doppio">
                        }<br>
                        </h3>
                        <h3 class="singolo">
                    }<br><br>
                    if($div2 == 1) echo "TARGA 2 --> ".$numero2." E' PRIMO";<br>
                    //else echo "TARGA 2 --> La somma dei divisori del numero è: ".$somma_div2;
                    <br><br>
                    if($numero1 == $somma_div2 OR $numero2 == $somma_div1) $output = "NUMERI AMICI (somma divisori prima targa --> ".$somma_div1." somma divisori seconda targa --> ".$somma_div2.")";
                    <br><br>else $output = "NUMERI NON AMICI (somma divisori prima targa --> ".$somma_div1." somma divisori seconda targa --> ".$somma_div2.")";
                </h3>
                <h3>
                }
                </h3>
        </h3>
        </div>
    </body>
</html>
