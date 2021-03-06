<?php

require_once(__DIR__ . "/../src/Configuration.php");
use WebEvents\Configuration;
require_once(__DIR__ . "/../src/Database/MyDatabase.php");
use WebEvents\Database\MyDatabase;

function askYN($Prompt = '', $Default = null) {
        /*
        Purpose
            Ask the user a question that will result in a "Y" or "N" answer and return the boolean result.
        Parameters
            Prompt (optional string) = The prompt to display to the user.
                If Default is true, the string " [Y/n] " will automatically be appended to this string.
                If Default is false, the string " [y/N] " will automatically be appended to this string.
                Default: "" (zero-length string)
            Default (optional string) = The value to return if the user presses enter without pressing a key.
                Default if null: false
                Default: null
        Return (boolean)
            Function returns true if the user presses "Y" or "y".
            Function returns false if the user presses "N" or "n".
            Function returns the value of Default if the user presses Enter.
        Version History
            1.0 2012.04.03  Tested by Russ Tanner on PHP 5.3.10.
        */

        // Default parameters
        if (is_null($Default)) $Default = false;
        
        // Append Y/n prompt to Prompt.
        if (strlen($Prompt) > 0) $Prompt .= ' ';                // If Prompt has characters, append a spacer for [Y/n].
        $Prompt .= ($Default ? '[Y/n] ' : '[y/N] ');
        
        // Main Loop: Loop until a valid response is provided.
        while (true) {
        
            // Get user input.
            print $Prompt;
            $in = chop(fgets(STDIN));  
            
            // The user entered ENTER. Return the default value and exit now.
            if ($in == '') return $Default;
            // The user entered "Y" or "y". Return true and exit now.
            if ($in == 'Y' || $in == 'y') return true;
            // The user entered "N" or "n". Return false and exit now.
            if ($in == 'N' || $in == 'n') return false;
            
        }

    }

function readline($prompt = null){
    if($prompt){
        echo $prompt;
    }
    $fp = fopen("php://stdin","r");
    $line = rtrim(fgets($fp, 1024));
    return $line;
}

function readValue($text, $oldValue) {
	if ($oldValue === "")
	{
		do
		{
			$newValue = readline($text . " (not set): ");
		} while ($newValue === "");
	}
	else
	{
		$newValue = readline($text . " (current: '" . $oldValue . "') : ");
		if ($newValue === "")
			$newValue = $oldValue;
	}
	return $newValue;
}

print_r("--- WebEvenmentiel configuration ---\n");

$config = new Configuration("webevents_test.ini");

$config->setDatabaseHost(readValue("Database host", $config->getDatabaseHost()));
$config->setDatabaseName(readValue("Database name", $config->getDatabaseName()));
$config->setDatabaseLogin(readValue("Database login", $config->getDatabaseLogin()));
$config->setDatabasePasswd(readValue("Database password", $config->getDatabasePasswd()));

$config->save();