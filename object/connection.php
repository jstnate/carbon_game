<?php

require_once 'user.php';

class Connection
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=carbon_db;host=127.0.0.1', 'root', 'root');
    }

    public function VerifyUser(User $user): bool
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

    public function InsertUser(User $user): bool
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

    public function LoginVerify(User $user): bool
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

    public function GetUsers()
    {
        $query = 'SELECT * FROM user ORDER BY id';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;

    }

    public function CreateAdmin($id)
    {
        $query = "UPDATE user SET function = 'admin' WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute(array($id));
        return true;
    }

    public function Authorize($id)
    {
        $query = "UPDATE user SET function = 'yes' WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute(array($id));
        return true;
    }

    public function Unauthorize($id)
    {
        $query = "UPDATE user SET function = 'no' WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute(array($id));
        return true;
    }

    public function DeleteUser($id)
    {
        $query = "DELETE FROM user WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute(array($id));
        return true;
    }

    public function insertCard(Card $card): bool
    {
        $query = 'INSERT INTO cards (card_name, carbon, description, image_url)
                    VALUES (:card_name, :carbon, :description, :image_url)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'card_name' => $card->card_name,
            'carbon' => $card->carbon,
            'description' => $card->description,
            'image_url' => $card->image,
        ]);
    }
    public function GetCards()
    {
        $query = 'SELECT * FROM cards ORDER BY id';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;

    }

    public function insertMessage(Message $message): bool
    {
        $query = 'INSERT INTO messages (family_name, name, email, society, subject, description)
                    VALUES (:family_name, :name, :email, :society, :subject, :description)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'family_name' => $message->family_name,
            'name' => $message->name,
            'email' => $message->email,
            'society' => $message->society,
            'subject' => $message->subject,
            'description' => $message->description,

        ]);
    }

    public function GetMessages()
    {
        $query = 'SELECT * FROM messages ORDER BY id';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;

    }

    public function GetSingleCard($id): bool|array
    {
        $get = "SELECT * FROM cards WHERE id = $id";
        $request2 = $this->pdo->query($get);
        return $request2->fetchAll();
    }

    public function ModifyCard(Card $card)
    {
        $query = 'UPDATE cards SET card_name = :card_name, carbon = :carbon, description = :description, image_url = :image_url WHERE id = :id';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'card_name' => $card->card_name,
            'carbon' => $card->carbon,
            'description' => $card->description,
            'image_url' => $card->image,
            'id' => $_POST['card_id'],
        ]);
    }

}