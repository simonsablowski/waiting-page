<?php

/*
 * database connection
 */
$database = array();
$database['host'] = 'localhost';
$database['user'] = 'root';
$database['password'] = '';
$database['name'] = 'waiting';

/*
 * formats
 */
$formats = array();

/*
 * output format parameters
 * 
 * 1: user
 * 2: time
 * 3: event
 * 4: date
 */
$formats['output'] = '%1$s has to wait %2$s for %3$s.';

/*
 * time format parameters
 * 
 * 1: years
 * 2: months
 * 3: weeks
 * 4: days
 * 5: hours
 * 6: minutes
 * 7: seconds
 */
/*
 * precisely in months to seconds
 */
//$formats['time'] = '%1$s, %2$s, %3$s, %4$s, %5$s, %6$s and %7$s';
/*
 * months, weeks, days and hours
 */
$formats['time'] = '%2$s, %3$s, %4$s and %5$s';
/*
 * days, hours and minutes
 */
//$formats['time'] = '%4$s, %5$s and %6$s';

/*
 * unit format parameters
 * 
 * 1: amount
 * 2: unit (localized, see below)
 */
$formats['unit'] = '%1$d %2$s';

/*
 * localization
 */
$localization = array();
/*
 * website title
 */
$localization['title'] = 'waiting page';
/*
 * time units
 */
$localization['year'] = 'year';
$localization['years'] = 'years';
$localization['month'] = 'month';
$localization['months'] = 'months';
$localization['week'] = 'week';
$localization['weeks'] = 'weeks';
$localization['day'] = 'day';
$localization['days'] = 'days';
$localization['hour'] = 'hour';
$localization['hours'] = 'hours';
$localization['minute'] = 'minute';
$localization['minutes'] = 'minutes';
$localization['second'] = 'second';
$localization['seconds'] = 'seconds';