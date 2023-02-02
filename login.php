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


    // Если пароль из базы совпадает с паролем из формы
    if ($truePasswordFunction === true) {

        //старт сесии
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

        //день рождения
        $birthday = 0;
        $_SESSION['birthday'] = $birthday;

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
                        <div class="row max-width" >
                            <div class="col-12">
                                <h3>Когда у тебя день рождения?</h3>
                            </div>
                            <div class="col-2">
                                <input type="number" min="1" max="30" class="inputBirthday">
                            </div>
                            <div class="col-2">
                                <h3>день</h3>
                            </div>
                            <div class="col-2">
                                <input type="number" min="1" max="12" class="inputBirthday">
                            </div>
                            <div class="col-2">
                                <h3>месяц</h3>
                            </div>
                            <div class="col-3">
                                <input type="number" min="1950"  class="inputBirthday">
                            </div>
                            <div class="col-1">
                                <h5>год</h5>
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
        <!-- /Modal2 -->
    </footer>
    <!-- /Подвал -->
    <!-- Bootstrap в связке с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">

        let dat = '<?php echo $_SESSION ['timeJsAkcia']?>';
        let date = new Date(dat);

        //разница между нынешней датой и указанной
        function countTime(){
            //let now = new Date();
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
        let myModal2 = new bootstrap.Modal(document.getElementById('myModal2'), {})
        myModal2.show()
    </script>
    <!--
    <script>
        document.querySelector('#birthday').style = 'visibility: hidden;';
        //let birthday = prompt(title, [default]);
        let birthday = (<?php echo $_SESSION ['birthday']?>);
        if  (birthday == 0){
            birthday = prompt('когда вы роделись?', 25);
        }else {
            document.querySelector('#birthday').innerText = birthday;
            document.querySelector('#birthday').style = 'visibility: visible;';
        }

    </script>
    -->
    <script>
        //сейчас
        let now = new Date();
        console.log(now);

        //заданная днюха
        let birthday = 'Feb 02 2023'

        //разница
        let gap = date - birthday;


        let day = Math.floor( gap / 1000 / 60 / 60) %  24 ;
        console.log(day);

        //Писал форму для даты и время для вывода трех переменных и дальнейшей их обработки
    </script>
    </body>
</html>
<?php }
else {
    $new_url = 'index.php';
    header('Location: '.$new_url);

}
?>







