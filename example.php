<?php
$location = realpath(dirname(__FILE__));
require_once $location . '/function.php';
$string = 'This is a test.' . "\r\n" . 'It has a Windows line-ending.';
$toType = 'Linux';
$return = convertLineEndings($string, $toType);
var_dump($return);
if (detectLineEndingType($return) === 'Windows'){
	echo 'Using Windows line-endings.';
} else if (detectLineEndingType($return) === 'Linux'){
	echo 'Using Linux line-endings.';
}


function detectLineEndingType($string) {
    // Check for Windows line endings (CRLF)
    if (strpos($string, "\r\n") !== false) {
        return 'Windows';
    }
    // Check for Mac (old) line endings (CR)
    elseif (strpos($string, "\r") !== false) {
        return 'Mac';
    }
    // Check for Unix/Linux line endings (LF)
    elseif (strpos($string, "\n") !== false) {
        return 'Linux';
    }
    // No line endings found
    else {
        return 'Unknown';
    }
}
?>