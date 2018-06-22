<!DOCTYPE html>
<html lang="nl">
    <?php include "includes/meta.php"; ?>
<body>
    <?php include "includes/header.php"; ?>
    <main>

        <div class="float-l col-xs-0    col-s-1     col-l-3"><br></div>

        <div class="float-l col-xs-12   col-s-10    col-l-6">
            <div class="specific--contentbox">
                <h3 class="specific--naam"><?php echo $resultArray["naam"] ?></h3>
                <div class"row">
                    <div class="specific--img--wrap float-l col-xs-6">
                        <img width="100%" class="specific--img" src="<?php echo $resultArray["afbeelding"]?>" alt="">
                    </div>

                    <div class="specific--content float-l col-xs-6">
                        <div class="specific--prijs"><?php echo $resultArray["prijs"] ?></div>
                        <div class="specific--resolutie">Resolutie: <?php echo $resultArray["resolutie"] ?></div>
                        <div class="specific--3d_2d">3d/2d: <?php echo $resultArray["3d_2d"] ?></div>
                        <div class="specific--merk">Merk: <?php echo $resultArray["merk"] ?></div>
                        <div class="specific--model">Model: <?php echo $resultArray["model"] ?></div>
                        <br>
                        <div class="winkelwagen-knop">+ In winkelwagen</div>
                    </div>
                </div>

                <div class="specific--beschrijving">
                    Beschrijving:<br>
                    <?php echo $resultArray["beschrijving"] ?>
                    <br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
        <div class="float-l col-xs-0    col-s-1     col-l-3"><br></div>
    </main>
</body>
</html>
