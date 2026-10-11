<?php
/**
 * Global settings. Every page loads this file first.
 */
declare(strict_types=1);

session_start();
date_default_timezone_set('Asia/Manila');

define('ROOT_PATH', dirname(__DIR__, 2));
define('INC_PATH', ROOT_PATH . '/phpFiles');
define('USERS_FILE', ROOT_PATH . '/data/users.json');

// Default staff account (same one used in the earlier HTML/JS version)
define('STAFF_EMAIL', 'frontdesk@ironclad.fit');
define('STAFF_PASSWORD', 'Ironclad@2026');
define('STAFF_NAME', 'frontdesk');

// Login lockout
define('MAX_ATTEMPTS', 5);
define('LOCKOUT_SECONDS', 30);

require_once INC_PATH . '/core/functions.php';
require_once INC_PATH . '/core/validation.php';
require_once INC_PATH . '/core/users.php';
require_once INC_PATH . '/core/auth.php';
