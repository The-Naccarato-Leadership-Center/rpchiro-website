<?php
//*********************************************************
// objFactory class
//
// This class represents a objFactory object, which is
// responsible for handling the creation of other objects
// in WARP.
//*********************************************************

require_once("func.inc.php");

class objFactory {

	// Data members
	var $objHandle;				// Reference to the object to be created ($this)
	var $initHandle;			// Reference to object initialization argument (array or DB ID)
	var $tblName;				// Table name to retrieve records from
	var $argHandle;				// Array of options for objects (i.e. Required, Optional, Defaults, etc)
	var $boolArgIsArr;			// Whether argHandle is an array or integer (T=Array, F=Integer)
	var $boolValid;				// Whether object is valid or not
	
	// factory class constructor
	function objFactory(&$iObjHandle, $iInitHandle, $iTblName, $iArgHandle) {
		// Set valid check to true
		$this->boolValid = true;
		
		// Check for number of arguments passed
		if ( func_num_args() != 4 ) { 
			LogMsg("Invalid number of arguments passed in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); $this->boolValid = false; }
		elseif ( !is_object($iObjHandle) ) {
			LogMsg("Passed argument not an object in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); $this->boolValid = false; }
		elseif ( !is_array($iArgHandle) ) {
			LogMsg("Passed argument not an array in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); $this->boolValid = false; }
		else {
			// Allocate handles to passed arguments
			$this->objHandle =& $iObjHandle; $this->initHandle = $iInitHandle; 
			$this->tblName = $iTblName; $this->argHandle = $iArgHandle;
			
			// Check if arguments passed to soon-to-be-made object are array or not
			if ( is_array($this->initHandle) ) { $this->boolArgIsArr = true; }
			elseif ( settype($this->initHandle, "integer") ) { $this->boolArgIsArr = false; }
			else { 
				LogMsg("Invalid argument passed in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); $this->objHandle->Set('boolValid', false);
			}
			
			// Call proper initialization method depending upon passed arguments
			if ( $this->boolArgIsArr ) { $rVal = $this->InitFromArray(); }
			else { $rVal = $this->InitFromDB(); }
			
			// If unable to initialize object properly, set calling object's boolValid to false
			if ( $rVal != NORM_EXIT ) { $this->objHandle->Set('boolValid', false); }
		}
	}
	
	// Initialize object from passed array using passed option
	function InitFromArray() {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Declare a handle for object attributes
		$objAttribs = get_object_vars($this->objHandle);
		
		// Declare arrays to handle different object options
		$arrRequired = array_key_exists("required", $this->argHandle) ? $this->argHandle['required'] : array();
		$arrOptional = array_key_exists("optional", $this->argHandle) ? $this->argHandle['optional'] : array();
		$arrDefaults = array_key_exists("defaults", $this->argHandle) ? $this->argHandle['defaults'] : array();
		$arrObjects = array_key_exists("objects", $this->argHandle) ? $this->argHandle['objects'] : array();

		// Set attributes if found in passed array
		while( list($key) = each($this->initHandle) ) {
			if ( array_key_exists($key, $objAttribs) ) { $this->objHandle->Set($key, $this->initHandle[$key]); }
		}
		reset($this->initHandle);
		
		// Log errors if required attributes are not set
		while( list($key) = each($arrRequired) ) {
			if ( !array_key_exists($arrRequired[$key], $this->initHandle) ) {
				LogMsg($arrRequired[$key] . " not specified in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); $this->objHandle->boolValid = false;
			}
		}
		reset($arrRequired);

		// Set default values
		while( list($key) = each($arrDefaults) ) {
			if ( !array_key_exists($key, $this->initHandle) ) { $this->objHandle->$key = $arrDefaults[$key]; }
		}
		reset($arrDefaults);
		
		// Initialize composite objects
		while( list($key) = each($arrObjects) ) {
			// Obtain handle to current object
			$currClass = $arrObjects[$key];
			if ( !class_exists($currClass) ) {
				LogMsg("Invalid class (" . $currClass . ") specified in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT;
			}
			else { $this->objHandle->$key = new $currClass($this->initHandle[$key]); }
		}
		reset($arrObjects);

		// Everything went well, return normal
		return NORM_EXIT;
	}
	
	// Initialize object from DB ID
	function InitFromDB() {
		// Object validity check
		if ( !$this->boolValid ) { LogMsg("Object not valid in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS); return ERR_EXIT; }

		// Create query, attempt to fetch record array, log if error
		$query = "SELECT * FROM " . $this->tblName . " WHERE ID = '" . $this->initHandle . "';";
		$currRec = $GLOBALS['my_sql']->FetchAssocQuery($query);
		if ( $currRec === false ) {
			LogMsg(GetErrLabel( get_class($this->objHandle) ) . "No record found with specified ID (" . $this->initHandle . ") in " . __CLASS__ . "::" . __FUNCTION__, SERIOUS);
			return ERR_EXIT;
		}
		else { $this->initHandle = $currRec; $this->InitFromArray(); }
		
		// Everything went well, return normal
		return NORM_EXIT;
	}

}
?>
