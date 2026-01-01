<?php
require_once __DIR__ . "/../config/Data.php";


class AuthController {
    public $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function Register() {
        $errors = ["nom"=>"","prenom"=>"","email"=>"","password"=>""];
        
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $content = __DIR__ . "/../views/Register.views.php";
            require_once __DIR__ . "/../templates/Layout.php";
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $prenom  = trim($_POST["firstName"]);
            $nom     = trim($_POST["lastName"]);
            $email   = trim($_POST['email']);
            $password= trim($_POST['password']);
              if (empty($nom))     $errors['nom']     = "Remplir le champ obligatoire";

            if (empty($prenom))  $errors['prenom']  = "Remplir le champ obligatoire";
          
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
                $errors['email'] = "Email invalide";
            if (empty($password)) 
                $errors['password'] = "Mot de passe obligatoire";

            if (empty($errors['email']) && empty($errors['nom']) && empty($errors['prenom']) && empty($errors['password'])) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $req = "INSERT INTO users (firstName,lastName,email,password) VALUES (?,?,?,?)";
                $stm = $this->db->prepare($req);
                $stm->bindParam(1, $prenom, PDO::PARAM_STR);
                $stm->bindParam(2, $nom, PDO::PARAM_STR);
                $stm->bindParam(3, $email, PDO::PARAM_STR);
                $stm->bindParam(4, $hashedPassword, PDO::PARAM_STR);

                if ($stm->execute()) {
                    $_SESSION["succes"] = "Maintenant tu es membre";
                    header("Location:/login");
                    exit;
                }
            } else {
                $_SESSION["errors"] = $errors;
                header("Location:/register");
                exit;
            }
        }
    }

    public function Login() {
       

        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $content = __DIR__ . "/../views/Login.views.php";
            require_once __DIR__ . "/../templates/Layout.php";
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $password = trim($_POST["password"]);
            $email    = trim($_POST['email']);

            $req = "SELECT * FROM users WHERE email=?";
            $stm = $this->db->prepare($req);
            $stm->bindParam(1, $email, PDO::PARAM_STR);
            $stm->execute();
            $data = $stm->fetch(PDO::FETCH_ASSOC);

            
            if (!empty($password) && $data && password_verify($password, $data['password'])) {
                if ($data['role'] === 'admin') {
                    $personLog = new Admin($data['id'], $data['firstName'], $data['lastName'], $data['email'], $data['password'], $data['role']);
                } else {
                    $personLog = new Reader($data['id'], $data['firstName'], $data['lastName'], $data['email'], $data['password'], $data['role']);
                }
                $_SESSION["PersonLog"] = $personLog;
                header("Location:/");
                exit;
            } else {
                
                $_SESSION["errors"] =  "Email ou mot de passe incorrect";;
                header("Location:/login");
                exit;
            }
        }
    }
}
?>
