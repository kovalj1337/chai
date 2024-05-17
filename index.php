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
            <input type="radio" name="chai" value="easy" id="easy">
            <label for="easy">Легкий</label>
            <input type="radio" name="chai" value="medium" id="medium">
            <label for="medium">Середній</label>
            <input type="radio" name="chai" value="chefir" id="chefir">
            <label for="medium">Сильний</label>
        </div>
    </form>
    <?php
    if ($_POST) {
        $voda = $_POST["voda"];
        $sugar = $_POST["sugar"];
        if(isset($_POST['chai'])){
            $chai = $_POST["chai"];  
        } else{
            $chai = "0";
        }
        $minValueVoda = 50;
        $timeForEasy = 2;
        $timeForMedium = 5;
        $timeForChefir = 10;
        $cup = 250;
        if ($voda) {
            $howMuchAddSugar = $minValueVoda * $sugar / $voda;
            
        }
        if($voda < $cup || $voda > $cup ||$voda == $cup){
            for($voda; $voda >= 0; $voda -= $cup){
                if($voda <= $cup || $voda >= $cup || $voda == $cup){
                    for($i = 50; $i <= $cup && $i <= $voda; $i += $minValueVoda){
                        echo("Налито \n" . $i ."\n води");
                        $howMuchAddSugar += $howMuchAddSugar;
                    }
                    echo("Насипано " . $howMuchAddSugar . "ложок цукру");
                    echo("Чашка повна");
                }
            }
        }
    }
    ?>
</body>

</html>