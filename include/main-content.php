<?php

require_once "class/Database.php";
require_once "class/Posts.php";

$sql = new Database();
$conn = $sql->getConnection();

$posts = new Posts($conn);
$allPost = $posts->getAllPosts();

$itemsPerPage = 8;
$totalPages = ceil(count($allPost) / $itemsPerPage);
$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($current_page - 1) * $itemsPerPage;
$current_page_items = array_slice($allPost, $offset, $itemsPerPage);




?>

<div class="bg-gradient-to-bl from-blue-50 to-violet-50 lg:h-screen overflow-scroll w-full">
  <div class="container mx-auto p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
      <?php foreach ($allPost as $cards) : ?>
        <div class="bg-white rounded-lg border p-4">
          <img src="https://placehold.co/300x200/d1d4ff/352cb5.png" alt="Placeholder Image" class="w-full h-48 rounded-md object-cover">
          <div class="px-1 py-4">
            <div class="font-bold text-xl mb-2"> <?= $cards['title']; ?> </div>
            <p class="text-gray-700 text-base">
              <?= $cards['info']; ?>
            </p>
          </div>
          <div class="px-1 py-4">
            <a href="/" class="text-blue-500 hover:underline">Подробнее →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- Пагинация -->
  <div class=" max-w-lg m-auto mt-5">
    <nav class="w-full">
      <ul class="inline-flex -space-x-px">
        <li>
          <a href="?page=<?php echo max(1, $current_page - 1); ?>" class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 ml-0 rounded-l-lg leading-tight py-2 px-3">Назад</a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
          <li>
            <a href="?page=<?php echo $i; ?>" class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 <?php echo ($i === $current_page) ? 'bg-blue-50 text-blue-600' : ''; ?> leading-tight py-2 px-3"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <li>
          <a href="?page=<?php echo min($totalPages, $current_page + 1); ?>" class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg leading-tight py-2 px-3">Вперед</a>
        </li>
      </ul>
    </nav>
  </div>
</div>