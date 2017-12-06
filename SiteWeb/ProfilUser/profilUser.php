<?php
/**
 * Auteur : Dylan Canton
 * Date : 29.11.2017
 * Description :
 */
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

<link rel="stylesheet" href="profilUser.css" type="text/css"> </head>
<body onload="disabledProfil()">
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
               <button type="submit" class="btn w-25 btn-danger pull-right fa fa-pencil" onclick="editProfil()">Editer</button>

                <script type="text/javascript">
                    function disabledProfil()
                    {
                        document.getElementById('editFirstname').readOnly = true;
                        document.getElementById('editLastname').readOnly = true;
                        document.getElementById('editMail').readOnly = true;
                        document.getElementById('editPassword').readOnly = true;
                        document.getElementById('editNumber').readOnly = true;
                        document.getElementById('editAdress').readOnly = true;
                        document.getElementById('editNPA').readOnly = true;
                        document.getElementById('editTown').readOnly = true;
                    }
                    function editProfil() {
                        document.getElementById('editFirstname').readOnly = false;
                        document.getElementById('editLastname').readOnly = false;
                        document.getElementById('editMail').readOnly = false;
                        document.getElementById('editPassword').readOnly = false;
                        document.getElementById('editNumber').readOnly = false;
                        document.getElementById('editAdress').readOnly = false;
                        document.getElementById('editNPA').readOnly = false;
                        document.getElementById('editTown').readOnly = false;
                    }
                </script>

              <h1 class="mb-4">Profil</h1>
              <form method="post" action="profilUser.php">
                <div class="form-group"> <label>Prénom</label>
                  <input id="editFirstname" type="text" class="form-control w-50" placeholder="Votre prénom" name="firstName" required> </div>
                <div class="form-group"> <label>Nom</label>
                  <input id="editLastname" type="text" class="form-control w-50" placeholder="Votre nom" name="lastName" required> </div>
                <div class="formSpace"> </div>
                <div class="form-group"> <label>Email</label>
                  <input id="editMail" type="email" class="form-control" placeholder="Adresse mail" name="mail" required> </div>
                <div class="form-group"> <label>Mot de passe</label>
                  <input id="editPassword" type="password" class="form-control" placeholder="Mot de passe" name="password" required> </div>
                <div class="form-group"> <label>Téléphone</label>
                  <input id="editNumber" type="text" class="form-control" placeholder="Numéro de téléphone" name="phoneNumber" required> </div>
                <div class="formSpace"> </div>
                <div class="form-group"> <label>Adresse</label>
                  <input id="editAdress" type="text" class="form-control" placeholder="Votre adresse" name="adresse" required> </div>
                <div class="form-group w-50"> <label>Code Postal</label>
                  <input id="editNPA" type="text" class="form-control" placeholder="Votre code postal" name="postalCode" required> </div>
                <div class="form-group w-50"> <label>Localité</label>
                  <input id="editTown" type="text" class="form-control townForm" placeholder="Votre ville" name="town" required> </div>
                <button type="submit" class="btn w-100 btn-primary">Valider</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>

<?php
include "../checkUser.php";

if(empty($_POST['firstName']) && empty($_POST['lastName']) && empty($_POST['mail']) && empty($_POST['password']) && empty($_POST['phoneNumber']) && empty($_POST['adresse']) && empty($_POST['postalCode']) && empty($_POST['town']))
{

}
else
{
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phoneNumber'];
    $adresse = $_POST['adresse'];
    $postalcode = $_POST['postalCode'];
    $town = $_POST['town'];

    $checkUser = new checkUser();
    $checkUser->checkSignIn($firstname, $lastname, $mail, $password, $phonenumber, $adresse, $postalcode, $town);
}
?>
