<section class="bg-gradient-to-br from-blue-50 to-gray-100 min-h-screen p-6">

<?php
if(isset($_SESSION['ListBookReder']) ):
  $books = $_SESSION['ListBookReder'];

 


?>


<div class="container mx-auto">
  
  <!-- En-tête -->
  <div class="bg-white rounded-2xl shadow-xl p-8 mb-6">
    <div class="flex flex-col md:flex-row justify-between items-center">
      <div class="mb-4 md:mb-0">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">📖 Bibliothèque</h1>
        <p class="text-gray-500">Parcourez et empruntez des livres</p>
      </div>
     </div><div></div>

  <!-- Tableau -->
  <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead>
          <tr class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">
              Titre
            </th>
            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">
              Statut
            </th>
            <th class="px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">
              Actions
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach($books as $book): ?>
          <tr class="hover:bg-blue-50 transition-colors">
            
            <!-- Titre -->
            <td class="px-6 py-4">
              <p class="text-lg font-semibold text-gray-800">
                <?php echo htmlspecialchars($book->getTitle()); ?>
              </p>
            </td>
            
            <
            <td class="px-6 py-4">
              <?php if ($book->getStatus() === 'available'): ?>
                <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                  <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                  </svg>
                  Disponible
                </span>
              <?php else: ?>
                <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium">
                  <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                  </svg>
                  Emprunté
                </span>
              <?php endif; ?>
            </td>
            
            <!-- Actions -->
            <td class="px-6 py-4">
              <div class="flex justify-center items-center space-x-2">
                
                
                <?php if ($book->getStatus() === 'available'): ?>
                  <form action="/EmprunteLivre" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($book->getId()); ?>"/>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow hover:shadow-md transform hover:scale-105 font-medium flex items-center space-x-1">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                      </svg>
                      <span>Emprunter</span>
                    </button>
                  </form>
                <?php endif; ?>
                
                
                <?php if ($book->getStatus() === 'borrowed' ): ?>
                  <form method="post" action="/returnBook">
                    <input type="hidden" name="bookId" value="<?php echo htmlspecialchars($book->getId()); ?>">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow hover:shadow-md transform hover:scale-105 font-medium flex items-center space-x-1">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                      </svg>
                      <span>Retourner</span>
                    </button>
                  </form>
                <?php endif; ?>
                
               
                <form action="/Detaille" method="post">
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($book->getId()); ?>"/>
                  <button class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition shadow hover:shadow-md transform hover:scale-105 font-medium flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Détails</span>
                  </button>
                </form>
                
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php endif; ?>

                </section>
<?php if (!empty($succesAdd)): ?>
<div class="overlay">
  <div class="popup">
    <?= $succesAdd?>
    <button class="btn">OK</button>
  </div>
</div>
<?php endif; ?>
<!--  if (!empty($empr)): ?>
<div class="overlay">
  <div class="popup">
    <?= $empr?>
    <button class="btn">OK</button>
  </div>
</div>
 -->

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
                
                
                
                
                
                
                
                
                