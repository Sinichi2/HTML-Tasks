<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yourName = strtolower(trim($_POST["yourName"]));
    $crushName = strtolower(trim($_POST["crushName"]));
    $yourBirthday = $_POST["yourBirthday"];
    $crushBirthday = $_POST["crushBirthday"];

    $yourZodiac = getZodiac($yourBirthday);
    $crushZodiac = getZodiac($crushBirthday);

    $compatibility = computeCompatibility($yourName, $crushName);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FLAMES Results</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="result">
            <h2>Compatibility Result</h2>
            <p><strong><?php echo ucfirst($yourName); ?></strong> (Zodiac: <?php echo $yourZodiac; ?>) and <strong><?php echo ucfirst($crushName); ?></strong> (Zodiac: <?php echo $crushZodiac; ?>) are <strong><?php echo $compatibility['compatibility']; ?></strong>.</p>
            <p>Common Letters: <?php echo implode(", ", $compatibility['commonLetters']); ?></p>
            <p>Total Common Letters: <?php echo $compatibility['commonCount']; ?></p>
            <a href="index.php">Try Again</a>
        </div>
    </body>
    </html>
    <?php
}
?>
