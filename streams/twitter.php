<?php
require_once '../twitter-api-php-master/TwitterAPIExchange.php';
require_once '../config.php';
$settings = array(
  'consumer_key'              => $TWITTER_CONSUMER_KEY,
  'consumer_secret'           => $TWITTER_SECRET_KEY,
  'oauth_access_token'              => $TWITTER_OAUTH_TOKEN ,
  'oauth_access_token_secret'       => $TWITTER_OAUTH_SECRET,
);
$hashtag = "news";
if (isset($_GET['hashtag'])){
	$hashtag = $_GET['hashtag'];
}
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?q=#'.$hashtag.'&result_type=recent';

$twitter = new TwitterAPIExchange($settings);
$data = $twitter->setGetField($getfield)
	     ->buildOauth($url,$requestMethod)
		->performRequest();
$data = json_decode($data);
//var_dump($data);
//var_dump($data->statuses[0]->text);
$maxc = 10;
for ($i = 0; $i<count( $data->statuses );$i++){
	echo "<div><br> >>>>>>>>>>".$data->statuses[$i]->created_at."</div>";
	echo "<div>".$data->statuses[$i]->user->name." @".$data->statuses[$i]->user->screen_name."</div>";
	echo "<div>\"".$data->statuses[$i]->text."\"<br></div>";
}
?>


