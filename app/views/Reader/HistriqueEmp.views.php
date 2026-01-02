<section class="p-6 bg-gray-200 h-full rounded-lg">
    <h1 class="text-center font-bold text-lg">Mes emprunts</h1>
    <table class="min-w-full border border-gray-300 mt-6 rounded-lg bg-white shadow-md">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2 text-left">Titre</th>
                <th class="px-4 py-2 text-left">Auteur</th>
                <th class="px-4 py-2 text-left">Date d'emprunt</th>
                <th class="px-4 py-2 text-left">Date de retour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($_SESSION['borrowHistory'] as $row): ?>
            <tr class="hover:bg-gray-100">
                <td class="border px-4 py-2"><?= htmlspecialchars($row['title']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($row['author']) ?></td>
                <td class="border px-4 py-2"><?= $row['borrowDate'] ?></td>
                <td class="border px-4 py-2">
                    <?= $row['returnDate'] ? $row['returnDate'] : 'En cours' ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
