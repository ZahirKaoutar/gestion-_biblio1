<?php
require_once __DIR__ . "/../config/Data.php";
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
          $content= __DIR__ ."/../views/Reader/LivreAffiche.views.php";
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
    
            $content= __DIR__ ."/../views/Reader/DetaillLivre.views.php";
                include __DIR__ . "/../templates/Layout.php";
                exit;
        
       

    }
    public function EmprunteLivre(){

        $id=$_POST['id'];
        $req="UPDATE   books  set status='borrowed' where id=? and status='available' ";
        $stm=$this->db->prepare($req);
        $stm->bindParam(1,$id,PDO::PARAM_INT);
        $stm->execute();
        $res=$stm->fetch(PDO::FETCH_ASSOC);
        if(isset($_SESSION["PersonLog"] )){
            if($_SESSION["PersonLog"]->getRole()==='reader'){
                $userid=$_SESSION["PersonLog"]->getId();
                $req="INSERT INTO borrows (readerId, bookId,borrowDate) VALUES (?, ?, NOW())";
                  $stm=$this->db->prepare($req);
                    $stm->bindParam(1,$userid,PDO::PARAM_INT);
                    $stm->bindParam(2, $id, PDO::PARAM_INT);
                    $stm->execute();
                     $_SESSION["succesEmp"] = "Le livre est emprunte";
                     header("location:/LivreReader");
                        exit;

            }
        }

    }

    public function voirmesEmprunt(){
           
    

      if(isset($_SESSION["PersonLog"] )){
            if($_SESSION["PersonLog"]->getRole()==='reader'){
                $userid=$_SESSION["PersonLog"]->getId();

                $req = "SELECT b.title, b.author, br.borrowDate, br.returnDate
                        FROM books b
                        INNER JOIN borrows br ON b.id = br.bookId
                        WHERE br.readerId = ?
                        ORDER BY br.borrowDate DESC";
                $stm = $this->db->prepare($req);
                $stm->bindParam(1, $readerId, PDO::PARAM_INT);
                $stm->execute();

                $history = $stm->fetchAll(PDO::FETCH_ASSOC);

                $_SESSION['borrowHistory'] = $history;

                $content = __DIR__ . "/../views/Reader/HistriqueEmp.views.php";
                include __DIR__ . "/../templates/Layout.php";
}
    }
}
    public function returnbook() {
  $id=$_POST['bookId'];

   if(isset($_SESSION["PersonLog"] )){
            if($_SESSION["PersonLog"]->getRole()==='reader'){



                 $req = "UPDATE borrows 
            SET returnDate = NOW() 
            WHERE bookId = ? AND readerId = ? AND returnDate IS NULL";
            $stm = $this->db->prepare($req);
            $stm->bindParam(1, $id, PDO::PARAM_INT);
            $stm->bindParam(2, $readerId, PDO::PARAM_INT);
            $stm->execute();
            
                 $reqUpdate = "UPDATE books SET status = 'available' WHERE id = ?";
                $stmUpdate = $this->db->prepare($reqUpdate);
                $stmUpdate->bindParam(1, $id, PDO::PARAM_INT);
                $stmUpdate->execute();
                 $_SESSION["succes"] = "Le livre est retourné";

    
                header("Location:/LivreReader");
                exit;
            }}

   



   
}





}






















?>