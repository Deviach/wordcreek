<?php
$max = 5;
$url = "http://endorphingames.altervista.org/wordcreek/streams/";
$rnd = rand(1,$max);
if ($rnd == 1){
	$txt = file_get_contents($url."weather.php");
	echo $txt;
}
else if ($rnd == 2){
	$txt = file_get_contents($url."youtube.php");
	echo $txt;
}
else if ($rnd == 3){
	$txt = file_get_contents($url."twitter.php?hashtag=usnews");
	echo $txt;
}
else{
	$txt = file_get_contents('http://pastebin.com/raw/RHwVWzSr');
	echo $txt;
}
?>
