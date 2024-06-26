<?php
require_once "Manager.php";

class UserManager extends Manager
{
    private $users;

    public function addUser($user)
    {
        $this->users[] = $user;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function loadUsers()
    {
        $connectTest = $this->getBdd()->prepare('SELECT * FROM user');
        $connectTest->execute();
        $connectTest = $connectTest->fetchAll();

        foreach ($connectTest as $user) {
            $u = new User($user['id'], $user['roleUser'], $user['username'], $user['email'], $user['pdw'], $user['img_profil']);
            $this->addUser($u);
        }
    }

    public function profil()
    {
        $connectTest = $this->getBdd()->prepare('SELECT * FROM user WHERE id = :id');
        $connectTest->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
        $connectTest->execute();
        $Myusers = $connectTest->fetch();

        return $Myusers;
    }

    public function editMail($email)
    {
        $editMail = $this->getBdd()->prepare('UPDATE user SET email = :email WHERE id = :id');
        $editMail->bindValue(":email", $email, PDO::PARAM_STR);
        $editMail->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
        $editMail->execute();
    }

    public function editPdw($pdw)
    {
        $editPdw = $this->getBdd()->prepare('UPDATE user SET pdw = :pdw WHERE id = :id');
        $editPdw->bindValue(":pdw", $pdw, PDO::PARAM_STR);
        $editPdw->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
        $editPdw->execute();
    }

    public function newUserDB($username, $email, $pdw)
    {
        // check if submitted with post
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pdw'])) {

            if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                var_dump($_FILES['img']);
                // get details of the uploaded file
                $file_tmp = $_FILES['img']['tmp_name'];
                $file_name = $_FILES['img']['name'];
                $file_size = $_FILES['img']['size'];
                $file_type = $_FILES['img']['type'];
                $file_ext = explode('.', $file_name);

                // set upload directory
                $upload_dir = 'asset/img/';
                // set allowed file extensions
                $allowed = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

                // check if file extension is on the list of allowed ones
                if (in_array($file_type, $allowed)) {
                    // check if file size is not beyond expected size
                    if ($file_size < 2097152) {
                        // rename file
                        $file_name_new = uniqid() . '.' . $file_ext[1];
                        // and move it to the upload directory
                        if (move_uploaded_file($file_tmp, $upload_dir . $file_name_new)) {
                            // if upload was successful
                            echo 'File uploaded successfully.';

                            $req = $this->getBdd()->prepare("INSERT INTO user (username, email, pdw, img_profil) VALUES (:username, :email, :pdw, :img_profil)");
                            $req->bindValue(":username", $username, PDO::PARAM_STR);
                            $req->bindValue(":email", $email, PDO::PARAM_STR);
                            $req->bindValue(":pdw", $pdw, PDO::PARAM_STR);
                            $req->bindValue(":img_profil", $file_name_new, PDO::PARAM_STR);
                            $result = $req->execute();
                            $req->closeCursor();
                        }
                    }
                }
            }
            if ($result) {
                $user = new User($this->getBdd()->lastInsertId(), $username, $email, $pdw, $file_name_new, 0);
                $this->addUser($user);
            }
        }
    }

    public function connectUserDB()
    {
        $connectTest = $this->getBdd()->prepare('SELECT * FROM user WHERE email = :email AND pdw = :pdw');
        $connectTest->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
        $connectTest->bindValue(":pdw", $_POST['pdw'], PDO::PARAM_STR);
        $connectTest->execute();
        $connectTest = $connectTest->fetch();
        if ($connectTest) {
            $_SESSION['id'] = $connectTest['id'];
            $_SESSION['username'] = $connectTest['username'];
            $_SESSION['email'] = $connectTest['email'];
            $_SESSION['pdw'] = $connectTest['pdw'];
            $_SESSION['img_profil'] = $connectTest['img_profil'];
            $_SESSION['roleUser'] = $connectTest['roleUser'];
        }
    }

    public function deconnectUserDB()
    {
        session_destroy();
        header('Location:' . URL . 'accueil');
    }
}
