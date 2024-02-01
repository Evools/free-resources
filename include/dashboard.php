<?php
require_once "class/Database.php";
require_once "class/Auth.php";
require_once "class/Category.php";

$db = new Database();
$conn = $db->getConnection();
$dashboard = new Auth($conn);
$userCount = $dashboard->getUsersCount();

$category = new Category($conn);
$categories = $category->getAllCategories();
?>


<div class="container mx-auto p-4">
  <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-lg border p-4 transition duration-300 ease-in-out transform">
      <div class="flex items-center justify-between mb-4">
        <div class="flex items-center">
          <div class="ml-3">
            <div class="flex items-center gap-4">
              <div class="bg-blue-500 text-white rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 0a2 2 0 0 1 2 2v4a2 2 0 0 1-1.715 1.977A7.998 7.998 0 0 0 18 12a8 8 0 1 0-16 0 7.998 7.998 0 0 0 7.715-7.023A2 2 0 0 1 10 6V2a2 2 0 0 1 2-2zM9 18a9.978 9.978 0 0 1-5.047-1.365A9.978 9.978 0 0 1 1 10a9.978 9.978 0 0 1 2.953-7.07A10 10 0 1 1 10 20a9.978 9.978 0 0 1 0-2zM2 10a8 8 0 0 0 8 8v-2a6 6 0 1 1-2.343-4.686 2 2 0 0 1-1.575.975A7.963 7.963 0 0 0 2 10zm10-6a6 6 0 0 1 6 6h-2a4 4 0 1 0-8 0H4a6 6 0 0 1 6-6zm6 6a6 6 0 0 0-4.688 8.68 8 8 0 0 0 2.743-6.222A6 6 0 0 0 18 10zm-2 0a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <p class="text-lg font-semibold text-gray-800">Пользователи</p>
            </div>
            <p class="text-gray-600 text-xl font-bold"><?= $userCount; ?> всего</p>
            <p class="text-gray-600"><?= $newUsersCount = 15; ?> новых за неделю</p>
          </div>
        </div>
      </div>
    </div>


    <div class="bg-white rounded-lg border p-4">
      <div class="mb-4">
        <div>
          <div class="flex items-center gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2 4a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4zm2 0v10h12V4H4z" />
            </svg>
            <p class="text-lg font-semibold text-gray-800">Статьи</p>
          </div>
          <p class="text-gray-600 text-xl font-bold">100</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg border p-4">
      <div class="mb-4">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M2 4a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4zm2 0v10h12V4H4z" clip-rule="evenodd" />
          </svg>
          <p class="text-lg font-semibold text-gray-800">Категории</p>
        </div>
        <div class="flex flex-wrap mt-2">
          <?php foreach ($categories as $category) : ?>
            <span class="mr-2 mb-2 px-2 py-1 bg-indigo-100 text-indigo-800 rounded-full"><?= $category['name_category'] ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-8 flex items-center gap-4">
    <a href="/add-post" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Добавить пост</a>
    <a href="/add-category" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">Добавить категорию</a>
    <a href="/add-users" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 transition">Добавить пользователя</a>
  </div>
</div>