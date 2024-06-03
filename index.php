<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <div>
            <p>Виберіть клількість мл</p>
            <input type="range" name="voda" value="50" min="50" max="1000" step="50"   
                oninput="this.nextElementSibling.value = this.value">
            <input type="text" name="voda" value="50" oninput="this.previousElementSibiling.value = this.value">
            <p>Виберіть клількість Цукру</p>
            <input type="range" name="sugar" value="1" min="1" max="10" step="1"
                oninput="this.nextElementSibling.value = this.value">
            <input type="text" name="sugar" value="1" oninput="this.previousElementSibiling.value = this.value">
            <button type="submit">submit</button>
            <input type="radio" name="time" value="2" id="easy">
            <label for="easy">Легкий</label>
            <input type="radio" name="time" value="5" id="medium">
            <label for="medium">Середній</label>
            <input type="radio" name="time" value="10" id="chefir">
            <label for="chefir">Сильний</label>
        </div>
    </form>
    <?php
    if ($_POST) {
        $voda = $_POST["voda"];
        $sugar = $_POST["sugar"];
        $time = $_POST['time'];
        echo('<p>' .$voda . "мл замовлено </p>");
        echo('<p>' .$sugar . "ложок замовлено </p>");
        echo('<p>'. $time . "хвилин заварити </p>");
        if($voda <= 250){
            $onecuponesugar = 1;
        }else{
            $onecuponesugar = 0;
        }
        $cup = 250;
        $minValueVoda = 50;
        if($voda < $cup || $voda > $cup ||$voda == $cup){
            for($voda; $voda >= 0; $voda -= $cup){
                if($voda <= $cup || $voda >= $cup || $voda == $cup){
                    echo("<p>$voda</p>");
                    for($i = 50; $i <= $cup && $i <= $voda; $i += $minValueVoda){
                        $result = ($minValueVoda * $sugar / $voda) * 5; 
                        echo("Налито \n" . $i ."\n води");
                    }
                    echo("Чашка повна");
                    if($onecuponesugar == 0){
                        if($voda <= 250){
                            $dolinaodne = $voda * 5 / 250;
                            $sugar = ($sugar * $minValueVoda / $cup) * $dolinaodne;
                            echo("Насипано " . $sugar . "ложок цукру");
                            $timeforone = $voda * 5 / 250;
                            $time = ($time * $minValueVoda / $cup) * $timeforone;
                            echo("чай робився " . $time . "хвилин");
                        }else{
                            $result = round(($minValueVoda * $sugar / $voda) * 5, 2); //round - функція для округлення чисел
                            $sugar -= $result;
                            echo("Насипано " . $result . "ложок цукру");
                            $timefortea = round(($minValueVoda * $time / $voda) * 5, 2);
                            $time -= $timefortea;
                            echo("чай робився " . $timefortea . "хвилин");
                        }
                    }else{
                        echo("Насипано " . $sugar . "ложок цукру");
                        echo("чай робився " . $time . "хвилин");
                    }
                }
            }
        }
    }
    ?>
</body>

</html>