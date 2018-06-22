<!DOCTYPE html>
<html lang="nl">
    <?php include "includes/meta.php"; ?>
    <body>
        <?php include "includes/admin_header.php"; ?>
        <div class="float-l col-xs-1"><br></div>

        <div class="adminpanel--centerbox float-l col-xs-10">
            <div class="row">
                <div class="admin-panel--buttonwrap float-l col-xs-12 col-m-6">
                    <div class="adminpanel--margin"></div>
                    <a class="adminpanel--buttons" href="#">
                        <div style="position:relative; top: 50%;">Creeër nieuw product</div>
                    </a><br>
                </div>

                <div class="admin-panel--buttonwrap float-l col-xs-12 col-m-6">
                    <form class="" action="index.php?view=admin_search" method="post">
                        <input class="adminpanel--margin" style="border: 1px #333 solid;" type="text" name="search" value=""><br>
                        <input class="adminpanel--buttons" type="submit" name="" value="Zoek product">
                    </form>
                </div>
            </div>
        </div>
        <div class="float-l col-xs-1"><br></div>
    </body>
</html>
