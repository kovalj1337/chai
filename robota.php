<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <main class="robota">
        <h1>Робота</h1>
        <div class="pre-work display-flex">
            <div class="work">
                <?php
                if ($_POST) {
                    $voda = $_POST["voda"];
                    $sugar = $_POST["sugar"];
                    $time = $_POST["time"];
                    $price = $_POST["price"];
                    if ($voda <= 250) {
                        $onecuponesugar = 1;
                    } else {
                        $onecuponesugar = 0;
                    }
                    $cup = 250;
                    $minValueVoda = 50;
                    if ($voda < $cup || $voda > $cup || $voda == $cup) {
                        for ($voda; $voda >= 0; $voda -= $cup) {
                            if ($voda) {
                                for ($i = 50; $i <= $cup && $i <= $voda; $i += $minValueVoda) {
                                    $result = ($minValueVoda * $sugar / $voda) * 5;
                                    echo ("<p>Налито \n" . $i . "\n води</p>");
                                }
                                echo ("<p>Чашка повна</p>");
                                if ($onecuponesugar == 0) {
                                    if ($voda <= 250) {
                                        $dolinaodne = $voda * 5 / 250;
                                        $sugar = ($sugar * $minValueVoda / $cup) * $dolinaodne;
                                        echo ("<p>Насипано " . $sugar . "ложок цукру<p>");
                                        $timeforone = $voda * 5 / 250;
                                        $time = ($time * $minValueVoda / $cup) * $timeforone;
                                        echo ("<p>чай робився " . $time . "хвилин</p>");
                                    } else {
                                        $result = round(($minValueVoda * $sugar / $voda) * 5, 2); //round - функція для округлення чисел
                                        $sugar -= $result;
                                        echo ("<p>Насипано " . $result . "ложок цукру</p>");
                                        $timefortea = round(($minValueVoda * $time / $voda) * 5, 2);
                                        $time -= $timefortea;
                                        echo ("<p>Чай робився " . $timefortea . "хвилин </p>");
                                    }
                                } else {
                                    echo ("<p>Насипано " . $sugar . "ложок цукру</p>");
                                    echo ("<p>Чай робився " . $time . "хвилин</p>");
                                }
                            }

                        }
                    }
                }
                ?>
            </div>
        </div>
        <h2>Приємного чаювання!</h2>
        <form action="index.php" method="POST">
            <button type="submit" class="submit submit-margin">Замовити ще</button>
        </form>
    </main>
</body>

</html>