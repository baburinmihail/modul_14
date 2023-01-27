<?php

// зададим книгу паролей
$users = [
    'boock' => [
                'admin' => ['id' => '1', 'password' => '202cb962ac59075b964b07152d234b70'],//123
                'user' => ['id' => '2', 'password' => '81dc9bdb52d04dc20036dbd8313ed055'],//1234
                'test' => ['id' => '3', 'password' => '827ccb0eea8a706c4c34a16891f84e7b'],//1235
                ]
];


$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if (null !== $username || null !== $password) {

    $newHashPassword = md5($password);
    $truePassword = false;
    //перебираю пароли и сравниваю введенный с книгай
    foreach ($users as $key => $arr){
        for ($i = 0; $i < count($arr); $i++){
            echo $arr['password'];
        }
    }

    // Если пароль из базы совпадает с паролем из формы
    if ($newHashPassword === $users['admin']['password']) {

        // Стартуем сессию:
        session_start();

        // Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true;



        // Пишем в сессию логин и id пользователя
        $_SESSION['id'] = $users['admin']['id'];
        $_SESSION['login'] = $username;

    }
}

$auth = $_SESSION['auth'] ?? null;

// если авторизованы
if ($auth) {
    ?><p>)))))))))))))))))))))</p><?php }
else {
    echo "не вошел";
}



