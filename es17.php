<html>
    <meta charset="utf-8">
    <title>Convertitore coppie numeri</title>
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
        if(isset($_POST["submit"])){
            $numero = $_POST["input"];
            $output = array();
            if($numero <= 10000 OR strlen($numero)%2!=0) echo "<script> alert ('Il numero deve essere maggiore di 10000 e avere un numero pari di cifre') </script>";
            else{
                $output = array();
                for($i=0;$i<strlen($numero);$i+=2){
                    $coppia = substr($numero, $i, 2);
                    $inverso = strrev($coppia);
                    array_push($output, $inverso);
                }  
            }
            echo json_encode($output);
        }

        $NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
        //$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioè il nome di questo file.
            echo '<form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
            echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
            echo '	    <tr>';
            echo '          <td colspan="2" align="center"> Shift circolare per carattere delle coppie </td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td>Numero inserito</td>';
            echo '          <td><input type="text" name="input" size="150" value="'.$_POST["input"].'"/></td>';
            echo '       </tr>';
            echo '      <tr>';
            echo '          <td>Numero convertito</td>';
            echo '          <td><input type="text" name="output" size="150" value="'.json_encode($output).'"/></td>';
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
