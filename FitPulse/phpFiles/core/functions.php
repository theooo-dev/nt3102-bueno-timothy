<?php
/**
 * Small helpers used across the site.
 */

/** Escape text before printing it into HTML. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function is_post(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect(string $url): never
{
    header('Location: ' . $url);
    exit;
}

/** Read a trimmed text value from $_POST. */
function post(string $key): string
{
    return trim((string) ($_POST[$key] ?? ''));
}

/** Store a one-time message (shown on the next page, then removed). */
function set_flash(string $message): void
{
    $_SESSION['flash'] = $message;
}

function pull_flash(): string
{
    $message = $_SESSION['flash'] ?? '';
    unset($_SESSION['flash']);
    return $message;
}

/** CSRF protection for the forms. */
function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf" value="' . e(csrf_token()) . '">';
}

function csrf_valid(): bool
{
    return hash_equals(csrf_token(), (string) ($_POST['csrf'] ?? ''));
}
