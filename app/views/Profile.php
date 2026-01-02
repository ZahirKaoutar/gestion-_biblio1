<?php
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
}
?>

<section class="flex flex-col gap-20 p-10 w-full h-full bg-blue-600 lg:w-[20%] md:w-[40%] md:h-full md:bg-blue-600 p-6 rounded-lg">
    <h1 class="text-center text-white font-bold text-2xl mt-5">Profile</h1>
    
    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400" 
         class="w-[100px] h-[100px] ml-[50px] border rounded-2xl"/>
    
    <div class="ml-[20px] text-white"> 
        <h4 class="font-bold text-xl">Nom</h4> 
        <?=  $user->getFirstName().' '.$user->getLastName()  ?>
    </div>
    
    <div class="ml-[20px] text-white"> 
        <h4 class="font-bold text-xl">Email</h4> 
        <?= $user->getEmail(); ?>
    </div>
    
    <div class="ml-[20px] text-white"> 
        <h4 class="font-bold text-xl">Role</h4> 
        <?= $user->getRole(); ?>
    </div>
    
    
</section>
