<!DOCTYPE html>
<!--
Nom			:	Bader Beggah
Date		:	06.11.2017
Description	:	Page statique de l'ex des surnoms de profs
-->
<html lang="fr">
    <?php
    $actualDateTime = date_default_timezone_get();
    include("head.php");
    include("header.php");
    echo "Date et heure actuelle: ". $actualDateTime;
    ?>

    <body>
        <div id="container">
            <header>
                <div id="siteTitle">
                    <h1>Page d'Administration</h1>
                </div>
            </header>

            <section>
                <h2>Liste des commandes</h2>
                <table>
                    <tr>
                        <th> Date Livraison </th>
                        <th> Produits </th>
                        <th> Client </th>
                        <th> Adresse </th>
                    </tr>

                </table>
            </section>
        </div>
    </body>
    <?php
    include("footer.php");
    ?>
            </section>
        </div>
    </body>
</html>