<?php

// path constants
define('SYSTEM_PATH', dirname(__FILE__)); # location of 'app' folder - don't change
define('BASE_URL','http://ec2-18-220-174-91.us-east-2.compute.amazonaws.com/naamproject3/web'); # your base URL

define('DB_USER', 'root');
define('DB_PASS', 'AmazonSQL!');
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'articles');

date_default_timezone_set('America/New_York');
