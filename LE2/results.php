<?php
include 'person.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yourPerson = new Person($_POST['yourFirstName'], $_POST['yourLastName'], $_POST['yourBirthday']);
    $crushPerson = new Person($_POST['crushFirstName'], $_POST['crushLastName'], $_POST['crushBirthday']);

    $zodiacCompatibility = Zodiac::computeZodiacCompatibility($yourPerson->zodiac->sign, $crushPerson->zodiac->sign);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FLAMES Results</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="result">
            <h2>Compatibility Result</h2>
            <p>Your Name: <?php echo $yourPerson->getFullName(); ?> (Zodiac: <?php echo $yourPerson->zodiac->sign; ?>)</p>
            <p>Crush's Name: <?php echo $crushPerson->getFullName(); ?> (Zodiac: <?php echo $crushPerson->zodiac->sign; ?>)</p>
            <p>Zodiac Compatibility: <?php echo $zodiacCompatibility; ?></p>
            <a href="index.html">Try Again</a>
        </div>
    </body>
    </html>

    <?php
}
?>
