<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="display-flex logo">
        <div>
            <img src="images/logotipe.png" alt="" width="150px" height="50px">
        </div>
    </header>
    <div class="display-flex">
        <div class="vibor">
            <form action="chek.php" method="post">
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
                    <div class="dobavki">
                        <p>
                            <input type="checkbox" name = "milk" value="5" id="milk">
                            <label for="milk">Додати молочка +5гривн</label>
                        </p>
                        <p>
                            <input type="checkbox" name = "sirop" value="6" id="sirop">
                            <label for="sirop">Додати сиропа +6гривн</label>
                        </p>
                        <p>
                            <input type="checkbox" name = "apelsin" value="7" id="apelsin">
                            <label for="apelsin">Додати апельсина +7гривн</label>
                        </p>
                        <p>
                            <input type="checkbox" name = "limonayaverbena" value="12" id="limonayaverbena">
                            <label for="limonayaverbena">Додати лимонної вербени +12гривн</label>
                        </p>
                    </div>
                    <div>
                        <p>
                            <input type="radio" name = "vid-chaia" value="4" id="zelenyj">
                            <label for="zelenyj">Зелений чай +4гривн</label>
                        </p>
                        <p>
                            <input type="radio" name = "vid-chaia" value="5" id="chornij">
                            <label for="chornij">Чорний чай +5гривн</label>
                        </p>
                        <p>
                            <input type="radio" name = "vid-chaia" value="6" id="listovoj">
                            <label for="listovoj">Листовий чай +6гривн</label>
                        </p>
                        <p>
                            <input type="radio" name = "vid-chaia" value="7" id="travjyanij">
                            <label for="travjyanij">Травяний чай + 7гривн</label>
                        </p>
                        <p>
                            <input type="radio" name = "vid-chaia" value="777" id="tmteahousematchakrasnayapitahayan">
                            <label for="tmteahousematchakrasnayapitahayan">Чай, TM "Teahouse" Матча червона з Пітахайі +777гривень</label>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <div>
        <?php
        if ($_POST) {
            $voda = $_POST["voda"];
            $sugar = $_POST["sugar"];
            if(isset($_POST['time'])){
                $time = $_POST['time'];
            }else{
                $time = 0;
            }
            if(isset($_POST['milk'])){
                $milk = $_POST['milk'];
            }else{
                $milk = 0;
            }
            if(isset($_POST['sirop'])){
                $sirop = $_POST['sirop'];
            }else{
                $sirop = 0;
            }
            if(isset($_POST['apelsin'])){
                $apelsin = $_POST['apelsin'];
            }else{
                $apelsin = 0;
            }
            if(isset($_POST['limonayaverbena'])){
                $limonayaverbena = $_POST['limonayaverbena'];
            }else{
                $limonayaverbena = 0;
            }
            if(isset($_POST["vid-chaia"])){
                $priceVidChaya = $_POST["vid-chaia"];
            }else{
                $priceVidChaya = 0; 
            }
            $priceForDobavki = $milk + $sirop + $apelsin + $limonayaverbena;
            $priceforvoda = ($voda * 5 / 250) * 2;
            $price = $priceforvoda + $priceForDobavki + $priceVidChaya; 
            echo('<p>' .$voda . "мл замовлено </p>");
            echo('<p>' .$sugar . "ложок замовлено </p>");
            echo('<p>'. $time . "хвилин заварити </p>");
            if($milk) echo ("<p>Ви добавили молока</p>");
            if($sirop) echo ("<p>Ви додали сиропу</p>");
            if($apelsin) echo ("<p>Ви додали апельсин</p>");
            if($limonayaverbena) echo ("<p>Ви додали лимонної вербени</p>");
            echo("<p>Ви заказали на сумму\n" . $price . "гривень</p>");
            if($priceVidChaya == 4){
                echo("Насипано Зеленого чаю");
            }else if($priceVidChaya == 5){
                echo("Насипано Чорного чаю");
            }else if($priceVidChaya == 6){
                echo("Насипано листового чаю");
            }else if($priceVidChaya == 7){
                echo("Насипано травяного чаю");
            }else if($priceVidChaya == 777){
                echo("Насипано Чай, TM 'Teahouse' Матча червона з Пітахайі");
            }else{
                echo("Вам налили кіпяток");
            }
        }
            ?>
        </div>
    </div>
</body>

</html>