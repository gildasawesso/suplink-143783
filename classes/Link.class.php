<?php
require_once('constant/info_db.php');

Class Link {

    public function create_link($id_user,$name,$long_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("INSERT INTO link (id_user,name,short_link,long_link,click_total,date_create, enable)
                                        VALUES ( :id_user, :name, :short_link, :long_link, :click_total, NOW(), :enable)");

        while(true) {
            $random_url = $this->random_url();
            if(!$this->get_link_fromUrl($random_url)) {
                break;
            }
        }

        $statement->execute(
            array(':id_user' => $id_user,
                ':name' => $name,
                ':short_link' => $random_url,
                ':long_link' => $long_link,
                ':click_total' => 0,
                ':enable' => 1
            )
        );
    }

    private function random_url() {
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $url = '';
        for ($i=0; $i < 5; $i++)
            $url = $url.$alphabet[mt_rand(0,61)];
        return $url;
    }

    public function get_link_fromUser($id_user) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("SELECT * FROM link WHERE id_user = :id_user");
        $statement->execute(
            array(':id_user' => $id_user
            )
        );
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_link_fromUrl($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("SELECT * FROM link WHERE short_link = :short_link");
        $statement->execute(
            array(':short_link' => $short_link
            )
        );
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function remove_link($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("DELETE FROM link WHERE short_link = :short_link");

        $statement->execute(Array(':short_link' => $short_link));
    }

    public function add_click($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("UPDATE link SET click_total=click_total+1 WHERE short_link = :short_link");

        $statement->execute(
            array(':short_link' => $short_link)
        );


        $statement2 = $pdo->prepare("INSERT INTO clicks (short_link,date_click,referee,country)
                                        VALUES ( :short_link, NOW(), :referee, :country ) ;");

        $statement2->execute(
            array(':short_link' => $short_link,
                ':referee' => 'test',
                ':country' => 'test'
            )
        );
    }

    public function get_stats_fromUrl($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("SELECT * FROM clicks WHERE short_link = :short_link");
        $statement->execute(array(':short_link' => $short_link));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_clicks_fromUrl($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("SELECT date_click FROM clicks WHERE short_link = :short_link");
        $statement->execute(array(':short_link' => $short_link));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_enable_fromUrl($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("SELECT enable FROM link WHERE short_link = :short_link");
        $statement->execute(array(':short_link' => $short_link));
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function enable_link($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("UPDATE link SET enable = 1 WHERE short_link = :short_link");

        $statement->execute(
            array(':short_link' => $short_link)
        );
    }

    public function disable_link($short_link) {
        try {
            $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
        } catch (Exception $e) {
            echo $e;
        }
        $statement = $pdo->prepare("UPDATE link SET enable = 0 WHERE short_link = :short_link");

        $statement->execute(
            array(':short_link' => $short_link)
        );
    }
}
