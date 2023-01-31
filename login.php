<?php
// Устанавливаем используемый по умолчанию часовой пояс.
date_default_timezone_set('UTC');
//echo gmdate("H:i:s", 685);

// зададим книгу паролей
$users = [
    'boock' => [
                'admin' => ['id' => '1', 'password' => '202cb962ac59075b964b07152d234b70'],//123
                'user' => ['id' => '2', 'password' => '81dc9bdb52d04dc20036dbd8313ed055'],//1234
                'test' => ['id' => '3', 'password' => '827ccb0eea8a706c4c34a16891f84e7b'],//12345
                ]
];

setcookie("name", "misha");

$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if (null !== $username || null !== $password) {

    $arrUsers = $users['boock'];
    $newHashPassword = md5($password);
    $truePassword = false;


//перебираю пароли и сравниваю введенный с книгай
function userAndPassord($users,$newHashPassword,$username ){
    foreach ($users as $arr){
        foreach ($arr as $key2 => $arr2){
            if ( ($newHashPassword === ($arr2['password']) ) && ($username === $key2) ){
                $truePassword = true;
                return $truePassword;
            }
            else {
            }
        }
    }
}

$truePasswordFunction = userAndPassord($users,$newHashPassword,$username);

function polnochTime(){

}

    // Если пароль из базы совпадает с паролем из формы
    if ($truePasswordFunction === true) {

        //старт сесии
        session_status();

        //время по Абакану
        $_SESSION ['timer'] = gmdate("H:i:s",(time()));
        $newTime = $_SESSION ['timer'];
        $_SESSION ['число'] = 123;
        polnochTime();

        //$stamp = mktime(10, 35, 0);
        //$today_at_midnight = strtotime(date("Ymd"));

        echo date("M-d-Y", mktime(0, 0, 1));
        $myTime = date("M-d-Y", mktime(0, 0, 0));

        if ($myTime < $newTime){
            //echo $myTime-$newTime;
            echo "true";
        }else{
            echo "пошел нехер";
        }

        print_r($_SESSION);

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
    ?>
<!DOCTYPE html>
    <html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- my CSS -->
    <link rel="stylesheet" href="style.css" />
    <title>Spa_салон логин</title>
</head>
    <body>
    <footer>
        <div class="footer-center-block">
            <div class="row max-width" >
                <div class="col-5"></div>
                <div class="col-4">
                    <h6>Skillfactory, Модуль 14. Сессии и Cookie. Права обсалютно не защещины </h6>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
        <div class="row max-width">
            <div class="col-12">
                <h3>До конца акции осталось:</h3>
                <div class="akcia_block">
                    <span id="h">h</span>
                    <span id="m">m</span>
                    <span id="s">s</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Подвал -->
    <!-- Bootstrap в связке с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let date = new Date('Jan 31 2023 13:18:00');

        //разница между нынешней датой и указанной
        function countTime(){
            let now = new Date();
            gap = date - now;

            let hours = Math.floor( gap / 1000 / 60 / 60) %  24 ;
            let minuts = Math.floor( gap / 1000 / 60 ) % 60;
            let seconds = Math.floor( gap / 1000) % 60 ;

            if (gap < 0){
                date.setDate(date.getDate() + 1);
            }else {
                document.querySelector('#h').innerText = hours + ' часов';
                document.querySelector('#m').innerText = minuts + ' минут';
                document.querySelector('#s').innerText = seconds + ' секунд';
            }
        }
        //включаю функцию каждую секунду
        setInterval(countTime, 1000)
    </script>
    </body>
</html>
<?php }
else {
    echo "не вошел";
}
?>





