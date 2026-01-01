<?php 

 class Brow {
    private $readerId;
    private $bookId ;
    private $borrowDate;
    private $returnDate;

    public function __construct($readerId, $bookId, $borrowDate ,$returnDate){
      $this->readerId=$readerId;
      $this->bookId=$bookId;
      $this->borrowDate=$$borrowDate;
      $this->$returnDate;
    }

    public function getreaderId(){
      return $this->readerId;
    }
     public function getbookId(){
      return $this->bookId;
    }
     public function getbrrowDate(){
      return $this->borrowDate;
    }
     public function getreturnDate(){
      return $this->returnDate;
    }


 }






?>