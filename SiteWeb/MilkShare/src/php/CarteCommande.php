<?php
/**
 *Author: Benjamin Valzino
 *Date: 29.11.2017
 *Location: ETML
 *Description:
 */

?>
<!DOCTYPE html>
<html>
<?php
    include("head.php");
?>
<body>
<?php
    include("header.php");
?>

<div class="py-5 text-white">
    <div class="container bg-dark"">
      <div class="row">
          <!-- div autour de la map google seulement -->
        <div class="col-md-9 p-5">
            <!-- div contenant la map même -->
            <div id="map">
                <script>
                    var map;
                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: 46.55, lng:  6.6333},
                            zoom: 14
                        });
                    }
                </script>
            </div>
        </div>

        <div class="col-md-3 pr-5 divGooglemap">
          <h2 class="text-center mt-5 mb-5">Carte des commandes</h2>
          <p class="text-center">Indiquez vos coordonnées pour voir si une commande est possible dans votre région.</p>
          <form>
            <div class="form-group"> <label for="InputName">Localité</label>
              <input type="text" id="InputLocalite" class="form-control"  placeholder="Localité" name="localité"> </div>
            <div class="form-group"><label class="form-control-label" for="InputAdress">Adresse</label>
              <input type="text" class="form-control" id="InputAdress" placeholder="Adresse" name="adresse"> </div>
              <input type="button" id="btnConfirm" class="btn btn-primary ml-3" value="Afficher la position">
          </form>
        </div>
          <button type="button" class="btn btn-primary mt-5 btnCommande">Passer une commande</button>
      </div>
    </div>
  </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSZfhRyDXNRXLlvgYhABARinaLDvOofs8&callback=initMap" async defer>

</script>

<script>



    function showResult(result) {

        // Récupération de la latitude et de la longitude
        var lat = result.geometry.location.lat();
        var long = result.geometry.location.lng();

        // Variable contenant les latitudes et longitude
        var myLatlng = new google.maps.LatLng(lat,long);

        // Création d'un nouveau marqueur selon l'adresse entrée
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title:'Votre position'
        });
        marker.setMap(map);
        map.setCenter(myLatlng);
    }

    function getLatitudeLongitude(callback, address) {
        // If adress is not supplied, use default value 'Mont-sur-Lausanne, Lausanne'
        address = address || 'Mont-sur-Lausanne, Lausanne';
        // Initialize the Geocoder
        geocoder = new google.maps.Geocoder();
        if (geocoder) {
            geocoder.geocode({
                'address': address
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    callback(results[0]);
                }
            });
        }
    }

    // création d'une var bouton afin d'accèder aux fonctions de celui-ci
    var button = document.getElementById('btnConfirm');

    // Ajout d'un evenListener afin d'éxecuter la fonction quand l'utilisateur clique sur le bouton.
    button.addEventListener("click", function () {
    var localite = document.getElementById('InputLocalite').value;
    var adresse = document.getElementById('InputAdress').value;

    // Concatenation des éléments de l'adresse
    var address = localite.concat(adresse);
    getLatitudeLongitude(showResult, address)
    });
</script>

<?php
    include("footer.php");
?>
</body>

</html>