<?php
/**
 * Registered accounts, stored in data/users.json (no database needed).
 * Passwords are saved as hashes, never as plain text.
 */

function load_users(): array
{
    if (!is_file(USERS_FILE)) {
        return [];
    }
    $data = json_decode((string) file_get_contents(USERS_FILE), true);
    return is_array($data) ? $data : [];
}

function find_user(string $email): ?array
{
    return load_users()[strtolower($email)] ?? null;
}

function create_user(string $name, string $email, string $password): bool
{
    $users = load_users();
    $key = strtolower($email);

    if (isset($users[$key])) {
        return false;
    }

    $users[$key] = [
        'name'     => $name,
        'email'    => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ];

    return file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT), LOCK_EX) !== false;
}
