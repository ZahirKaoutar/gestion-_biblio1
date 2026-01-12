






<div class="relative h-screen">
    
    
    <div class="absolute inset-0">
      <img 
        src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1600" 
        alt="Bibliothèque" 
        class="w-full h-full object-cover"
      >
      <div class="absolute inset-0 bg-black/60"></div>
    </div>


    <div class="relative h-full flex items-center justify-center px-4">
      <div class="text-center max-w-3xl">
        
        <h1 class="text-6xl md:text-7xl font-bold text-white mb-6">
          <?php if(isset($_SESSION['PersonLog'])):?>
             <?php if($_SESSION['PersonLog']->getRole()==="admin"):?>
                 Administration;
                <?php elseif($_SESSION['PersonLog']->getRole()==="reader"): ?>
                   Bienvenue   <?php echo $_SESSION['PersonLog']->getFirstName() ?> à votre  Bibliothèque
            <?php endif; ?>
        <?php else: ?>
                 Bibliothèque
        <?php endif; ?>
           
        </h1>

      
      
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
         
         

         <?php if(!isset($_SESSION['PersonLog'])):?>
            <a href="/login" class="px-10 py-4 bg-white text-gray-900 rounded-lg hover:bg-gray-100 transition font-bold text-lg">
              Connexion
            </a>
            <a href="/register" class="px-10 py-4 bg-transparent border-2 border-white text-white rounded-lg hover:bg-white hover:text-gray-900 transition font-bold text-lg">
              Inscription
            </a>
          <?php endif; ?>
          
        </div>

       
  </section>










