<?php include_once('header.php'); ?>
<h2 class="mt-3 text-center">Bienvenue sur le site de l'université du Havre</h2>
<hr>
<div class="container mt-4">
        <div class="row align-items-start">
          <div class="col-9">
          <p><a target="_blank" href="https://www.youtube.com/watch?v=AYOtp7HNoWs"><img src="src/ytb.png" style="width: 100px;" alt="..." ></a> Stéphane Lauwick, directeur de l'iut du Havre vous parle du B.U.T, la fillière remplaçante du D.U.T</p>
            <br>
            <p><a target="_blank" href="https://www.messervices.etudiant.gouv.fr/envole/"><img src="src/crous.png" style="width: 100px;" alt="..." ></a> Tu es un élève boursier en recherche d'un logement ? Le crous peut vous aider dans vos recherches.</p>  
        </div>
          <div class="col-3 text-center">
                <div div class="card" style="width: 25rem;">
                    <img src="src/litis.jpg" class="card-img-top" alt="litis">
                    <div class="card-body">
                        <h5 class="card-title">LITIS - Le Havre</h5>
                        <p class="card-text">Le LITIS est une équipe d’accueil (EA 4108) de l’Université du Havre Normandie,... </p>
                        <a href="#" class="btn btn-primary">Voir la suite de la présentation</a>
                    </div>
                </div>
          </div>
        </div>
      </div>
      <br>
      <h4 class="ms-2">Les emplacements des IUT </h4>
      <p class="ms-4 mt-3">Site Caucriauville : Rue Boris Vian, Caucriauville<br>
        Site Frissard : Quai Frissard, Dock Vauban <br>
        Site Lebon : 25 rue Philippe Lebon</p>
      <div id="map"></div>
      <br>
</body>
<script>
    var lat = 49.4963819;
    var lon = 0.1271581;
    var maCarte = null;
    function initmap(){
        maCarte = L.map('map').setView([lat,lon],11);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png',{
            attribution: 'données OpenStreetMap',
            minZoom: 1,
            maxZoom: 20
        }).addTo(maCarte);
        addMarker();
    }
    function addMarker(){
        var marker = L.marker([lat,lon]).addTo(maCarte);
        marker.bindPopup('Site Lebon');

        var lat2 = 49.5156699;
        var lon2 = 0.1618212;

        var marker2 = L.marker([lat2,lon2]).addTo(maCarte);
        marker2.bindPopup('Site Caucriauville');

        var lat3 = 49.4888089;
        var lon3 = 0.1276518;

        var marker2 = L.marker([lat3,lon3]).addTo(maCarte);
        marker2.bindPopup('Site Frissard');
    }
</script>
<?php include_once('footer.php');?>