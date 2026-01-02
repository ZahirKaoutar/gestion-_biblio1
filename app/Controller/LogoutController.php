<?php
class LogoutController{
 public function Logout(){
    session_unset();
    session_destroy();
    header("Location:/");
    


 }
}











?>