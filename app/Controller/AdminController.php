<?php
require_once __DIR__ . "/../config/Data.php";
 class AdminController{
    public $db;
      public $error = [
        "author" => "",
        "year"   => "",
        "title"  => "",
        "status" => ""
    ];

 public function __construct(){
    $this->db=Database::getInstance()->getConnection();
    

 }
 public function AfficheLivre(){
    $req="SELECT *FROM books";
    $stm=$this->db->prepare($req);
    $stm->execute();
    $res=$stm->fetchAll(PDO::FETCH_ASSOC);

    
    
        $ListBook=[];
        foreach ($res as $data) {
            $ListBook[]=new Book($data['title'],$data['author'],$data['year'],$data['status'],$data['id']);
           
        }

        
       
        $_SESSION['ListBook']=$ListBook;
          $content= __DIR__ ."/../views/Admin/AfficheLivre.views.php";
            include __DIR__ . "/../templates/Layout.php";
        exit;
    }


 
public function Deletebook(){
    $id=$_POST['id'];
    $req="DELETE FROM books where id=?";
    $stm=$this->db->prepare($req);
    $stm->bindParam(1,$id,PDO::PARAM_INT);
    
   

    
    
        
        if($stm->execute()){
             $_SESSION['DeleteSucces']="action Delete bien fait";
          $content= __DIR__ ."/../views/Admin/AfficheLivre.views.php";
            include __DIR__ . "/../templates/Layout.php";
        exit;
        }
       
       
    }
public function Modviews(){
            $id=$_POST['id'];
     $req="SELECT *FROM books where id=?";
    $stm=$this->db->prepare($req);
    $stm->bindParam(1,$id,PDO::PARAM_INT);
    $stm->execute();
    $res=$stm->fetch(PDO::FETCH_ASSOC);

            $_SESSION['bookmod']=$res;
   
          $content= __DIR__ ."/../views/Admin/AfficheLivre.views.php";
            include __DIR__ . "/../templates/Layout.php";
       
       
       
    }






 public function ModBook(){
            $id=$_POST['id'];
     if ($_SERVER["REQUEST_METHOD"] === "POST") {
      

        $author = trim($_POST['author']);
        $year   = trim($_POST['year']);
        $title  = trim($_POST['title']);
        $status = trim($_POST['status']);

        if (empty($title))  $this->error["title"]  = "Champ titre obligatoire";
        if (empty($year))   $this->error["year"]   = "Champ année obligatoire";
        if (empty($author)) $this->error["author"] = "Champ auteur obligatoire";
        if (empty($status)) $this->error["status"] = "Champ statut obligatoire";

        if (
            empty($this->error['author']) &&
            empty($this->error['year']) &&
            empty($this->error['title']) &&
            empty($this->error['status'])
        ) {
            $req = "UPDATE books 
                    SET author = ?, title = ?, year = ?, status = ?
                    WHERE id = ?";
            $stm = $this->db->prepare($req);

            $stm->bindParam(1, $author, PDO::PARAM_STR);
            $stm->bindParam(2, $title, PDO::PARAM_STR);
            $stm->bindParam(3, $year, PDO::PARAM_STR);
            $stm->bindParam(4, $status, PDO::PARAM_STR);
            $stm->bindParam(5, $id, PDO::PARAM_INT);

            $stm->execute();

            $_SESSION['mod'] = "Livre modifié avec succès";
            header("Location:/AfficheBook");
            exit();
        } else {
            $_SESSION["moderror"] = $this->error;
            header("Location:/modBook" );
            exit();
        }
    }
       
       
       
    }


public function AddBook(){
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
      

        $author = trim($_POST['author']);
        $year   = trim($_POST['year']);
        $title  = trim($_POST['title']);
        $status = trim($_POST['status']);

        if (empty($title))  $this->error["title"]  = "Champ titre obligatoire";
        if (empty($year))   $this->error["year"]   = "Champ année obligatoire";
        if (empty($author)) $this->error["author"] = "Champ auteur obligatoire";
        if (empty($status)) $this->error["status"] = "Champ statut obligatoire";

        if (
            empty($this->error['author']) &&
            empty($this->error['year']) &&
            empty($this->error['title']) &&
            empty($this->error['status'])
        ) {
            $req = "INSERT INTO books (author,title,year,status)values(?,?,?,?)";
            $stm = $this->db->prepare($req);

            $stm->bindParam(1, $author, PDO::PARAM_STR);
            $stm->bindParam(2, $title, PDO::PARAM_STR);
            $stm->bindParam(3, $year, PDO::PARAM_STR);
            $stm->bindParam(4, $status, PDO::PARAM_STR);
          

            $stm->execute();

            $_SESSION['addbook'] = "Livreajoute avec succès";
            header("Location:/AfficheBook");
            exit();

        }
            
         else {
            $_SESSION["adderror"] = $this->error;
            header("Location:/addbook" );
            exit();
        }
    }



}
public function AfficherReader(){
    $req="SELECT*FROM users where role='reader'";
    $stm=$this->db->prepare($req);
    $stm->execute();
    $res=$stm->fetchAll(PDO::FETCH_ASSOC);
    $data=[];
    foreach($res as $r){
        $data[]=new Reader($r['id'],$r['firstName'],$r['lasName'],$r['email'],$r['password'],$r['role']);

    }
    $_SESSION["reader"]=$data;
    header("Location:/AfficheReader");
    exit;
}

public function Emprunt(){
    $req="SELECT u.firstName ,u.lastName,u.email,bk.author,bk.title,br.returnDate,br.borrowDate from borrows br INNER JOIN u users 
    ON br.readerId=u.id ,
    INNER JOIN  bk books ON bk.id=br.booID
    where bk.status='borrowed'  ";
    $stm=$this->db->prepare($req);
    $stm->execute();
    $res=$stm->fetchAll(PDO::FETCH_ASSOC);
    $data = [];
    foreach($res as $row){
        $data[] = [
            
            'lecteur'     => $row['firstName'] . ' ' . $row['lastName'],
            'email'          => $row['email'],
            'auteur'      => $row['author'],
            'livre'       => $row['title'],
            
            'borrowDate'  => $row['borrowDate'],
            'returnDate'  => $row['returnDate']   ];

    }
    $_SESSION["emprunts"] = $data;

    $content = __DIR__ . "/../views/Admin/ListeEmprunt.views.php"; 
    include __DIR__ . "/../template/Layout.php";
    exit;


}
public function voirProfile(){
    if(isset($_SESSION['PersonLog'])){
        $userid=$_SESSION['PersonLog']->getId();
    }
    $req="SELECT *FROM users where id=?";
    $stm=$this->db->prepare($req);
    $stm->bindParam(1,$userid,PDO::PARAM_INT);
    $stm->execute();
    $data=$stm->fetch(PDO::FETCH_ASSOC);
    if($data['role']==='admin'){
        $_SESSION['user']=new Admin($data['id'],$data['firstName'],$data['lastName'],$data['email'],$data['password'],$data['role']);
        $content = __DIR__ . "/../views/Profile.views.php"; 
        include __DIR__ . "/../template/Layout.php";
        exit;
        
    }else{
        $_SESSION['user']=new Reader($data['id'],$data['firstName'],$data['lastName'],$data['email'],$data['password'],$data['role']);
        $content = __DIR__ . "/../views/Profile.views.php"; 
        include __DIR__ . "/../template/Layout.php";
        exit;

    }

}


}
 
















 














?>