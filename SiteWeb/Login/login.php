<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="login.css" type="text/css"> </head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
              <h1 class="mb-4">Se connecter</h1>
              <form method="post" action="login.php">
                <div class="form-group"> <label>Nom de compte</label>
                  <input type="text" class="form-control" placeholder="Nom de compte" name="username" required> </div>
                <div class="form-group"> <label>Mot de passe</label>
                  <input type="password" class="form-control" placeholder="Mot de passe" name="password" required> </div>
                <button type="submit" class="btn btn-primary my-4">Connexion</button>
                <a class="linkSignin text-info" href="../SignIn/signin.php">Pas encore inscrit ? S'inscrire</a>
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



    if(empty($_POST['username']) && empty($_POST['password']))
    {

    }
    else
    {
        $usermail = $_POST['username'];
        $userpassword = $_POST['password'];
        $checkUser = new checkUser();
        $checkUser->checkLogin($usermail,$userpassword);
    }
?>