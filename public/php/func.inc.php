<?php
//*********************************************************
// func.inc.php
// Copyright © 2003 Anthony G. Nielson, All rights reserved
//
// This file includes general use functions for the YSA
// IS application.
//*********************************************************

function CheckAssocVal($iField, $iArray) {
	// Set trigger variable
	$rVal = true;

	// Check if key exists in array
	if ( !array_key_exists($iField, $iArray) ) { $rVal = false; }

	// Check if key is set in array
	if ( !isset($iArray[$iField]) ) { $rVal = false; }

	// Check if key is empty in array
	if ( empty($iArray[$iField]) ) { $rVal = false; }

	// Return check results
	return $rVal;
}

function GetErrLabel($iObj) {
	// Set return value
	$rVal = "";

	// Check if object is a class
	if ( is_object($iObj) ) { $rVal = get_class($iObj); }
	else { $rVal = $iObj; }

	// Return error label
	return $rVal . ": ";
}

// Error logging constants (900 series codes)
define("SCREEN", 900);
define("FILE", 901);
define("NONE", 902);
define("LOG_MODE", SCREEN);
define("LOG_DIR", "logs/");
define("LOG_FILE", LOG_DIR . date("Y-M") . ".log");

// Error codes (800 series codes)
define("NORM_EXIT", 800);
define("ERR_EXIT", 801);
define("NOTICE", 802);
define("WARNING", 803);
define("SERIOUS", 804);
define("FATAL", 805);

function LogMsg($errMsg = "", $errType = "") {
	// Choose error logging mode
	$errMode = LOG_MODE;
	if ( $errMode == SCREEN ) {
	// Log errors to screen
		switch ($errType) {
			case NOTICE:	trigger_error($errMsg, E_USER_NOTICE); break;
			case WARNING:	trigger_error($errMsg, E_USER_WARNING); break;
			case SERIOUS:	trigger_error($errMsg, E_USER_WARNING); break;
			case FATAL:		trigger_error($errMsg, E_USER_ERROR); break;
		}
	} elseif ( $errMode == FILE ) {
		// Log errors to file
		$now = new Date(); $logMsg = $now->getDate(DATE_FORMAT_ISO);
		switch ($errType) {
			case NOTICE:	$logMsg .= " [Notice]  "; break;
			case WARNING:	$logMsg .= " [Warning] "; break;
			case SERIOUS:	$logMsg .= " [Serious] "; break;
			case FATAL:		$logMsg .= " [Fatal]   "; break;
		}
		$logMsg .= $errMsg . "\r\n"; error_log($logMsg, 3, LOG_FILE);
	} else { /* Do Nothing */ }
}

// Timer stopwatch function
function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}

// Converts an array into a query string
function ArrayToQuery($iArray) {
	$outQS = "";
	while( list($key) = each($iArray) ) {
		// If the querystring is not empty, add a separating amperstand
		if ($outQS != "") { $outQS .= "&"; }
		// Append each key-value pair to query string
		$outQS .= $key . "=" . urlencode($iArray[$key]);
	}

	// Return query string
	return $outQS;
}

?>
