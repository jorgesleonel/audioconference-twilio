<?php
// Announce the entry of the new person

$response = '<?xml version="1.0" encoding="UTF-8"?><Response>';

$RecordingUrl = isset($_GET['RecordingUrl']) ? $_GET['RecordingUrl'] : "''";


if($RecordingUrl != "''" ){
	$response .= "<Play>$RecordingUrl</Play>";
	$response .= '<Say voice="alice" language="en-GB">has left the audio conference.</Say>';

} else { 
	$response .= '<Say voice="alice" language="en-GB">A person has just left the audio conference.</Say>';
}

$response .= "</Response>";

print $response;

?>