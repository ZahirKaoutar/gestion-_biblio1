<section class="bg-gradient-to-br from-blue-50 to-gray-100 min-h-screen p-6">

<?php  
if(isset($_SESSION['bookDetaille'])){
  $livreD = $_SESSION['bookDetaille'];
}
?>

<div class="container mx-auto max-w-4xl">
  
  <!-- Bouton retour -->
  <div class="mb-6">
    <a href="/LivreReader" 
       class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-700 font-semibold transition">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
      </svg>
      <span>Retour à la liste</span>
    </a>
  </div>

  <!-- Card du livre -->
  <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
    
    <!-- En-tête -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white">
      <div class="flex items-center space-x-4 mb-4">
        <div class="bg-white/20 p-4 rounded-xl backdrop-blur-sm">
          <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
          </svg>
        </div>
        <div>
          <p class="text-blue-100 text-sm font-medium mb-1">Détails du livre</p>
          <h1 class="text-3xl font-bold"><?php echo htmlspecialchars($livreD->getTitle()); ?></h1>
        </div>
      </div>
    </div>

    <!-- Contenu -->
    <div class="p-8">
      <div class="grid md:grid-cols-2 gap-6">
        
        <!-- Auteur -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
          <div class="flex items-start space-x-4">
            <div class="bg-blue-100 p-3 rounded-lg">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            <div>
              <p class="text-sm text-gray-500 font-medium mb-1">Auteur</p>
              <p class="text-lg font-bold text-gray-800">
                <?php echo htmlspecialchars($livreD->getAuthor()); ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Année -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
          <div class="flex items-start space-x-4">
            <div class="bg-purple-100 p-3 rounded-lg">
              <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            <div>
              <p class="text-sm text-gray-500 font-medium mb-1">Année de publication</p>
              <p class="text-lg font-bold text-gray-800">
                <?php echo htmlspecialchars($livreD->getYear()); ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Statut -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 md:col-span-2">
          <div class="flex items-start space-x-4">
            <div class="bg-green-100 p-3 rounded-lg">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div>
              <p class="text-sm text-gray-500 font-medium mb-2">Statut du livre</p>
              <span class="inline-block px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-bold">
                <?php echo htmlspecialchars($livreD->getStatus()); ?>
              </span>
            </div>
          </div>
        </div>

      </div>

      <!-- Actions -->
      
    </div>

  </div>
</div>

</section>



