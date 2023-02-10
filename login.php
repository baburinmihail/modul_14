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


$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

$birthday_day = $_POST['input_day']?? null;
$birthday_mouth = $_POST['input_mouth']?? null;
$birthday_year = $_POST['input_year']?? null;

//полезные функция1
function getUsersList($users){
    echo '<pre>';
    echo var_export($users);
    echo '</pre>';
};

//getUsersList($users);



//полезные функция2
function existsUser($users){
    $username = "admin";

    foreach ($users as $arr){
        foreach ($arr as $key2 => $arr2){
            if ($username === $key2){
                echo $username;
            }
            else {
            }
        }
    }
};

//existsUser($users);


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

    // Если пароль из базы совпадает с паролем из формы
    if ($truePasswordFunction === true) {

        //старт сесии
        session_start();
        session_status();



        //время пихаю в переменню которая уйдет в сесию, которая уйдет в js
        $timeJsAkcia = 'Feb 02 2023 23:59:59';
        $_SESSION ['timeJsAkcia'] = $timeJsAkcia;

        $myTime = date('l jS \of F Y h:i:s A');
        $_SESSION ['myTime'] = $myTime;

        // Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true;

        // Пишем в сессию логин и id пользователя
        $_SESSION['login'] = $username;


        if (null === $birthday_day || null === $birthday_mouth || null === $birthday_year){
        //if (0 === 0){
            //день рождения
            //$_SESSION['birthday_day'] = 0;
            //$_SESSION['birthday_mouth'] = 0;
            //$_SESSION['birthday_year'] = 0;
            $birthday_day = 0;
            $birthday_mouth = 0;
            $birthday_year = 0;
            setcookie("birthday_day", $birthday_day);
            setcookie("birthday_mouth", $birthday_mouth);
            setcookie("birthday_year", $birthday_year);
            setcookie("birthday_day2", 2);
        }else{
            setcookie("birthday_day2", (3));
            setcookie("birthday_day", ($birthday_day));
            setcookie("birthday_mouth", ($birthday_mouth));
            setcookie("birthday_year", ($birthday_year));
        }



    }
}

$auth = $_SESSION['auth'] ?? null;

// если авторизованы
if ($auth) {?>
<!DOCTYPE html>
    <html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- my CSS-->
    <link rel="stylesheet" href="style.css" />

    <title>Spa_салон логин</title>
</head>
    <body>
    <!-- Шапка -->
    <header>
        <div class="row max-width" >
            <!-- лого -->
            <div class="col-1">
                <img src="img/githubLogo.png" width="200" height="120" alt="Лого">
                <h2 id="birthday" style="visibility: hidden;">bythday</h2>
            </div>
            <!-- /лого -->
            <!-- навигация -->
            <div class="col-8">
                <nav>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-1">
                            <a class="nav_link" href="#">О нас</a>
                        </div>
                        <div class="col-1">
                            <a class="nav_link" href="#">Услуги</a>
                        </div>
                        <div class="col-1">
                            <a class="nav_link" href="#">Акции</a>
                        </div>
                        <div class="col-1">
                            <a class="nav_link" href="#">SPA-этикет</a>
                        </div>
                        <div class="col-1">
                            <a class="nav_link" href="#">Отзывы</a>
                        </div>
                        <div class="col-1">
                            <a class="nav_link" href="#">Контакты</a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </nav>
            </div>
            <!-- /навигация -->
            <!-- /регестрация -->
            <div class="col-3">
                <div class="check-in">
                    <h5>Привет! <?php echo "$username";?></h5>
                    <a class="nav_link" href="/index.php"><h6>Выход</h6></a>
                    <p id="start_day">Время входа на сайт <h6 id="start_day_h5">365</h6></p>
                    <p id="best_dey">до следующего дня рождения <h6 id="best_dey_h5">365</h6></p>
                    <p id="skidka">У тебя днюха, лови 5% скидки></p>
                </div>
            </div>
        </div>
    </header>
    <!-- / Шапка -->
    <!-- Тело -->
    <main>
        <section class="section-top" style="background: red">
            <div class="row max-width" >
                <div class="col-2"></div>
                <div class="col-3">
                    <img src="img/abonement.PNG"  alt="Лого">
                </div>
                <div class="col-3">
                    <img src="img/sert.PNG"  alt="Лого">
                </div>
                <div class="col-3">
                    <img src="img/romantic.PNG" alt="Лого">
                </div>
                <div class="col-1"></div>
            </div>
        </section>
        <section class="section-bottom">
            <div class="row max-width" >
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    <img src="img/spa_1.PNG" alt="Лого">
                                </div>
                                <div class="col-6">
                                    <img src="img/spa_2.PNG" alt="Лого">
                                </div>
                                <div class="col-6 text-pading" >
                                    <img src="img/spa_3.PNG" alt="Лого">
                                </div>
                                <div class="col-6 text-pading">
                                    <img src="img/spa_4.PNG" alt="Лого">
                                </div>
                            </div>
                        </div>
                        <div class="col-5 text-block">
                            <h2>О салоне</h2>
                            <p>
                                Хотите почувствовать себя так, как будто вы отдохнули в Таиланде
                                ? SPA-салон "GitHub" подарит
                                Вам такую возможность. У нас работают настоящие профессионалы из
                                Таиланда. К Вашим услугам восточные процедуры для всего тела и лица,
                                а также комплексные SPA-программы для женщин и мужчин.
                                Наши мастера позволят Вам почувствовать себя в тонусе, именно тайский
                                массаж поможет Вам привести в гармонию мысли, расслабиться и заново обрести себя!
                            </p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </section>
    </main>
    <!-- /Тело -->
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
        <!-- Modal1 -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="modal-header" style="background: black">
                        <h5 class="modal-title" id="exampleModalLabel">Специальная акция, только для тебя <?php echo "$username";?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body" style="background: black">
                        <div class="col-12">
                            <h3>До конца акции осталось:</h3>
                            <div class="akcia_block">
                                <span id="h">h</span>
                                <span id="m">m</span>
                                <span id="s">s</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="modal-footer" style="background: black">
                    <!--    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->
        <!-- Modal2 -->
        <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="modal-header" style="background: black">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body" style="background: black">
                        <form action="login.php" method="POST">
                            <div class="row max-width" >
                                <div class="col-12">
                                    <h3>Когда у тебя день рождения?</h3>
                                </div>
                                <div class="col-2">
                                    <input name="input_day" type="number" min="1" max="30" id="input_day" class="inputBirthday" required>
                                </div>
                                <div class="col-2">
                                    <h3>день</h3>
                                </div>
                                <div class="col-2">
                                    <input name="input_mouth" type="number" min="1" max="12" id="input_mouth" class="inputBirthday" required>
                                </div>
                                <div class="col-2">
                                    <h3>месяц</h3>
                                </div>
                                <div class="col-3">
                                    <input name="input_year" type="number" min="1971" id="input_year"  class="inputBirthday" required>
                                </div>
                                <div class="col-1">
                                    <h5>год</h5>
                                </div>
                                <div class="col-9">
                                </div>
                                <div class="col-3">
                                    <input type="submit" id="button_otp" class="button_otp"  value="Отправить">
                                </div>
                                <!--скрытые поля для ввода логина пароля-->
                                <div class="col-6">
                                    <input name="login" type="text" style="display: none;" value="<?php echo "$username";?>">
                                </div>
                                <div class="col-6">
                                    <input name="password"  type="password"  style="visibility: hidden;" value="<?php echo "$password";?>">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" id="modal-footer" style="background: black">
                        <!--    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal2 -->
    </footer>
    <!-- /Подвал -->
    <!-- Bootstrap в связке с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">

        let dat = '<?php echo $_SESSION ['timeJsAkcia']?>';
        let date = new Date(dat);

        let myTime2 = new Date(<?php echo strtotime(($_SESSION ['myTime'])); ?>);
        let date2 = new Date(myTime2);
        document.querySelector('#start_day_h5').innerText = date2;

        //разница между нынешней датой и указанной
        function countTime(){
            //let now = new Date();
            //перевожу время с формата php в js
            let myTime = new Date(<?php echo strtotime(($_SESSION ['myTime'])); ?>);
            gap = date - myTime;

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
    <!-- модалка со скидкой-->
    <script>
        let myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        myModal.show()

    </script>
    <!-- модалка с днюхой-->
    <script>

        console.log("начало");
        document.querySelector('#best_dey').style.visibility = "hidden";
        document.querySelector('#best_dey').style.visibility = "hidden";
        document.querySelector('#skidka').style.visibility = "hidden";

        //кидаю cookie из php в js
        cookieValueBirthday_day = document.cookie.replace(/(?:(?:^|.*;\s*)birthday_day\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        cookieValueBirthday_mouth = document.cookie.replace(/(?:(?:^|.*;\s*)birthday_mouth\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        cookieValueBirthday_year = document.cookie.replace(/(?:(?:^|.*;\s*)birthday_year\s*\=\s*([^;]*).*$)|^.*$/, "$1");

        console.log(cookieValueBirthday_day);
        console.log(cookieValueBirthday_mouth);
        console.log(cookieValueBirthday_year);

        //проверка заполненость
        if ( cookieValueBirthday_day == 0 || cookieValueBirthday_mouth == 0 || cookieValueBirthday_year == 0 ){

            //вскрываю модалку
            let myModal2 = new bootstrap.Modal(document.getElementById('myModal2'), {})
            myModal2.show();
            document.querySelector('#myModal2').style.visibility = "visible ";

        }else {

            //сейчас
            let myTime = new Date(<?php echo strtotime(($_SESSION ['myTime'])); ?>);
            //Нынешний год пользователя
            let yearUserNow = String(myTime.getFullYear())
            let yearUserNow2 = String(myTime.getFullYear()+1)

            //день рождения пользователя
            let timeUser = new Date( cookieValueBirthday_mouth+'.'+ cookieValueBirthday_day+'.'+ yearUserNow);

            var a1 = Date.parse(myTime);
            console.log(a1)
            var b2 = Date.parse(timeUser);
            console.log(b2)
            //если день рождения уже прошел
            if ( b2 < a1){
                timeUser = new Date( cookieValueBirthday_mouth+'.'+ cookieValueBirthday_day+'.'+ yearUserNow2);
            }else {
                timeUser = new Date( cookieValueBirthday_mouth+'.'+ cookieValueBirthday_day+'.'+ yearUserNow);
            }


            let month = timeUser.getMonth()
            let day = timeUser.getDate()
            let myTimeMonth = myTime.getMonth()
            let myTimeDate = myTime.getDate()


            if (month == myTimeMonth && day == myTimeDate){
                console.log("сегодня твой день")
                document.querySelector('#skidka').style.visibility = "visible";

            }else {
                console.log("не сегодня")
            }

            // парсим их с помощью нативного JS
            let a = Date.parse(timeUser);//start
            let b = Date.parse(myTime);//end

            console.log(timeUser);
            console.log(myTime);


            // получаем количество дней между датами
            let daysToBythd = Math.floor(Math.abs(b-a)/(1000*60*60*24)) + 1 ;
            console.log(daysToBythd);

            document.querySelector('#best_dey').style.visibility = "visible";
            document.querySelector('#best_dey_h5').style.visibility = "visible";
            document.querySelector('#best_dey_h5').innerText = daysToBythd;

        }


    </script>

    </body>
</html>
<?php }
else {
    session_destroy();
    $new_url = 'index.php';
    header('Location: '.$new_url);

}
?>







