<!DOCTYPE html>
<html lang="nl">
    <?php include "partials/meta.php"; ?>
<body>
    <?php include "partials/header.php"; ?>
	<main>
        <div class="row">
            <div class="float-l col-xs-2"><br></div>
            <div class="float-l col-xs-8 login--center" style="float: right;">
                <h3>Contact</h3>
                <div id="map" style="width:600px; height:400px;"></div>

                <script>
                    function myMap() {
                    var mapOptions = {
                        center: new google.maps.LatLng(51.5, -0.12),
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.HYBRID
                    }
                    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                    }
                </script>

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>

                    <h5>Retouren</h5>
                    <p>
                        Wilt u retourneren? Mail dan aub naar hanneke@multiversum.nl<br>
                    </p>
                    <h5>Openingstijden</h5>
                    <p>
                        Maandag: 09:00-17:00 <br>
                        Dinsdag: 09:00-17:00<br>
                        Woensdag: 09:00-17:00<br>
                        Donderdag: 09:00-17:00<br>
                        Vrijdag:  09:00-17:00<br>
                        Zaterdag/Zondag: GESLOTEN.
                    </p>

                    <h5>Zakelijk verkeer</h5>
                    <p>
                        Voor zakelijk verkeer kunt u terecht bij jackjones@multiversum.nl of 06-85549877
                    </p>

                    <h5>Vragen, klachten</h5>
                    <p>
                        Mocht u vragen hebben of een klacht, dan kunt u ons mailen op hanneke@multiversum.nl
                        of u kunt bellen naar 06-85549876.
                    </p>

                    <h5>Overig</h5>
                    <p>
                         Voor overige zaken kunt u ons mailen op hanneke@multiversum.nl
                         of u kunt bellen naar 06-85549876.
                    </p>
                </div>
            <div class="float-l col-xs-2"><br></div>
        </div>
	</main>
    <?php include "partials/footer.php"; ?>
</body>
</html>
