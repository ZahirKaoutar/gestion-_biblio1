











<section class="container mx-auto p-6 min-h-screen">
    <?php
if(isset($_SESSION['reader'])){
    $readers=$_SESSION['reader'];
    
    


}

?>
 
  <div class="bg-white rounded-xl shadow-lg p-8">
    
    <!-- En-tête -->
    <div class="flex justify-between items-center mb-8 pb-4 border-b">
      <div>
        <h1 class="text-3xl font-bold text-gray-800">Liste des Lecteurs</h1>
          <p class="text-gray-500 mt-1"><?php echo count($readers); ?> lecteurs inscrits</p>
      
      </div>
     
    </div>

    <!-- Tableau -->
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead>
          <tr class="bg-gray-800 text-white">
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider rounded-tl-lg">
              Nom
            </th>
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">
              Email
            </th>
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider rounded-tr-lg">
              Prénom
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach($readers as $reader): ?>
          <tr class="hover:bg-blue-50 transition">
            <td class="px-6 py-4 text-gray-800 font-medium">
              <?php echo  htmlspecialchars( $reader->getLastName()); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <a href="mailto:<?php echo  htmlspecialchars( $reader->getEmail()); ?>" 
                 class="text-blue-600 hover:underline">
                <?php echo htmlspecialchars( $reader->getEmail()); ?>
              </a>
            </td>
            <td class="px-6 py-4 text-gray-800">
              <?php echo  htmlspecialchars($reader->getFirstName()); ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>


</section>



<?php unset($readers);?>
























