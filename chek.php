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
    <main>
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
            } catch(\Throwable $th) {
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
            $chat_id = 874784461;
        
            // $textMessage = urlencode("$textMessage");
            $voda = urlencode("$voda");
            $sugar = urlencode("$sugar");
            $time = urlencode("$time");
            $milk = urlencode("$milk");
            $sirop = urlencode("$sirop");
            $apelsin = urlencode("$apelsin");
            $limonayaverbena = urlencode("$limonayaverbena");
            $priceVidChaya = urlencode("$priceVidChaya");
            $urlQuerry = "https://api.telegram.org/bot". $token ."/sendMessage?chat_id=". $chat_id ."&text=". 
                "<b>Zamovlenya </b>%0a".
                "voda : <b>$voda</b>%0a".
                "sugar : <b>$sugar</b>%0a".
                "time : <b>$time</b>%0a".
                "milk : <b>$milk</b>%0a".
                "sirop : <b>$sirop</b>%0a".
                "apelsin : <b>$apelsin</b>%0a".
                "limonayaverbena : <b>$limonayaverbena</b>%0a".
                "priceVidChaya : <b>$priceVidChaya</b>%0a";
            $urlQuerry .= "&parse_mode=HTML";
            $result = file_get_contents($urlQuerry);
            $priceForDobavki = $milk + $sirop + $apelsin + $limonayaverbena;
            $priceforvoda = ($voda * 5 / 250) * 2;
            $price = $priceforvoda + $priceForDobavki + $priceVidChaya;
            echo ('<p>' . $voda . "мл замовлено </p>");
            echo ('<p>' . $sugar . "ложок замовлено </p>");
            echo ('<p>' . $time . "хвилин заварити </p>");
            if ($milk)
                echo ("<p>Ви добавили молока</p>");
            if ($sirop)
                echo ("<p>Ви додали сиропу</p>");
            if ($apelsin)
                echo ("<p>Ви додали апельсин</p>");
            if ($limonayaverbena)
                echo ("<p>Ви додали лимонної вербени</p>");
            echo ("<p>Ви заказали на сумму\n" . $price . "гривень</p>");
            if ($priceVidChaya == 4) {
                echo ("Насипано Зеленого чаю");
            } else if ($priceVidChaya == 5) {
                echo ("Насипано Чорного чаю");
            } else if ($priceVidChaya == 6) {
                echo ("Насипано листового чаю");
            } else if ($priceVidChaya == 7) {
                echo ("Насипано травяного чаю");
            } else if ($priceVidChaya == 777) {
                echo ("Насипано Чай, TM 'Teahouse' Матча червона з Пітахайі");
            } else {
                echo ("Вам налили кіпяток");
            }
        }   
        ?>
        <form action="robota.php" method="POST">
            <input type="hidden" name="voda" value="<?php echo ($voda); ?>">
            <input type="hidden" name="sugar" value="<?php echo ($sugar); ?>">
            <input type="hidden" name="time" value="<?php echo ($time); ?>">
            <input type="hidden" name="price" value="<?php echo ($price); ?>">
            <button type="submit">саьміт</button>
        </form>
    </main>
</body>
</html>