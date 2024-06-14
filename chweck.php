<?php

function checkInstagramUser($username) {
    $url = "https://www.instagram.com/{$username}/";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Для следования за редиректами
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3');
    
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode === 200;
}

// Пример использования:
$username = "kirillsgmailomргпн";
$isUserExists = checkInstagramUser($username);

if ($isUserExists) {
    echo "Пользователь найден: " . $username;
} else {
    echo "Пользователь не найден.";
}