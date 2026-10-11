<?php
/**
 * Login session, access guard and failed-attempt lockout.
 */

function is_logged_in(): bool
{
    return !empty($_SESSION['user']);
}

/** Put at the top of any page that needs a logged-in user. */
function require_login(): void
{
    if (!is_logged_in()) {
        redirect('login.php');
    }
}

/** Put at the top of login/register so logged-in users skip them. */
function redirect_if_logged_in(): void
{
    if (is_logged_in()) {
        redirect('index.php');
    }
}

/** Check the credentials. Returns the display name on success, null otherwise. */
function authenticate(string $email, string $password): ?string
{
    if (strtolower($email) === STAFF_EMAIL && hash_equals(STAFF_PASSWORD, $password)) {
        return STAFF_NAME;
    }

    $user = find_user($email);
    if ($user && password_verify($password, $user['password'])) {
        return $user['name'];
    }
    return null;
}

function login_user(string $name): void
{
    session_regenerate_id(true);
    $_SESSION['user'] = $name;
    clear_attempts();
}

function logout_user(): void
{
    $_SESSION = [];
    session_destroy();
}

// ---- Lockout ------------------------------------------------------------

function lockout_remaining(): int
{
    $until = $_SESSION['lock_until'] ?? 0;
    return max(0, $until - time());
}

function attempts_left(): int
{
    return MAX_ATTEMPTS - ($_SESSION['attempts'] ?? 0);
}

/** Count a failed login. Locks the form once the limit is reached. */
function register_failed_attempt(): void
{
    $_SESSION['attempts'] = ($_SESSION['attempts'] ?? 0) + 1;

    if (attempts_left() <= 0) {
        $_SESSION['lock_until'] = time() + LOCKOUT_SECONDS;
        $_SESSION['attempts'] = 0;
    }
}

function clear_attempts(): void
{
    unset($_SESSION['attempts'], $_SESSION['lock_until']);
}
