<?php
//*********************************************************
// mysql_db class
//
// This class interacts with a mysql database.
//*********************************************************

// Required classes
require_once("objFactory.php");

// Class constants
define("DB_DATE", "Y-m-d");
define("DISPLAY_DATE", "m/d/Y");

class mysql_db {

	// Data members
	var $host;
	var $username;
	var $password;
	var $database;			// Selected DB
	var $objConn;			// DB connection object
	var $lastError;			// Last DB error message
	var $boolValid;			// Object validity

	// mysql_db class constructor
	function mysql_db()	{
		// Set valid check to true, and declare argument handle
		$this->boolValid = true; $funcArg = func_get_arg(0);

		// Check if the MySQL Server extension is loaded
		if ( !extension_loaded('mysql') ) {
			LogMsg("MySQL Server extension not loaded in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); $this->boolValid = false; }

		// Declare arrays of various object options
		$arrObjOpt = array();
		$arrObjOpt['required'] = array("host","username","password","database");

		// Instantiate factory object to build the object, clean up related objects
		$objFac = new objFactory($this, $funcArg, "", $arrObjOpt); unset($objFac, $funcArg, $arrObjOpt);

		// Set last error message to false
		$this->lastError = false;

		// Start connection if object is valid
		if ( $this->boolValid ) { $this->StartConn(); }
	}

	// Getter and Setter function
	function Get($iAttrib) { return $this->$iAttrib; }
	function Set($iAttrib, $iValue) { $this->$iAttrib = $iValue; }

	// Start database connection
	function StartConn() {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Attempt to make connection
		$this->objConn = @mysql_connect($this->host, $this->username, $this->password);
		if ( $this->objConn === false ) {
			$this->lastError = "Unable to connect to server (" . $this->host . ") in " . __CLASS__ . "::" . __FUNCTION__;
			LogMsg($this->lastError, SERIOUS); $this->boolValid = false; return ERR_EXIT;
		}

		// Attempt to select database
		$rVal = @mysql_select_db($this->database, $this->objConn);
		if ( $rVal === false ) {
			$this->lastError = mysql_get_last_message() . " in " . __CLASS__ . "::" . __FUNCTION__;
			LogMsg($this->lastError, SERIOUS); $this->boolValid = false; return ERR_EXIT;
		}
	}

	// Query database object
	function &Query($iQuery) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Attempt to run query against DB
		$dbRecordset = @mysql_query($iQuery, $this->objConn);
		if ( $dbRecordset === false ) {
			$this->strLastError = mysql_get_last_message() . " in " . __CLASS__ . "::" . __FUNCTION__;
			LogMsg($this->strLastError, SERIOUS); return ERR_EXIT; }

         // Return recordset
		return $dbRecordset;
	}

	// Obtain an associative array from a query
	function FetchAssocQuery($iQuery) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Pass query to Query function, return associative array
		$iRecordset = @$this->Query($iQuery);
		return mysql_fetch_assoc($iRecordset);
	}

	// Obtain an associative array from a recordset
	function FetchAssocRec($iRecSet) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Return associative array from passed recordset
		return mysql_fetch_assoc($iRecSet);
	}

	// Escape strings for entry into DB
	function &EscapeString(&$iString) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// SQL begins and ends strings with a single quote '. To escape, you use two single quotes.
		return str_replace("'", "''", $iString);
	}

	// Retrieve last inserted ID
	function &LastInsertID() {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Run a query to obtain and return the last inserted ID
		$sqlQuery = "SELECT @@IDENTITY AS ID"; $row = $this->FetchAssocQuery($sqlQuery); return $row['ID'];
	}

	// Retrieve number of rows from a recordset
	function &NumRows(&$iRecordset) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Return number of runs of a recordset
		return mysql_num_rows($iRecordset);
	}

	// Move the internal recordset cursor to a particular row
	function &MoveToRow(&$iRecordset, &$iRowNum) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Move pointer
		return @mysql_data_seek($iRecordset, $iRowNum);
	}

	// Retrieve current datetime stamp from DB
	function Now() {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Run a query to obtain and return the current timestamp
		//$sqlQuery = "SELECT CURRENT_TIMESTAMP AS now"; $row = $this->FetchAssocQuery($sqlQuery); return $row['now'];
	    $sqlQuery = "SELECT getdate() AS now"; $row = $this->FetchAssocQuery($sqlQuery); return $row['now'];
	}

    // Retrieve datetime stamp n days in the past from DB
	function DaysAgo($n) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Run a query to obtain and return the current timestamp
		$sqlQuery = "SELECT getdate()-" . $n . " AS 'daysago'"; $row = $this->FetchAssocQuery($sqlQuery); return $row['daysago'];
	}

    // Retrieve the first day of the current month from DB
	function firstDayMonth() {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Run a query to obtain and return the current timestamp
		$sqlQuery = "select getdate() - datepart(d,getdate()) + 1 AS 'firstdayofmonth'"; $row = $this->FetchAssocQuery($sqlQuery); return $row['firstdayofmonth'];

	}

    // Retrieve the first day of the current month from DB
	function lastDayMonth() {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Run a query to obtain and return the current timestamp
		$sqlQuery = "select getdate() - datepart(d,getdate()) AS 'lastdayofmonth'"; $row = $this->FetchAssocQuery($sqlQuery); return $row['lastdayofmonth'];

	}





	// Insert a record from an array
	function Insert($iTable, &$arrValues) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Loop through passed array and construct the attributes statement
		$sqlAttrib = ""; $sqlValues = "";
		while ( list($key) = each($arrValues) ) {
			// If the sub-query strings are not empty, add a separating comma
			if ($sqlAttrib != "") { $sqlAttrib .= ", "; $sqlValues .= ", "; }

			// If value is empty, replace with a NULL, else retrieve value
			if ( $arrValues[$key] == "" ) { $sqlAttrib .= $key; $sqlValues .= "NULL"; }
			else { $sqlAttrib .= $key; $sqlValues .= "'" . $arrValues[$key] . "'"; }
		}
		reset($arrValues);

		// Build query and run against DB
		$sqlQuery = "INSERT INTO " . $iTable . " (" . $sqlAttrib . ") VALUES (" . $sqlValues . ");";
		return $this->Query($sqlQuery);
	}

	// Update a record by ID from an array
	function Update($iTable, &$arrValues, $iID) {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Loop through passed array and construct the SET statement
		$sqlSet = "";
		while ( list($key) = each($arrValues) ) {
			// If the query SET string is not empty, add a separating comma
			if ($sqlSet != "") { $sqlSet .= ", "; }

			// If value is empty, replace with a NULL, else retrieve value
			if ( $arrValues[$key] == "" ) { $sqlSet .= $key . " = NULL"; }
			else { $sqlSet .= $key . " = '" . $arrValues[$key] . "'"; }
		}

		// Build query and run against DB
		$sqlQuery = "UPDATE " . $iTable . " SET " . $sqlSet . " WHERE ID = '" . $iID . "';";
		return $this->Query($sqlQuery);
	}

}
?>
