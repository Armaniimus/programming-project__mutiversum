<!DOCTYPE html>
<html lang="nl">
    <?php include "partials/meta.php"; ?>
<body>
    <?php include "partials/header.php"; ?>
    <main class="row">
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
                        <div class="specific--platform">Platform: <?php echo $resultArray["platform"] ?></div>
                        <div class="specific--resolutie">Resolutie: <?php echo $resultArray["resolutie"] ?></div>
                        <div class="specific--3d_2d">3d/2d: <?php echo $resultArray["3d_2d"] ?></div>
                        <div class="specific--merk">Merk: <?php echo $resultArray["merk"] ?></div>
                        <div class="specific--model">Model: <?php echo $resultArray["model"] ?></div>
                        <br>
                        <a href='index.php?view=specific&op=addToCart&id=<?php echo $_GET["id"] ?>' class='winkelwagen-knop p-2' style="background-color: #1abc9c; border-color: #1abc9c;">Toevoegen aan winkelwagen</a>
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
    <?php include "partials/footer.php"; ?>
</body>
</html>
