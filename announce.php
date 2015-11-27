<?php
// Announce entrance of new individual into the conference environment

$response = '<?xml version="1.0" encoding="UTF-8"?><Response>';

$RecordingUrl = isset($_GET['RecordingUrl']) ? $_GET['RecordingUrl'] : "''";


if($RecordingUrl != "''" ){
	$response .= "<Play>$RecordingUrl</Play>";
	$response .= '<Say voice="alice" language="en-GB">has joined the conference.</Say>';

} else { 
	$response .= '<Say voice="alice" language="en-GB">A new perspon just joined the audio conference.</Say>';
}

$response .= "</Response>";

print $response;

?>