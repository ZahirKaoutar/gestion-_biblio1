



<?php
$errors=[];

if(isset($_SESSION['moderror'])){
   $errors=$_SESSION['moderror'];
}

unset($_SESSION['moderror']);




?>




?>








<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold mb-6 text-center">ModifierBOOK</h2>
   
  <?php if(isset($_SESSION['bookmod'])){
      $livremod=$_SESSION['bookmod'];
      
    }?>

     
    <form class="max-w-xl mx-auto bg-white p-8 shadow-md rounded-lg space-y-4" method="post" action="/modBook">
      
      <input type="hidden" name="idbook" value="<?php echo  htmlspecialchars( $livremod->getId()) ?>">
      <input type="text" placeholder="titre de book" value="<?php echo  htmlspecialchars( $livremod->getTitle()) ?>" name="title" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors["title"])):?>
         <p class="text-red-500"><?php echo $errors["title"]?></p>
        
      <?php endif;?>
      <input type="text" placeholder="author"  value="<?php echo  htmlspecialchars($livremod->getAuthor()) ?>"name="author" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors["author"])):?>
         <p class="text-red-500"><?php echo $errors["author"]?></p>
        
      <?php endif;?>
     
      <input type="text" placeholder="year"  value="<?php echo $livremod->getYear() ?>"name="year" class="w-full border px-4 py-2 rounded-lg">
      <?php if(!empty($errors["year"])):?>
         <p class="text-red-500"><?php echo $errors["year"]?></p>
        
      <?php endif;?>
      <select name="status" class="w-full border px-4 py-2 rounded-lg">
         <option value="available"<?php echo $livremod->getStatus()==="available"? 'selected':''?>>available</option>
         <option value="borrowed"<?php echo $livremod->getStatus()==="borrowed"? 'selected':''?>>borrowed</option>
      </select>
      <?php if(!empty($errors["status"])):?>
         <p class="text-red-500"><?php echo $errors["status"]?></p>
        
      <?php endif;?>
      <button   name="btn" class=" w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Envoyer</button>
    </form>
  </section>






















?>