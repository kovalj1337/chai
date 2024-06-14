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
    <main>
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
                                <input type="checkbox" name="milk" value="5" id="milk">
                                <label for="milk">Додати молочка +5гривн</label>
                            </p>
                            <p>
                                <input type="checkbox" name="sirop" value="6" id="sirop">
                                <label for="sirop">Додати сиропа +6гривн</label>
                            </p>
                            <p>
                                <input type="checkbox" name="apelsin" value="7" id="apelsin">
                                <label for="apelsin">Додати апельсина +7гривн</label>
                            </p>
                            <p>
                                <input type="checkbox" name="limonayaverbena" value="12" id="limonayaverbena">
                                <label for="limonayaverbena">Додати лимонної вербени +12гривн</label>
                            </p>
                        </div>
                        <div>
                            <p>
                                <input type="radio" name="vid-chaia" value="4" id="zelenyj">
                                <label for="zelenyj">Зелений чай +4гривн</label>
                            </p>
                            <p>
                                <input type="radio" name="vid-chaia" value="5" id="chornij">
                                <label for="chornij">Чорний чай +5гривн</label>
                            </p>
                            <p>
                                <input type="radio" name="vid-chaia" value="6" id="listovoj">
                                <label for="listovoj">Листовий чай +6гривн</label>
                            </p>
                            <p>
                                <input type="radio" name="vid-chaia" value="7" id="travjyanij">
                                <label for="travjyanij">Травяний чай + 7гривн</label>
                            </p>
                            <p>
                                <input type="radio" name="vid-chaia" value="777" id="tmteahousematchakrasnayapitahayan">
                                <label for="tmteahousematchakrasnayapitahayan">Чай, TM "Teahouse" Матча червона з Пітахайі
                                    +777гривень</label>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>