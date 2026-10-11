<?php
require_once __DIR__ . '/phpFiles/core/config.php';
redirect_if_logged_in();

$old    = ['name' => '', 'email' => ''];
$errors = [];
$status = '';

if (is_post()) {
    include INC_PATH . '/handlers/register-handler.php';
}

$pageTitle   = 'FitPulse — Register';
$pageStyles  = [
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
    'css/auth.css',
];
$pageScripts = [
    'https://code.jquery.com/jquery-3.7.1.min.js',
    'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js',
    'js/validation-rules.js',
    'js/auth.js',
    'js/register.js',
];

include INC_PATH . '/layout/header.php';
include INC_PATH . '/layout/auth-side.php';
?>
  <main class="form-wrap">
    <div class="auth-box">
<?php include INC_PATH . '/forms/register-form.php'; ?>
    </div>
  </main>

<?php include INC_PATH . '/layout/scripts.php'; ?>
