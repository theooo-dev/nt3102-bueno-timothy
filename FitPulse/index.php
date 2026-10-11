<?php
/**
 * MAIN PAGE (landing page / dashboard).
 */
require_once __DIR__ . '/phpFiles/core/config.php';
require_login();

$pageTitle  = 'FitPulse — Gym Membership & Attendance Management System';
$pageStyles = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
    'css/landing.css',
];
$pageScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
];

include INC_PATH . '/layout/header.php';
include INC_PATH . '/layout/nav.php';
include INC_PATH . '/sections/hero.php';
include INC_PATH . '/sections/objectives.php';
include INC_PATH . '/sections/checkin.php';
include INC_PATH . '/sections/features.php';
include INC_PATH . '/sections/reports.php';
include INC_PATH . '/sections/dashboard.php';
include INC_PATH . '/layout/footer.php';
include INC_PATH . '/layout/scripts.php';
