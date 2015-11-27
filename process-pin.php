<?php
require_once('./config.php');
// Link the database
$link = mysqli_connect("$mysql_server", "$mysql_user", "$mysql_pw", "$mysql_db");
if (!$link) {
    die('Cannot connect: ' . mysql_error());
}

// Fetch inputs from the user
if(isset($_GET['Digits']) ) $PIN = $_GET['Digits'];
else $PIN = "";
if(isset($_GET['RecordingUrl']) ) $RecordingUrl = $_GET['RecordingUrl'];

// Prepare user response
$response = "<Response>\n";
$validPIN = false;

// If  have a PIN then compare it to info recorded on the database
if(strlen($PIN)==6){
	//Connect to database
	
	// Find  PIN in  database
	if($result = mysqli_query($link, "SELECT * FROM users WHERE user_pin = '$PIN' LIMIT 1") ){
		$validPIN = mysqli_num_rows($result) > 0;
		mysqli_free_result($result);
	};

	if( $validPIN ){
		// Announcers do not record respective names
		if($_REQUEST['To']==$_REQUEST['From']){
			$response .= "<Dial record='false'><Conference beep='true'>$PIN</Conference></Dial>";
		} else {
			$response .= "<Say language='en-gb'>PIN is ok.</Say>";
			$response .= "<Redirect>./process-recording.php?PIN=$PIN</Redirect>";
		}
		// Joining the audio bridge room
	} else {
		//  in case PIN is not correct
		$response .= "<Say language='en-gb'>You have entered an invalid pin, please try again.</Say>";
		$response .= "<Redirect>./welcome.php</Redirect>";
	}
} else {
	$response .= "<Say language='en-gb'>PIN entered is invalid, try again please.</Say>";
	$response .= "<Redirect>./welcome.php</Redirect>";
}
$response .= "</Response>";
print $response;

?>