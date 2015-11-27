<?php

?>
<?xml version="1.0" encoding="UTF-8"?>
<Response>
	<Gather action = './process-pin.php' method='GET' numDigits='6' timeout='8'>
		<Say language="en-gb">Enter the pin, 6 digit format please</Say>
	</Gather>
	<Redirect>#</Redirect>
</Response>