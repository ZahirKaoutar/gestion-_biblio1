<section class="p-6 bg-gray-100 min-h-screen rounded-lg">
  <h1 class="text-center font-extrabold text-2xl text-blue-600 mb-6">Liste des Emprunts</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 rounded-lg bg-white shadow-lg">
      <thead>
        <tr class="bg-blue-600 text-white">
          <th class="px-4 py-3 text-left">Lecteur</th>
          <th class="px-4 py-3 text-left">Livre</th>
          <th class="px-4 py-3 text-left">Auteur</th>
          <th class="px-4 py-3 text-left">Date d'emprunt</th>
          <th class="px-4 py-3 text-left">Date de retour</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($_SESSION['emprunts'] as $emp): ?>
        <tr class="hover:bg-gray-50 transition">
          <td class="border px-4 py-2"><?= htmlspecialchars($emp['lecteur']); ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($emp['livre']); ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($emp['auteur']); ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($emp['borrowDate']); ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($emp['returnDate']); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?php unset($_SESSION['emprunts'])?>