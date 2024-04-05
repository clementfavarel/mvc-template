<?php

class InputValidation
{
    public static function isEmpty($data)
    {
        return empty($data);
    }

    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function validatePwd($pwd)
    {
        // Au moins 8 caractères, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        return preg_match($pattern, $pwd);
    }

    public function validateName($name)
    {
        // Seulement des lettres, pas de chiffres, pas de caractères spéciaux, longueur max de 50 caractères, les accents sont autorisés
        $pattern = '/^[a-zA-ZÀ-ÿ\s]{1,50}$/';
        return preg_match($pattern, $name);
    }
}
