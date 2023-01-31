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
    <title>Spa_салон</title>
</head>
<body>
<!-- Шапка -->
<header>
    <div class="row max-width" >
        <!-- лого -->
        <div class="col-1">
            <img src="img/githubLogo.png" width="200" height="120" alt="Лого">
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
                <form action="login.php" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <input name="login" class="check-in_input" type="text" placeholder="Логин">
                        </div>
                        <div class="col-4">
                            <input name="password" class="check-in_input" type="password" placeholder="Пароль">
                        </div>
                        <div class="col-4">
                            <input name="submit" type="submit" value="Войти">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<!-- / Шапка -->
<!-- Тело -->
<main>
    <section class="section-top">
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
<!-- Подвал -->
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