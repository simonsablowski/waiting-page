<?php

require 'config.php';
require 'functions.php';

connectToDatabase();
$records = getRecords();

require 'layout.php';