<?php
require_once 'Less.php';

$parser = new Less_Parser();
$parser->parse( '@color: #4D926F; #header { color: @color; } h2 { color: @color; }' );
$cssText = $parser->getCss();

//echo $css;

//echo "<br/>";
$strColor = isset($_POST['color'])?$_POST['color']:"#0f7";
$strSize = isset($_POST['size'])?$_POST['size']:"1em";

var_dump($_POST);

$strCss = "@color:$strColor; @fontsize:$strSize;";
$parser = new Less_Parser();
$strFileText = file_get_contents('style.less');
//echo $strFileText;
$strConcatText = $strCss . " " . $strFileText;
//echo $strConcatText;
$parser->parse($strConcatText);
//$parser->parseFile( 'style.less', 'http://example.com/mysite/' );
$css = $parser->getCss();

//echo $css;

$fichero = 'style.css';
// Abre el fichero para obtener el contenido existente
//$actual = file_get_contents($fichero);
// Añade una nueva persona al fichero
//$actual .= "John Smith\n";
// Escribe el contenido al fichero
file_put_contents($fichero, $css);
?>

<html>
<head>
	<link rel="stylesheet" media="all" href="style.css?time=<?=time()?>" />
</head>
<body>
<form action="example.php" method="POST">
	<input type="text" name="color" value="<?=$strColor?>"/>
	<input type="text" name="size" value="<?=$strSize?>"/>
	<input type="submit" value="enviar"/>
</form>
<h1>HEADER</h1>
<div id="header">heading</div>
<h2>h2 header</h2>
<body>
</html>