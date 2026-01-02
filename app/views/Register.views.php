<?php

$errors=[];
$succes;
if(isset($_SESSION["succes"])){
    $succes=$_SESSION["succes"];

}
if(isset($_SESSION["errors"])){
    $errors= $_SESSION["errors"];

}
unset($_SESSION["errors"]);
unset($_SESSION["succes"]);



?>









<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>

     
    <form class="max-w-xl mx-auto bg-white p-8 shadow-md rounded-lg space-y-4" method="post" action="/register">
      <input type="text" placeholder="Votre nom"  name="firstName" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors["nom"])):?>
         <p class="text-red-500"><?php echo $errors["nom"]?></p>
        
      <?php endif;?>
        <input type="text" placeholder="Votre nom"  name="lastName" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors["prenom"])):?>
         <p class="text-red-500"><?php echo $errors["prenom"]?></p>
        
      <?php endif;?>
     
      <input type="email" placeholder="Votre email" name="email" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors["email"])):?>
         <p class="text-red-500"><?php echo $errors["email"]?></p>
        
      <?php endif;?>
      <input placeholder="password" name="password" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors["password"])):?>
         <p class="text-red-500"><?php echo $errors["password"]?></p>
        
      <?php endif;?>
      <button   name="btn" class=" w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Envoyer</button>
    </form>
  </section>
 