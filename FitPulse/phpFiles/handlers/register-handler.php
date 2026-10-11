<?php
/**
 * Processes the register form (included by register.php on POST).
 * Fills: $old, $errors, $status
 */
$old['name']  = post('name');
$old['email'] = post('email');
$password     = (string) ($_POST['password'] ?? '');
$confirm      = (string) ($_POST['confirm-password'] ?? '');

if (!csrf_valid()) {
    $status = 'Session expired. Please try again.';
} else {
    $errors = validate_register($old['name'], $old['email'], $password, $confirm);

    if (!$errors && strtolower($old['email']) === STAFF_EMAIL) {
        $errors['email'] = 'That email is already registered.';
    }

    if (!$errors) {
        if (create_user($old['name'], $old['email'], $password)) {
            set_flash('Account created! You can log in now.');
            redirect('login.php');
        }
        $errors['email'] = 'That email is already registered.';
    }
}
