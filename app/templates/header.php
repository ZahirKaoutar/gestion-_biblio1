<header class="bg-white shadow-md w-full   ">
  <nav class="container mx-auto flex flex-col md:flex-row justify-between items-center py-4">

 
    <div class="w-full md:w-auto flex justify-between items-center">
      <h1 class="text-2xl font-extrabold text-blue-600 mr-10 tracking-wide">Biblio </h1>

      <div class="menu-brger w-[40px] md:hidden cursor-pointer">
        <img src="/asset/img/menu.png" class="w-8 h-8 filter drop-shadow-md">
      </div>
    </div>

   
    <div class="MMM hidden w-full md:flex md:items-center md:justify-between mt-4 md:mt-0">

      
      <ul class="flex flex-col md:flex-row md:space-x-8 space-y-4 md:space-y-0 font-medium text-gray-600">
        <li><a href="/" class="<?= urlIs('/') ? 'text-blue-600 font-semibold':'hover:text-blue-600 transition' ?>">Accueil</a></li>
       


        <?php if(isset($_SESSION['PersonLog'])): ?>
            <?php if($_SESSION['PersonLog']->getRole()==="admin"): ?>
          <li><a href="/Admin" class="<?= urlIs('/Admin') ? 'text-blue-600 font-semibold':'hover:text-blue-600 transition' ?>">Dashbord</a></li>
          <li><a href="/AfficheBook" class="<?= urlIs('/AfficheBook') ? 'text-blue-600 font-semibold':'hover:text-blue-600 transition' ?>">les Livres</a></li>
          <li><a href="/voirProfile" class="hover:text-blue-600 transition">Profile</a></li>
          <li><a href="/Emprunt" class="hover:text-blue-600 transition">les emprunts</a></li>
            <?php endif; ?>

        <?php if($_SESSION['PersonLog']->getRole()==="reader"): ?>
          <li><a href="/LivreReader" class="hover:text-blue-600 transition">Livre</a></li>
          <li><a href="/BorrowHistory" class="hover:text-blue-600 transition">Emprunt</a></li>
          <li><a href="/voirProfile" class="hover:text-blue-600 transition">Profile</a></li>
        <?php endif; ?>
      </ul>

      <div class="flex flex-col md:flex-row md:space-x-4 space-y-3 md:space-y-0 mt-4 md:mt-0">
        <?php if($_SESSION['PersonLog']->getRole()==="reader" || $_SESSION['PersonLog']->getRole()==="admin"): ?>
          <a href="/AuthLogout"
             class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
            Logout
          </a>
        <?php endif; ?>
<?php endif; ?>
       
<?php
         if(!isset($_SESSION['PersonLog'])): ?>
          <a href="/login"
             class="px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
            Login
          </a>
          <a href="/register"
             class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Register
          </a>
        <?php endif; ?>
      
      </div>
    </div>
  </nav>
</header>
<script>
let burger = document.querySelector(".menu-brger");
burger.addEventListener("click", () => {
   document.querySelector(".MMM").classList.toggle("hidden");
});
</script>