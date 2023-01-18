<?php
require_once "Manager.php";
require_once "Anime.php";

class AnimeManager extends Manager
{
    private $animes;

    public function addAnime($anime)
    {
        $this->animes[] = $anime;
    }

    public function getAnimes()
    {
        return $this->animes;
    }

    public function loadAnimes()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM anime");
        $req->execute();
        $myAnimes = $req->fetchAll();
        $req->closeCursor();

        foreach ($myAnimes as $anime) {
            $a = new Anime($anime['id'], $anime['titre'], $anime['img'], $anime['genre'], $anime['descri'], $anime['video']);
            $this->addAnime($a);
        }
    }

    public function homeAnime()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM anime");
        $req->execute();
        $myAnimes = $req->fetchAll();
        $req->closeCursor();
        
        return $myAnimes;
    }

    public function showAnime($id)
    {
        $req = ("SELECT * FROM anime WHERE id = :id");
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $myAnimes = $statement->fetchAll();
        $statement->closeCursor();

        return $myAnimes;
    }

    public function newAnimeDB($titre, $genre, $descri, $video)
    {
        // check if submitted with post
        if (!empty($_POST['titre']) && !empty($_POST['genre']) && !empty($_POST['descri']) && !empty($_POST['video'])) {
            // $reg = "/^[a-zA-Z0-9_ -]{3,50}$/";
            // if (preg_match($reg, $_POST['titre'])) {

            // check if file was uploaded without errors
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

                            $req = "INSERT INTO anime(titre,genre,descri,img,video) VALUES 
                        (:titre,
                        :genre,
                        :descri,
                        :img,
                        :video)";


                            $titre = $_POST['titre'];
                            $genre = $_POST['genre'];
                            $descri = $_POST['descri'];
                            $video = $_POST['video'];

                            $stmt = $this->getBdd()->prepare($req);
                            $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
                            $stmt->bindValue(":genre", $genre, PDO::PARAM_STR);
                            $stmt->bindValue(":descri", $descri, PDO::PARAM_STR);
                            $stmt->bindValue(":video", $video, PDO::PARAM_STR);
                            $stmt->bindValue(":img", $file_name_new, PDO::PARAM_STR);
                            $result = $stmt->execute();
                            $stmt->closeCursor();

                            if ($result) {
                                $anime = new Anime($this->getBdd()->lastInsertId(), $titre, $genre, $descri, $video, $file_name_new);
                                $this->addAnime($anime);
                            }
                        } else {
                            echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
                        }
                    } else {
                        echo 'File size exceeds the maximum allowed size.';
                    }
                } else {
                    echo 'File type not allowed.';
                }
            } else {
                echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
            }
        }
    }

    public function getAnimeById($id)
    {
        foreach ($this->animes as $anime) {
            if ($anime->getId() == $id) {
                return $anime;
            }
        }
    }

    public function editAnimeDB($id, $titre, $genre, $descri, $video)
    {
        // check if submitted with post
        if (!empty($_POST['titre']) && !empty($_POST['genre']) && !empty($_POST['descri']) && !empty($_POST['video'])) {
            // $reg = "/^[a-zA-Z0-9_ -]{3,50}$/";
            // if (preg_match($reg, $_POST['titre'])) {

            // check if file was uploaded without errors
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
                            $img = $file_name_new;
                            
                        } else {
                            echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
                        }
                    } else {
                        echo 'File size exceeds the maximum allowed size.';
                    }
                } else {
                    echo 'File type not allowed.';
                }
            } else {
                $req = ("SELECT img FROM anime WHERE id = :id");
                $statement = $this->getBdd()->prepare($req);
                $statement->bindValue(":id", $id, PDO::PARAM_INT);
                $statement->execute();
                $myImg = $statement->fetch();
                $img = $myImg['img'];
                $statement->closeCursor();
            }

            $req = ("UPDATE anime SET titre = :titre, genre = :genre, descri=:descri, video = :video, img = :img WHERE id = :id");
                            $statement = $this->getBdd()->prepare($req);
                            $statement->bindValue(":id", $id, PDO::PARAM_INT);
                            $statement->bindValue(":titre", $titre, PDO::PARAM_STR);
                            $statement->bindValue(":genre", $genre, PDO::PARAM_STR);
                            $statement->bindValue(":descri", $descri, PDO::PARAM_STR);
                            $statement->bindValue(":video", $video, PDO::PARAM_STR);
                            $statement->bindValue(":img", $img, PDO::PARAM_STR);
                            $result = $statement->execute();
                            $statement->closeCursor();

                            if ($result) {
                                $this->getAnimeById($id)->setTitre($titre);
                                $this->getAnimeById($id)->setGenre($genre);
                                $this->getAnimeById($id)->setDescri($descri);
                                $this->getAnimeById($id)->setVideo($video);
                                $this->getAnimeById($id)->setImg($img);
                            }
        }
    }

    public function deleteAnimeDB($id)
    {
        $req = "DELETE FROM anime WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if ($result) {
            $anime = $this->getAnimeById($id);
            unset($anime);
        }
    }
}



// public function updateProduct($id, $name, $description, $price, $categorie)
//     {
//         echo 'on est là';
//         if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['categorie'])) {
//             if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
//                 echo 'si si';
//                 var_dump($_FILES['img']);
//                 // get details of the uploaded file
//                 $file_tmp = $_FILES['img']['tmp_name'];
//                 $file_name = $_FILES['img']['name'];
//                 $file_size = $_FILES['img']['size'];
//                 $file_type = $_FILES['img']['type'];
//                 $file_ext = explode('.', $file_name);
//                 // set upload directory
//                 $upload_dir = 'public/assets/product/';
//                 // set allowed file extensions
//                 $allowed = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

//                 // check if file extension is on the list of allowed ones
//                 if (in_array($file_type, $allowed)) {
//                     // check if file size is not beyond expected size
//                     if ($file_size < 2097152) {
//                         // rename file
//                         $file_name_new = uniqid() . '.' . $file_ext[1];
//                         // and move it to the upload directory
//                         if (move_uploaded_file($file_tmp, $upload_dir . $file_name_new)) {
//                             // if upload was successful
//                             echo 'File uploaded successfully.';
//                             $img = $file_name_new;
//                         } else {
//                             echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
//                         }
//                     } else {
//                         echo 'File size exceeds the maximum allowed size.';
//                     }
//                 } else {
//                     echo 'File type not allowed.';
//                 }
//             } else {
//                 // code pour récupérer la valeur de l'image dans la base de données
//                 $bdd = $this->getBdd();
//                 $query = "SELECT img FROM products WHERE id = :id";
//                 $stmt = $bdd->prepare($query);
//                 $stmt->bindValue(':id', $id);
//                 $stmt->execute();
//                 $result = $stmt->fetch();
//                 $img = $result['img'];
//                 $stmt->closeCursor();
//             }
//             // code pour mettre à jour les informations du produit dans la base de données
//             $bdd = $this->getBdd();
//             $query = "UPDATE products SET name = :name, description = :description, price = :price, img = :img, categorie = :categorie WHERE id = :id";
//             $stmt = $bdd->prepare($query);
//             $stmt->bindValue(':name', $name);
//             $stmt->bindValue(':description', $description);
//             $stmt->bindValue(':price', $price);
//             $stmt->bindValue(':img', $img);
//             $stmt->bindValue(':categorie', $categorie);
//             $stmt->bindValue(':id', $id);
//             $stmt->execute();
//             $stmt->closeCursor();
//         }
//     }