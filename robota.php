<?php
    if($_POST){
        if($voda <= 250){
            $onecuponesugar = 1;
        }else{
            $onecuponesugar = 0;
        }
        $cup = 250;
        $minValueVoda = 50;
        if($voda < $cup || $voda > $cup ||$voda == $cup){
            for($voda; $voda >= 0; $voda -= $cup){
                if($voda){
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