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
            <input type="radio" name="chai" value="1" id="easy">
            <label for="easy">Легкий</label>
            <input type="radio" name="chai" value="2" id="medium">
            <label for="medium">Середній</label>
            <input type="radio" name="chai" value="3" id="chefir">
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
        if ($voda) {
            $howmuchAddSugar = ($minValueVoda * $sugar) / $voda;
            echo ($howmuchAddSugar);
        }
        switch ($chai) {
            case "1":
                while ($chai)
        }
    }
    ?>
</body>

</html>