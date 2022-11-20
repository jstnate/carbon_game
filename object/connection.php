<?php

require_once 'user.php';

class Connection
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=carbon_db;host=127.0.0.1', 'root', 'root');
    }

    public function verifyUser(User $user): bool
    {
        $prepare = 'SELECT * FROM user WHERE email = :email';
        $preExe = $this->pdo->prepare($prepare);

        $preExe->execute([
            'email' => $user->email
        ]);

        $data = $preExe->fetchAll();

        if (isset($data[0]) && $user->email === $data[0]['email']) {
            $emailVerify = true;
        } else {
            $emailVerify = false;
        }

        return $emailVerify;
    }

    public function insertUser(User $user): bool
    {
        $query = 'INSERT INTO user (name, email, password, function)
                    VALUES (:name, :email, :password, :function)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'name' => $user->name,
            'email' => $user->email,
            'password' => md5($user->password . 'SALT'),
            'function' => $user->function,
        ]);
    }

    public function loginVerify(User $user): bool
    {
        $query = 'SELECT * FROM user WHERE email = :email';
        $statement = $this->pdo->prepare($query);

        $statement->execute([
            'email' => $user->email
        ]);

        $data = $statement->fetch();

        $passVerified = false;

        if (isset($data[0]) && md5($user->password . 'SALT') === $data['password']) {
            $passVerified = true;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['user_email'] = $data['email'];
            $_SESSION['user_password'] = $data['password'];
            $_SESSION['function'] = $data['function'];
        }

        return $passVerified;
    }
}