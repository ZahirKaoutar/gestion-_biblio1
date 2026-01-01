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

     
    <form class="max-w-xl mx-auto bg-white p-8 shadow-md rounded-lg space-y-4" method="post" action="/login">
    
     
      <input type="email" placeholder="Votre email" name="email" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors)):?>
         <p class="text-red-500"><?php echo $errors?></p>
        
      <?php endif;?>
      <input placeholder="password" name="password" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors)):?>
         <p class="text-red-500"><?php echo $errors?></p>
        
      <?php endif;?>
      <button   name="btn" class=" w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Envoyer</button>
    </form>
  </section>
  <?php if (!empty($succes)): ?>
<div class="overlay">
  <div class="popup">
    <?= $succes?>
    <button class="btn">OK</button>
  </div>
</div>

<script>
   let overlay = document.querySelector(".overlay");
   overlay.style.cssText = "display:flex;justify-content:center;align-items:center;position:fixed;top:0;left:0;background:rgba(0,0,0,0.5);z-index:999;height:100%;width:100%;";

   let popup = document.querySelector(".popup");
   popup.style.cssText = "background:green;color:white;padding:20px;border-radius:8px;display:flex;flex-direction:column;align-items:center;";

   let btn = document.querySelector(".btn");
   btn.addEventListener("click", () => {
       overlay.remove(); 
   });
</script>
<?php endif; ?>