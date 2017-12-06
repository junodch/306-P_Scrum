<?php

/**
 * Auteur : Dylan Canton
 * Date : 15.11.2017
 * Description :
 */
class checkUser
{
    public function checkLogin($username, $password)
    {
        $usernamePattern = "# /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ #";
        $passwordPattern="#[a-zA-Z0-9#´'^~üèàäéöç$]#";

        $valideUsername = false;
        $validePassword = false;

        if(preg_match($usernamePattern, $username))
        {
            $valideUsername = true;
        }
        else
        {
            $valideUsername = false;
            echo "Invalide";
        }
        if(preg_match($passwordPattern, $password))
        {
            $validePassword = true;
        }
        else
        {
            $validePassword = false;
            echo "Invalide";
        }
    }

    public function checkSignIn($firstname, $lastname, $mail, $password, $phonenumber, $adresse, $postalcode, $town)
    {
        $firstnamePattern="#[a-zA-Züèàäéöç-]#";
        $lastnamePattern="#[a-zA-Züèàäéöç-]#";
        $mailPattern="#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i";
        $passwordPattern="#[a-zA-Z0-9+\´'^~üèàäéöç$]#";
        $phonenumberPattern="#[0-9]{10}#";
        $adressePattern="#(([a-zA-Züèàäéöç-]{1,}[ ]{1,})){1,}([0-9]){1,}#";
        $postalcodePattern="#[0-9]{4}#";
        $townPattern="#[a-zA-Züèàäéöç-]#";

        $valideFirstname = false;
        $valideLastname = false;
        $valideMail = false;
        $validePassword = false;
        $validePhonenumber = false;
        $valideAdresse = false;
        $validePostalcode = false;
        $valideTown = false;

        if(preg_match($firstnamePattern, $firstname))
        {
            $valideFirstname = true;
        }
        else
        {
            $valideFirstname = false;
            echo "Invalide firstname";
        }

        if(preg_match($lastnamePattern, $lastname))
        {
            $valideLastname = true;
        }
        else
        {
            $valideLastname = false;
            echo "Invalide lastname";
        }
        if(preg_match($mailPattern, $mail))
        {
            $valideMail = true;
        }
        else
        {
            $valideMail = false;
            echo "Invalide mail";
        }
        if(preg_match($passwordPattern, $password))
        {
            $validePassword = true;
        }
        else
        {
            $validePassword = false;
            echo "Invalide password";
        }
        if(preg_match($phonenumberPattern, $phonenumber))
        {
            $validePhonenumber = true;
        }
        else
        {
            $validePhonenumber = false;
            echo "Invalide phonenumber";
        }
        if(preg_match($adressePattern, $adresse))
        {
            $valideAdresse = true;
        }
        else
        {
            $valideAdresse = false;
            echo "Invalide adresse";
        }
        if(preg_match($postalcodePattern, $postalcode))
        {
            $validePostalcode = true;
        }
        else
        {
            $validePostalcode = false;
            echo "Invalide postalcode";
        }
        if(preg_match($townPattern, $town))
        {
            $valideTown = true;
        }
        else
        {
            $valideTown = false;
            echo "Invalide town";
        }
    }

    public function checkOrder($product, $quantity, $orderHour, $orderDay)
    {

        $productPatternMilk="Lait (Bouteille 1L)";
        $productPatternEgg="Oeufs (Pack de 6)";
        $quantityPattern="#[0-9]*#";
        $orderHourPatternMorning="Matin (10H-12H)";
        $orderHourPatternAfternoon="Après-Midi (17-18H)";
        $orderDayPattern="#[0-9]{4}\-[0-9]{2}\-[0-9]{2}#";

        $validProduct = false;
        $validQuantity = false;
        $validOrderHour = false;
        $validOrderDay = false;

        if($product == $productPatternMilk || $product == $productPatternEgg)
        {
            $validProduct = true;
        }
        else
        {
            $validProduct = false;
            echo "produit Invalide";
        }

        if(preg_match($quantityPattern, $quantity))
        {
            $validQuantity = true;
        }
        else
        {
            $validQuantity = false;
            echo " Quantité Invalide";
        }

        if($orderHour == $orderHourPatternMorning || $orderHour == $orderHourPatternAfternoon)
        {
            $validOrderHour = true;
        }
        else
        {
            $validOrderHour = false;
            echo " Heure Invalide";
        }

        if(preg_match($orderDayPattern, $orderDay))
        {
            $validOrderDay = true;
        }
        else
        {
            $validOrderDay = false;
            echo "Date Invalide";
        }
    }
}
