<?php
function showYouTubeVideoComments() {
	$VIDEO_ID = "";    
if (isset($_GET["id"])){
	$VIDEO_ID = $_GET["id"];
} else{
 $VIDEO_ID = "GZ2gaWsXzQw";
}

    $API_KEY = "AIzaSyDshQMlRkxLPRar6z3c0vAdF12LCwbuMMM";
    $videoUrl = file_get_contents("https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId={$VIDEO_ID}&key={$API_KEY}"); //Get contents of Video URL with specified video ID.
    $jsonStuff = json_decode($videoUrl, true); //Decode API Response.

    if (empty($jsonStuff)) { echo "No comments were found."; } //If there are no comments, tell the user.
    echo "<p>";
/* Display each comment 'item' in array */
    foreach($jsonStuff['items'] as $val) {

      $author = $val['snippet']['topLevelComment']['snippet']['authorDisplayName']; //Get Comment Author Name.
      $author_url = $val['snippet']['topLevelComment']['snippet']['authorChannelUrl']; //Get Comment Author URL.
      $author_thumbnail_url = $val['snippet']['topLevelComment']['snippet']['authorProfileImageUrl']; //Get Comment Author Thumbnail URL.
      $comment = $val['snippet']['topLevelComment']['snippet']['textDisplay']; //Get Comment Content.
/* Echo information in the following layout */
 echo '<div class="hbox">
          <div class="col-lg-1"><span class="pull-left thumb-sm avatar m-r"><a href="'.$author_url.'" target="_blank"><img width="250" src="'.$author_thumbnail_url.'"></a></span></div>
          <div class="col-lg-2"><a href="'.$author_url.'" target="_blank">'.$author.':</a></div>
          <div class="col-lg-9"><a href="#">'.$comment.'</a><br></div>
          <br clear=”all”>
          </div><hr>';
    }

}

showYoutubeVideoComments();
?>
