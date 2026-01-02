<?php


if(isset($_SESSION['PersonLog'])){
    if($_SESSION['PersonLog']->getRole()==="reader"){
        echo $_SESSION['PersonLog']->getFirstName();

    }else{
     echo $_SESSION['PersonLog']->getLastName()."//" .$_SESSION['PersonLog']->getRole();
}
        
}














?>