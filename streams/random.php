<?php
$max = 5;
$rnd = random_int(1,$max);
if ($rnd == 1){
	$txt = file_get_contents('http://endorphingames.altervista.org/constream/weather.php';
	echo $txt;
}
else{
	$txt = file_get_contents('http://example.com');
	echo $txt;
}
?>
