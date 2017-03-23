<?php

require_once("src/Configuration.php");
use WebEvents\Configuration;

function readline($prompt = null){
    if($prompt){
        echo $prompt;
    }
    $fp = fopen("php://stdin","r");
    $line = rtrim(fgets($fp, 1024));
    return $line;
}

function readValue(string $text, string $oldValue) {
	if ($oldValue === "")
	{
		do {
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

$config = new Configuration("webevents.ini");

$config->setDatabaseHost(readValue("Database host", $config->getDatabaseHost()));
$config->setDatabaseName(readValue("Database name", $config->getDatabaseName()));
$config->setDatabaseLogin(readValue("Database login", $config->getDatabaseLogin()));
$config->setDatabasePasswd(readValue("Database password", $config->getDatabasePasswd()));

$config->save();