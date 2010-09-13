<?php

function connectToDatabase() {
	global $database;
	
	$connection = mysql_connect($database['host'], $database['user'], $database['password']);
	mysql_select_db($database['name'], $connection);
}

function getRecords() {
	$records = array();
	$result = mysql_query('SELECT `user`, `date`, `event`, TIMESTAMPDIFF(SECOND, NOW(), `date`) AS `timeLeft` FROM `waiting` WHERE NOW() < `date` ORDER BY `date` ASC LIMIT 10');
	while ($record = mysql_fetch_assoc($result)) {
		$records[] = formatRecord($record);
	}
	
	return $records;
}

function getTimeUnits() {
	return array(
		1 => 'years',
		2 => 'months',
		3 => 'weeks',
		4 => 'days',
		5 => 'hours',
		6 => 'minutes',
		7 => 'seconds'
	);
}

function getTimeUnitBoundaries() {
	return array(
		'seconds' => 60,
		'minutes' => 60,
		'hours' => 24,
		'days' => 7,
		'weeks' => 4.35,
		'months' => 12,
		'years' => 1
	);
}

function isUsedTimeUnit($parameter) {
	global $formats;
	
	return strpos($formats['time'], '%' . $parameter . '$s') !== FALSE;
}

function calculateTimeLeft($record) {
	$timeUnits = getTimeUnits();
	$timeUnitBoundaries = getTimeUnitBoundaries();
	
	$timeLeft = array_fill_keys($timeUnits, NULL);
	$dividend = array_product($timeUnitBoundaries);
	$subtrahend = 0;
	foreach ($timeUnits as $n => $timeUnit) {
		$dividend /= $timeUnitBoundaries[$timeUnits[$n]];
		
		if (!isUsedTimeUnit($n)) continue;
		
		$timeLeft[$timeUnit] = floor(($record['timeLeft'] - $subtrahend) / $dividend);
		$subtrahend += $timeLeft[$timeUnit] * $dividend;
	}
	
	return $timeLeft;
}

function formatTimeUnits($timeLeft) {
	global $formats, $localization;
	
	$timeUnits = getTimeUnits();
	
	$time = array();
	foreach ($timeUnits as $n => $timeUnit) {
		$time[$n] = vsprintf($formats['unit'], array(
			1 => $timeLeft[$timeUnit],
			2 => $timeLeft[$timeUnit] === 1 ? $localization[substr($timeUnit, 0, -1)] : $localization[$timeUnit]
		));
	}
	
	return $time;
}

function formatRecord($record) {
	global $formats;
	
	$timeLeft = calculateTimeLeft($record);
	$time = formatTimeUnits($timeLeft);
	
	return vsprintf($formats['output'], array(
		1 => $record['user'],
		2 => vsprintf($formats['time'], $time),
		3 => $record['event'],
		4 => $record['date']
	));
}