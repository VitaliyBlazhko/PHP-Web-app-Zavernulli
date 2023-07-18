<?php

function createUser(array $data)
{
    try {
        createUserValidation($data);

        $query = "INSERT INTO " . Tables::Users->value . " (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
        $query = DB::connect()->prepare($query);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        unset($data['password_check']);

        if ($query->execute($data)) {
            unset($_SESSION['register']);
            notify("You're successfully registered!");
            redirect('/login');
        }
    } catch (Exception $exception) {
        dd($exception->getMessage());
    }
}

function createUserValidation(array $data)
{
    unset($_SESSION['register']);
    $_SESSION['register']['fields'] = $data;
    $email = $data['email'];
    $surname = $data['surname'];
    $surnameV = DB::connect()->prepare("SELECT surname FROM users WHERE email = :email OR surname = :surname");
    $surnameV -> execute([
        'email' => $email,
    'surname' => $surname
    ]);
    if($surnameV -> fetch() > 0) {
        notify("This user is already registered!", 'danger');
       redirect('/login');

    };

    if (emptyFields($data, 'register') || !passwordValidation($data['password'], $data['password_check'])) {
        redirect('/registration');
    }
}

function passwordValidation(string $password, string $passwordCheck, string $key = 'register'): bool
{
    if (strlen($password) < 8) {
        $_SESSION[$key]['errors']['password'] = "Password length should be more than 7 symbols";
        return false;
    }

    if ($password !== $passwordCheck) {
        $_SESSION[$key]['errors']['password'] = "Passwords are not equals";
        return false;
    }

    return true;
}