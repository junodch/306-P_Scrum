<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="Index.css" type="text/css"> </head>


<body>

  <div class="py-5 text-white w-100">
    <div class="w-100 container">
      <div class="row w-100 bg-dark">
        <div class="col-md-9 p-5">
            <div id="map">
                <script>
                    var map;
                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: 46.5333, lng:  6.6667},
                            zoom: 12
                        });
                    }
                </script>
            </div>
        </div>

        <div class="col-md-3 pr-5">
          <h2 class="text-center mt-5">Carte des commandes</h2>
          <p class="text-center">Indiquez vos coordonnées pour voir si une commande est possible dans votre région.</p>
          <form>
            <div class="form-group"> <label for="InputName">Localité</label>
              <input type="text" class="form-control" id="InputName" placeholder="Localité" name="localité"> </div>
            <div class="form-group"> <label for="InputEmail1">NPA</label>
              <input type="email" class="form-control" id="InputEmail1" placeholder="NPA" name="npa"> </div>
            <div class="form-group"><label class="form-control-label">Adresse</label>
              <input type="text" class="form-control" placeholder="Adresse" name="adresse"> </div>
              <input type="button" class="btn btn-primary btn-sm" value="Afficher" onclick=setMarker()>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
          </form>
        </div>
          <input type="button" value="Passer une commande" onclick="showOrderForm()">

          <script type="text/javascript">
            function showOrderForm() {
                document.getElementById('boxOrderForm').classList.remove("orderFormHide");
                window.scrollBy(0,1000);
            }
          </script>
      </div>

      <div id="boxOrderForm" class="orderForm orderFormHide bg-dark mt-5 col-lg-6 col-centered">
          <h2 class="pt-5">Ma commande</h2>

          <form method="post" action="CarteCommande.php">
              <div class="form-group col-lg-5 mt-5">  <label for="selectProduct">Produit</label>
              <select class="form-control " id="selectProduct" name="selectProduct">
                  <option>Lait (Bouteille 1L)</option>
                  <option>Oeufs (Pack de 6)</option>
              </select></div>

              <div class="form-group col-lg-2 mt-5"> <label for="selectQuantity">Quantité</label>
                  <input id="selectQuantity" type="number" name="quantity" min="1" max="80">
              </div>

              <div class="formSpace"> </div>

              <div class="form-group  col-lg-5 mt-5"><label for="selectHour">Heure de livraison</label>
              <select name="selectHour" class="form-control" id="selectHour">
                  <option>Matin (10H-12H)</option>
                  <option>Après-Midi (17-18H)</option>
              </select></div>

              <div class="form-group col-lg-5 mt-5">
                  <label for="day">Jour de livraison</label>
                  <input type="date" name="selectDay" id="day">
              </div>

              <button type="submit" class="btn btn-primary mt-4 w-100 btn-sm">Commander</button>
          </form>
      </div>
    </div>
  </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSZfhRyDXNRXLlvgYhABARinaLDvOofs8&callback=initMap"
        async defer></script>
<script>
    function setMarker(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        var geocoder = new google.maps.Geolocation();
        var latLng = {lat: lat, lng: lng}
    }
</script>
</body>

</html>

<?php
include "../checkUser.php";

if(empty($_POST['selectProduct']) && empty($_POST['quantity']) && empty($_POST['selectHour']) && empty($_POST['selectDay']))
{

}
else
{
    $product = $_POST['selectProduct'];
    $quantity = $_POST['quantity'];
    $orderHour = $_POST['selectHour'];
    $orderDay = $_POST['selectDay'];

    $checkUser = new checkUser();
    $checkUser->checkOrder($product, $quantity, $orderHour, $orderDay);
}
?>