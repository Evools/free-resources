<?php include "./layout/header.php"; ?>

<?php

require_once 'class/Database.php';
require_once 'class/Auth.php';

$database = new Database();
$db = $database->getConnection();

$auth = new Auth($db);

if (isset($_POST['login'])) {
  $auth->email = $_POST['email'];
  $auth->password = $_POST['password'];

  $user = $auth->authenticate();

  if ($user) {
    $_SESSION['is_auth'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    header("Location: /");
    exit();
  } else {
    echo "Ошибка авторизации. Проверьте введенные данные.";
  }
}

// require_once "config/db.php";
// if (isset($_POST['login'])) {
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   $sql = "SELECT * FROM `users`";
//   $query = $connect->prepare($sql);
//   $query->execute();
//   while ($user = $query->fetch()) {
//     if ($user['email'] == $email) {
//       if (password_verify($password, $user['password'])) {
//         $_SESSION['is_auth'] = true;
//         $_SESSION['email'] = $user['email'];
//         $_SESSION['role'] = $user['role'];
//         $_SESSION['username'] = $user['username'];
//         header("Location: /");
//       } else {
//         echo "Пароли не совпадают";
//       }
//     } else {
//       echo "Такого пользователя нет!";
//     }
//   }
// }


?>

<body class="antialiased bg-slate-200 flex items-center justify-center flex-col min-h-screen">
  <div class="max-w-lg bg-white p-8 rounded-xl shadow shadow-slate-300 w-[480px]">
    <h1 class="text-3xl font-bold">Авторизация</h1>
    <p class="text-slate-500">Заполните все поля чтобы начать свой путь🔥 </p>

    <div class="my-5">

    </div>
    <form action="" class="my-10" method="post">
      <div class="flex flex-col space-y-5">
        <label for="email">
          <p class="font-medium text-slate-700 pb-2">Email адресс</p>
          <input id="email" name="email" type="email" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Введите ваш email адресс">
        </label>
        <label for="password">
          <p class="font-medium text-slate-700 pb-2">Пароль</p>
          <input id="password" name="password" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Введите ваш пароль">
        </label>
        <div class="flex justify-end">
          <div>
            <a href="#" class="font-medium text-indigo-600">Забыли пароль?</a>
          </div>
        </div>
        <button class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center" name="login">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
          </svg>
          <span>Войти</span>
        </button>
        <p class="text-center">Еще нет аккаунта? <a href="/signup" class="text-indigo-600 font-medium inline-flex space-x-1 items-center"><span>Создать новый </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg></span></a></p>
      </div>
    </form>
  </div>

</body>

<?php include "./layout/footer.php"; ?>