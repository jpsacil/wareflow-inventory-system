<?php
// Allow overriding DB settings using environment variables (useful for Docker and other deployments)
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost');
define('DB_USER', getenv('DB_USER') ? getenv('DB_USER') : 'root');
define('DB_PASS', getenv('DB_PASS') ? getenv('DB_PASS') : '');
define('DB_NAME', getenv('DB_NAME') ? getenv('DB_NAME') : 'oswa_inv');
?>
