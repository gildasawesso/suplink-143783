<?php
require_once('constant/info_db.php');



Class User {

    private $email, $password, $verif, $verif_hash;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = crypt($password,'ec9c3a34e791bda21bbcb69ea0eb875857497e0d48c75771b3d1adb5073ce791');
    }

    public function log_in() {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
        $statement->execute(
            array(':email' => $this->email,
                ':password' => $this->password
            )
        );

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function already_exist() {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("SELECT email FROM user WHERE email = :email");
        $statement->execute(array(':email' => $this->email));
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function register() {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("INSERT INTO user (email, password, date_inscription, verif, verif_hash)
                                        VALUES ( :email, :password, NOW(), :verif, :verif_hash )");

        $statement->execute(
            array(':email' => $this->email,
                ':password' => $this->password,
                ':verif' => 0,
                ':verif_hash' => crypt(($this->email.date(DATE_RFC822)),"ec9c3a34e791bda21bbcb69ea0eb875857497e0d48c75771b3d1adb5073ce791")
            )
        );
    }
}
