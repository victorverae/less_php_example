<?php
require_once 'Less.php';

$parser = new Less_Parser();
$parser->parse( '@color: #4D926F; #header { color: @color; } h2 { color: @color; }' );
$css = $parser->getCss();

//echo $css;

//echo "<br/>";


$parser = new Less_Parser();
$parser->parseFile( 'style.less', 'http://example.com/mysite/' );
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
<h1>HEADER</h1>
<div id="header">heading</div>
<h2>h2 header</h2>
<body>
</html>