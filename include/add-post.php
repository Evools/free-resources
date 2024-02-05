<div class="flex flex-col container mx-auto p-4 overflow-y-scroll">
  <?php

  if (isset($_POST['add-post'])) {
    // $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    // $image = $_POST['image'];
    $info = $_POST['info'];
    // $file = $_POST['file'];
    // $category_id = $_POST['category_id'];
    $date = date('Y-m-d');
    $error;

    echo "{$title} <br> {$description} <br> {$info} <br> {$date}";
  }


  ?>
  <h1 class="text-2xl font-medium text-slate-900">Добавить новость</h1>
  <form method="post" action="">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <p class="mt-1 text-sm leading-6 text-gray-600">При добавлении постов будьте внимательны.</p>
      </div>
      <div class="border-b border-gray-900/10 pb-12">

        <h2 class="text-base font-semibold leading-7 text-gray-900">Заполните поля</h2>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Заголовок</label>
            <div class="mt-2">
              <input type="text" name="title" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Краткое описание</label>
            <div class="mt-2">
              <input type="text" name="info" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>


        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Полное описание</label>
            <div class="mt-2">
              <textarea id="about" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-center w-full mt-5">
          <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
              </svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Нажмите, чтобы загрузить</span> или перетащите</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG или GIF (макс. 800x400 пикселей)</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
          </label>
        </div>
        <div class="sm:col-span-3 mt-5">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Выбрать категорию</label>
          <div class="mt-2">
            <select id="country" name="category_id" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>Категория</option>
              <option>Категория</option>
              <option>Категория</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Отменить</a>
      <button name="add-post" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Добавить</button>
    </div>
  </form>

</div>