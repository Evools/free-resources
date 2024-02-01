<?php include "./layout/header.php"; ?>

<?php
// require_once "config/db.php";

require_once "class/Database.php";
require_once "class/Register.php";

$db = new Database();
$db = $db->getConnection();

$user = new Users($db);

if (isset($_POST['register'])) {
  if ($_POST['password'] == $_POST['confirm']) {
    $user->username = $_POST['username'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->email = $_POST['email'];
    $user->role = 2;
    if ($user->createAccount()) {
      header("Location: /signin");
    } else {
      if (!empty($users->error)) {
        echo "<div class='err-message'>" . $users->error . "</div>";
      } else {
        echo "<div class='err-message'>Не удалось зарегистрировать пользователя.</div>";
      }
    }
  } else {
    echo "<div class='err-message'>Пароли не совпадают</div>";
  }
}

// Это вариант при помощи PDO
// if (isset($_POST['register'])) {
//   $username = $_POST['username'];
//   $email = $_POST['email'];
//   $password = $_POST['password'];
//   $confirm = $_POST['confirm'];
//   $password_hash = password_hash($password, PASSWORD_DEFAULT);

//   if ($password == $confirm) {
//     $sql = "INSERT INTO `users` (`username`, `email`, `password`, `role`) VALUES (:username, :email, :password, 2)";
//     $query = $connect->prepare($sql);
//     $query->bindParam(':users', $username);
//     $query->bindParam(':email', $email);
//     $query->bindParam(':password', $password_hash);
//     $query->execute();
//     header("Location: /signin");
//   } else {
//     echo "Пароли не совпадают";
//   }
// }



?>

<body class="antialiased bg-slate-200 flex items-center justify-center flex-col min-h-screen">
  <div class="max-w-lg bg-white p-8 rounded-xl shadow shadow-slate-300 w-[480px]">
    <h1 class="text-3xl font-bold">Регистрация</h1>
    <p class="text-slate-500">Заполните все поля🔥 </p>

    <div class="my-5">

    </div>
    <form action="" class="my-10" method="post">
      <div class="flex flex-col space-y-5">
        <label for="email">
          <p class="font-medium text-slate-700 pb-2">Ф.И.О</p>
          <input id="email" name="username" type="text" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Введите ваше ФИО">
        </label>
        <label for="email">
          <p class="font-medium text-slate-700 pb-2">Email адресс</p>
          <input id="email" name="email" type="email" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Введите ваш email адресс">
        </label>
        <label for="password">
          <p class="font-medium text-slate-700 pb-2">Пароль</p>
          <input id="password" name="password" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Введите ваш пароль">
        </label>
        <label for="password">
          <p class="font-medium text-slate-700 pb-2">Повторите пароль</p>
          <input id="password" name="confirm" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Повторите ваш пароль">
        </label>
        <button class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center" name="register">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
          </svg>
          <span>Регистрация</span>
        </button>
        <p class="text-center">Уже есть аккаунт? <a href="/signin" class="text-indigo-600 font-medium inline-flex space-x-1 items-center"><span>Войти </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg></span></a></p>
      </div>
    </form>
  </div>

</body>

<?php include "./layout/footer.php"; ?>