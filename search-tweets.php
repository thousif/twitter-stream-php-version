<html>
<head> <meta charset="utf-8"> </head>
<body><form action="index.php" method="post">
search: <input type="text" name="word">
<input type="submit">
</form>
</body>
</html>
<?php

    require_once ('codebird/codebird.php');

    $cb = \Codebird\Codebird::getInstance();
    $cb->setConsumerKey('', ''); // get your keys at dev.twitter.com
    $cb->setToken('', '');
	
	if($_POST["word"] != null)
	{
	$searchitem = $_POST["word"];
	}
	else
	{
	$searchitem = "error";
	}
    $params = array('q'=>$searchitem,'lang'=>'en');    
    $reply = (array) $cb->search_tweets($params);

    $data = (array) $reply['statuses'];
    $s = count($reply['statuses']);

    for ($a = 0; $a < $s; $a++) {

        $status = $data[$a];

    /*    if ($status->retweeted_status != null) {

            echo $status->user->name . " (@" . $status->user->screen_name . ") retweeted:"; 
            echo "<br/>";
            $b = $status->retweeted_status;

        }

        else {

            $b = $status;

        }   */

		$b = $status;
        echo "<br/>";
        echo "<img src=\"" . $b->user->profile_image_url . "\"/> " . $b->user->name . " (@" . $b->user->screen_name . ")" . " at " . $b->created_at;
        echo "<br/>";
        echo $b->text;
        echo "<div style=\"height: 1px; width: 100%; background-color: orange;\"></div>";

		
    }

?>
