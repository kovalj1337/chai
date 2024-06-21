<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чек</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="display-flex logo">
        <div>
            <img src="images/logotipe.png" alt="" width="150px" height="50px">
        </div>
    </header>
    <main class="chek">
        <h1>Чек</h1>
        <?php
        if ($_POST) {
            try {
                $voda = $_POST["voda"];
                $sugar = $_POST["sugar"];
                if (isset($_POST['time'])) {
                    $time = $_POST['time'];
                } else {
                    $time = 0;
                }
                if (isset($_POST['milk'])) {
                    $milk = $_POST['milk'];
                } else {
                    $milk = 0;
                }
                if (isset($_POST['sirop'])) {
                    $sirop = $_POST['sirop'];
                } else {
                    $sirop = 0;
                }
                if (isset($_POST['apelsin'])) {
                    $apelsin = $_POST['apelsin'];
                } else {
                    $apelsin = 0;
                }
                if (isset($_POST['limonayaverbena'])) {
                    $limonayaverbena = $_POST['limonayaverbena'];
                } else {
                    $limonayaverbena = 0;
                }
                if (isset($_POST["vid-chaia"])) {
                    $priceVidChaya = $_POST["vid-chaia"];
                } else {
                    $priceVidChaya = 0;
                }
            } catch (\Throwable $th) {
                $voda = "EROER";
                $sugar = "EROOR";
                $time = "EROROR";
                $milk = "ERORORO";
                $sirop = "REROR";
                $apelsin = "EROR";
                $limonayaverbena = "ERERO";
                $priceVidChaya = "ERRORRR";
            }

            $token = "7020608783:AAGj1i1-93hM3HF-VYPjCdRd1KLWNg_Gb98";
            $chat_id = -1002204228941;

            // $textMessage = urlencode("$textMessage");
            $voda = urlencode("$voda");
            $sugar = urlencode("$sugar");
            $time = urlencode("$time");
            $priceVidChaya = urlencode("$priceVidChaya");
            $priceForDobavki = $milk + $sirop + $apelsin + $limonayaverbena;
            $priceforvoda = ($voda * 5 / 250) * 2;
            $price = $priceforvoda + $priceForDobavki + $priceVidChaya;
            $dodatki = "";
            if(isset($_POST["milk"])){
                $milktelegram = urlencode("$milk");
                $milktelegram = "На скільки гривень молока : <b>$milktelegram</b>%0a";
            }else{
                $milktelegram = "";
            }
            if(isset($_POST["sirop"])){
                $siroptelegram = urlencode("$sirop");
                $siroptelegram = "На скільки гривень сиропа : <b>$siroptelegram</b>%0a";
            }else{
                $siroptelegram = "";
            }
            if(isset($_POST["apelsin"])){
                $apelsintelegram = urlencode("$apelsin");
                $apelsintelegram = "На скільки гривень апельсина : <b>$apelsintelegram</b>%0a";
            }else{
                $apelsintelegram = "";
            }
            if(isset($_POST["limonayaverbena"])){
                $limonayaverbenatelegram = urlencode("$limonayaverbena");
                $limonayaverbenatelegram = "На скільки гривень лимонної вербени : <b>$limonayaverbenatelegram</b>%0a";
            }else{
                $limonayaverbenatelegram = "";
            }
            $urlQuerry = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=" .
                "<b>Zamovlenya </b>%0a" .
                "Кількість мл : <b>$voda</b>%0a" .
                "Ложок цукру : <b>$sugar</b>%0a" .
                "Час заварки : <b>$time</b>%0a" .
                "=== ** === ** ===%0a" . 
                "Додатки%0a" . 
                $milktelegram . 
                $siroptelegram . 
                $apelsintelegram . 
                $limonayaverbenatelegram . 
                "=== ** === ** ===%0a" .
                "Ціна за воду : <b>$priceforvoda</b>%0a" .
                "Ціна за чай : <b>$priceVidChaya</b>%0a" .
                "Ціна за все : <b>$price</b>%0a";
            $urlQuerry .= "&parse_mode=HTML";
            $result = file_get_contents($urlQuerry);
            echo ('<p>' . $voda . "мл чая замовлено </p>");
            echo ('<p>' . $sugar . "ложок цукру замовлено </p>");
            echo ('<p>' . $time . "хвилин заварити </p>");
            if ($milk)
                echo ("<p>Ви добавили молока за 5 гривень</p>");
            if ($sirop)
                echo ("<p>Ви додали сиропу за 6 гривень</p>");
            if ($apelsin)
                echo ("<p>Ви додали апельсин за 7 гривень</p>");
            if ($limonayaverbena)
                echo ("<p>Ви додали лимонної вербени за 12 гривень</p>");
            if ($priceForDobavki){
                echo("Ви добавили добавок на\n" . $priceForDobavki . "\n гривень");
            }
            if ($priceVidChaya == 4) {
                echo ("Насипано Зеленого чаю за 4 гривні");
            } else if ($priceVidChaya == 5) {
                echo ("Насипано Чорного чаю за 5 гривень");
            } else if ($priceVidChaya == 6) {
                echo ("Насипано листового чаю за 6 гривень");
            } else if ($priceVidChaya == 7) {
                echo ("Насипано травяного чаю за 7 гривень");
            } else if ($priceVidChaya == 777) {
                echo ("<p class='pitaxaya'>Насипано Чай, TM 'Teahouse' Матча червона з Пітахайі за 777 гривень</p>");
            } else {
                echo ("Вам налили кіпяток");
            }
            echo("<p>Ви заказали об'єм води на\n" . $priceforvoda . "\nгривень</p>");
            echo ("<p>Ви заказали на сумму\n<b>" . $price . "</b>\nгривень</p>");
        }
        ?>
        <form action="robota.php" method="POST">
            <input type="hidden" name="voda" value="<?php echo ($voda); ?>">
            <input type="hidden" name="sugar" value="<?php echo ($sugar); ?>">
            <input type="hidden" name="time" value="<?php echo ($time); ?>">
            <input type="hidden" name="price" value="<?php echo ($price); ?>">
            <input type="hidden" name="milk" value="<?php echo($milk) ?>">
            <input type="hidden" name="sirop" value="<?php echo($sirop) ?>">
            <input type="hidden" name="apelsin" value="<?php echo($apelsin) ?>">
            <input type="hidden" name="limonayaverbena" value="<?php echo($limonayaverbena) ?>">
            <button type="submit" class="submit submit-margin">Продовжити</button>
        </form>
    </main>
</body>

</html>