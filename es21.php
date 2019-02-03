<html>
    <meta charset="utf-8">
    <title>ES 21 | Britta</title>
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
        $frase = strtolower($_POST["input"]);   
        $accentate = ["à","è","ì","ò","ù"];
        $apostrofate = ["a'","e'","i'","o'","u'"];
        $parole = array();
        $parole = explode(" ", $frase);
        $output = array();
        $quante_parole = count($parole);
        if(isset($_POST["submit"])){
            if($quante_parole >= 3){
                for($i=0;$i<$quante_parole;$i++){
                    $parola = $parole[$i];
                    $ultima_lettera = substr($parola, strlen($parola)-2, 2);
                    //echo "Ultima lettera --> <b>".$ultima_lettera."</b><br>";
                    if(in_array($ultima_lettera, $apostrofate)){
                        //echo "La parola <b>".$parole[$i]."</b> ha come ultima letettera una apostrofata <br>";
                        $posizione = array_search($ultima_lettera, $apostrofate);
                        //echo "Parola modificata --> ".(substr($parola, 0, strlen($parola)-2).$accentate[$posizione])."<br><br>";
                        array_push($output, (substr($parola, 0, strlen($parola)-2).$accentate[$posizione]));
                    }
                    else{
                        //echo "La parola <b>".$parole[$i]."</b> NON ha come ultima letettera una apostrofata <br>";
                        //echo "Finale non modificata <br> <br>";
                        array_push($output, $parole[$i]);
                    }
                }
            }
            else {
                echo "<script> alert('La frase deve contenere almeno 3 parole')</script>";
            }
        }
        $NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
        //$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioè il nome di questo file.
            echo '<form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
            echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
            echo '	    <tr>';
            echo '          <td colspan="2" align="center"> Trasformatore da vocali apostrofate in accentate </td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td>Frase da convertire</td>';
            echo '          <td><input type="text" name="input" size="150" value="'.$_POST["input"].'"/></td>';
            echo '       </tr>';
            echo '      <tr>';
            echo '          <td>Frase convertita</td>';
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
