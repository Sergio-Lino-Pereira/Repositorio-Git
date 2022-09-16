<?php
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $arr["nome"] = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $arr["altura"] = filter_input(INPUT_POST,'altura',FILTER_SANITIZE_SPECIAL_CHARS);
    $arr["peso"] = filter_input(INPUT_POST,'peso',FILTER_SANITIZE_SPECIAL_CHARS);
        $imc["valor"]=$arr["peso"]/($arr["altura"]*$arr["altura"]);
        if($imc["valor"]<18.5){
            $imc["classificacao"]="MAGREZA";
            $imc["grau"]="0";
        }elseif($imc["valor"]<24.9){
        $imc["classificacao"]="NORMAL";
        $imc["grau"]="0";
        }elseif($imc["valor"]<29.9){
        $imc["classificacao"]="SOBREPESO";
        $imc["grau"]="I";
        }elseif($imc["valor"]<39.9){
        $imc["classificacao"]="OBESIDADE";
        $imc["grau"]="II";
        }else{
        $imc["classificacao"]="OBESIDADE GRAVE";
        $imc["grau"]="III";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>IMC</title>
</head>
<body>
    <?php
    if(isset($imc["valor"])){
        echo "<h3>o usuario ".$arr["nome"]." com peso ".$arr["peso"]." e altura ".$arr["altura"]."</h3>";
        echo "<h3>foi classificado como ".$imc["classificacao"].", (IMC - ".$imc["valor"].")"." grau de obesidade ".$imc["grau"]."</h3>"; 
    }
    ?>
<form method = "POST" action = "<?php echo $_SERVER["PHP_SELF"];?>">
Nome: <input type="text" name="nome"><br>
Altura: <input type="int" name="altura"><br>
Peso: <input type="int" name="peso"><br>
<input type="submit">
</form>
</body>
</html>