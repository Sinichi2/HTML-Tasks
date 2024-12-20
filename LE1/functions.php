<?php
function getZodiac($date) {
    $zodiac = [
        ['Capricorn', '01-20'], ['Aquarius', '02-19'], ['Pisces', '03-20'], ['Aries', '04-20'], 
        ['Taurus', '05-21'], ['Gemini', '06-21'], ['Cancer', '07-23'], ['Leo', '08-23'], 
        ['Virgo', '09-23'], ['Libra', '10-23'], ['Scorpio', '11-22'], ['Sagittarius', '12-22'], 
        ['Capricorn', '12-31']
    ];
    $monthDay = date('m-d', strtotime($date));
    foreach ($zodiac as $sign) {
        if ($monthDay <= $sign[1]) return $sign[0];
    }
    return 'Capricorn';
}

function computeCompatibility($yourName, $crushName) {
    $commonLetters = array_intersect(str_split($yourName), str_split($crushName));
    $commonCount = count($commonLetters);
    $compatibilityNumber = $commonCount % 6;

    $flames = ["Soulmates", "Friends", "Lovers", "Anger", "Married", "Engaged"];
    $result = [
        "compatibility" => $flames[$compatibilityNumber],
        "commonLetters" => $commonLetters,
        "commonCount" => $commonCount
    ];
    return $result;
}
?>
