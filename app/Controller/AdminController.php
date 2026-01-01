<?php
require_once __DIR__ . "/../config/Data.php";
 class AdminController{
    public $db;

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


 }

 
















 














?>