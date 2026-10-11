<?php
/**
 * Form validation using regular expressions (preg_match).
 * Each function returns an array of errors keyed by field name.
 * An empty array means the input is valid.
 */

// ---- Regular expressions ------------------------------------------------
const RE_NAME     = '/^\p{L}[\p{L} .\'-]{1,49}$/u';                         // letters, spaces, . ' - (2-50 chars, no digits)
const RE_EMAIL    = '/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}$/';
const RE_PASSWORD = '/^(?=.*[^A-Za-z0-9\s]).{8,64}$/';                      // 8-64 chars, at least one symbol

function validate_email(string $email): ?string
{
    if ($email === '') {
        return 'Email is required.';
    }
    if (!preg_match(RE_EMAIL, $email)) {
        return 'Enter a valid email address (e.g. you@example.com).';
    }
    return null;
}

function validate_login(string $email, string $password): array
{
    $errors = [];

    if ($error = validate_email($email)) {
        $errors['email'] = $error;
    }
    if ($password === '') {
        $errors['password'] = 'Password is required.';
    }
    return $errors;
}

function validate_register(string $name, string $email, string $password, string $confirm): array
{
    $errors = [];

    if ($name === '') {
        $errors['name'] = 'Name is required.';
    } elseif (preg_match('/\d/', $name)) {
        $errors['name'] = 'Name should not contain numbers.';
    } elseif (!preg_match(RE_NAME, $name)) {
        $errors['name'] = 'Use 2-50 letters only (spaces, . \' - allowed).';
    }

    if ($error = validate_email($email)) {
        $errors['email'] = $error;
    }

    if ($password === '') {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    } elseif (strlen($password) > 64) {
        $errors['password'] = 'Password must be 64 characters or fewer.';
    } elseif (!preg_match(RE_PASSWORD, $password)) {
        $errors['password'] = 'Password must contain at least one symbol (e.g. ! @ # $ %).';
    }

    if ($confirm === '') {
        $errors['confirm'] = 'Please confirm your password.';
    } elseif (!hash_equals($password, $confirm)) {
        $errors['confirm'] = 'Passwords do not match.';
    }

    return $errors;
}
