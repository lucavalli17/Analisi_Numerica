<html>
    <meta charset="utf-8">
    <title>Convertitore speculare</title>
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
        $frase = $_POST["input"];   
        $parole = array();
        $parole = explode(" ", $frase);
        $output = array();
        $quante_parole = count($parole);
        for ($i=0;$i<$quante_parole;$i++){
            $parola = $parole[$i];
            $inverso = strrev($parola);
            array_push($output, $inverso);
        }
        $NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
        //$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioè il nome di questo file.
            echo '<form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
            echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
            echo '	    <tr>';
            echo '          <td colspan="2" align="center"> Shift circolare per parola </td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td>Parola da convertire</td>';
            echo '          <td><input type="text" name="input" size="150" value="'.$_POST["input"].'"/></td>';
            echo '       </tr>';
            echo '      <tr>';
            echo '          <td>Parola convertita</td>';
            echo '          <td><input type="text" name="output" size="150" value="'.implode(" ",$output).'"/></td>';
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
