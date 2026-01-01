<section class="p-6 bg-gray-100 min-h-screen rounded-lg">
<?php if(isset($_SESSION['ListBook'])):
    $books = $_SESSION['ListBook']; 
?>
    
    <h1 class="text-center font-extrabold text-2xl text-blue-600 mb-6">Liste des Livres</h1>
    <div class="text-center mb-6">
      <a href="/AddBook" 
         class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
        + Ajouter un Livre
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 rounded-lg bg-white shadow-lg">
        <thead>
          <tr class="bg-blue-600 text-white">
            <th class="px-4 py-3 text-left">Titre</th>
            <th class="px-4 py-3 text-left">Auteur</th>
            <th class="px-4 py-3 text-left">Année</th>
            <th class="px-4 py-3 text-left">Statut</th>
            <th class="px-4 py-3 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($books as $book): ?>
          <tr class="hover:bg-gray-50 transition">
            <td class="border px-4 py-2"><?php echo htmlspecialchars($book->getTitle()); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($book->getAuthor()); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($book->getYear()); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($book->getStatus()); ?></td>
            <td class="border px-4 py-2 flex space-x-2 justify-center">
              <form action="/Deletebook" method="post">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
                <input type="hidden" name="id" value="<?php echo $book->getId(); ?>">
                <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                  Supprimer
                </button>
              </form>
              <form action="/ModBook" method="get">
                  <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
                <input type="hidden" name="id" value="<?php echo $book->getId(); ?>">
                <button class="px-3 py-1 bg-yellow-400 text-gray-900 rounded hover:bg-yellow-500 transition">
                  Modifier
                </button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

<?php endif; ?>
</section>