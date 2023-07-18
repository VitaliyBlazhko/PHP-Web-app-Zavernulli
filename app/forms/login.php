<?php

function authUser(array $userData)
{
    authUserValidation($userData);
    $user = retrieveUserByEmail($userData['email']);

    if (!password_verify($userData['password'], $user['password'])) {
        logInErrorRedirect();
    }

    addUser($user['id'], $user['is_admin']);

    unset($_SESSION['login']);

    notify("Welcome, {$user['name']}");
    redirect();
}

function retrieveUserByEmail(string $email): array
{
    $user = dbSelect(Tables::Users, conditions: "email = '{$email}'", isSingle: true);

    if (!$user) {
        logInErrorRedirect();
    }

    return $user;
}

function authUserValidation(array $data)
{
    unset($_SESSION['login']);
    $_SESSION['login']['fields'] = $data;

    conditionRedirect(emptyFields($data, 'login'), '/login');
}

function logInErrorRedirect(string $message = 'Credentials are not valid')
{
    notify($message, 'danger');
    redirect('/login');
}