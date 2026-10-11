<?php
/**
 * Processes the login form (included by login.php on POST).
 * Fills: $old, $errors, $status
 */
$old['email'] = post('email');
$password     = (string) ($_POST['password'] ?? '');   // never trim passwords

if (!csrf_valid()) {
    $status = 'Session expired. Please try again.';
} elseif (lockout_remaining() > 0) {
    $status = 'Too many failed attempts. Try again in ' . lockout_remaining() . 's.';
} else {
    $errors = validate_login($old['email'], $password);

    if (!$errors) {
        $name = authenticate($old['email'], $password);

        if ($name !== null) {
            login_user($name);
            redirect('index.php#dashboard');
        }

        register_failed_attempt();
        $left = attempts_left();

        if (lockout_remaining() > 0) {
            $status = 'Too many failed attempts. Try again in ' . lockout_remaining() . 's.';
        } else {
            $status = 'Incorrect email or password. ' . $left . ' attempt' . ($left === 1 ? '' : 's') . ' left.';
        }
    }
}
