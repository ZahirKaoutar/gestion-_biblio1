<?php
class ReaderController{
    private $db;
 public function __construct(){
    $this->db=Database::getInstance()->getConnection();
    

 }

    public function ListerLivre(){
        $req="SELECT *FROM  books";
        $stm=$this->db->prepare($req);
        $stm->execute();
        $res=$stm->fetchAll(PDO::FETCH_ASSOC);
        $ListBook=[];
         foreach ($res as $data) {
            $ListBook[]=new Book($data['title'],$data['author'],$data['year'],$data['status'],$data['id']);
           
        }

        
       
        $_SESSION['ListBookReder']=$ListBook;
          $content= __DIR__ ."/../views/Reader/AfficheLivre.views.php";
            include __DIR__ . "/../templates/Layout.php";
        exit;
    }

    public function viewDetaille(){
            $id=$_POST['id'];
     $req="SELECT *FROM books where id=?";
    $stm=$this->db->prepare($req);
    $stm->bindParam(1,$id,PDO::PARAM_INT);
    $stm->execute();
    $res=$stm->fetch(PDO::FETCH_ASSOC);

            $_SESSION['bookDetaille']= new Book($res['title'],$res['author'],$res['year'],$res['status'],$res['id']);
   
          $content= __DIR__ ."/../views/Admin/DetaillLivre.views.php";
            include __DIR__ . "/../templates/Layout.php";
            exit;
       
       

    }
}




























?>