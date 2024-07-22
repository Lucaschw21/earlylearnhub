<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
        <link rel="stylesheet" href ="styles/style.css">
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/game.css">
        <link rel="stylesheet" href="styles/userProfile.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
        <title>EarlyLearn Hub</title>
    </head>
<body>
    <audio-id="myAudio">
        <source src ="audio/wrong.mp3">
    </audio>

    <?php include("headerafter.php"); ?>

    <section>
        <div class ="wrapper">
            <div class ="equation">
                <h1 id="num1" style="color: purple;">1</h1>
                <h1 style="color: blue;">/</h1>
                <h1 id="num2" style="color: orangered;">1</h1>
                <h1 style="color: yellow;">=</h1>
                <h1 style="color: gray;">?</h1>
            </div>
            <div class ="answer-option">
                <h1 id="option1">1</h1>
                <h1 id="option2">2</h1>
                <h1 id="option3">3</h1>
            </div>
        </div>
    </section>
    
    <script src="scripts/divide.js"></script>

    <div class="footer">
        <p>Copyright &copy; 2023 EarlyLearn Hub</p>
        <nav class="footer-navigation">
            <a href="about.html">ABOUT</a>
            <a href="tnc.html">TERMS AND CONDITION</a>
            <a href="contact.html">CONTACT US</a>
        </nav>
    </div>
</body>
</html>