<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/game.css">
        <link rel="stylesheet" href="styles/userProfile.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    </head>

    <body>
        <?php include("headerafter.php"); ?>

        <section class="">
            <div class="container6">
            <div id="game-container">
                <h4>Spelling Game</h4>
                <div id="word-image-container"></div>
                <div id="word-display"></div>
                <input type="text" id="input-box" placeholder="Type the word">
                <button onclick="checkSpelling()">CHECK</button>
                <p id="result-message"></p>
            </div>
            </div>
        </section>

        <script>
            const words = [
        { word: "santa clause", image: "image/santa.png" },
        { word: "christmas tree", image: "image/tree.png" },
        { word: "present", image: "image/present.png" },
        { word: "reindeer", image: "image/reindeer.png" },
        { word: "snowman", image: "image/snowman.png" },
        { word: "gingerbread", image: "image/gingerbread.png" },
        { word: "candy", image: "image/candy.png" },
        { word: "star", image: "image/star.png" },
        { word: "stocking", image: "image/stocking.png" },
    ];
        
            function getRandomWord() {
                return words[Math.floor(Math.random() * words.length)];
            }
        
            function initializeGame() {
    const { word, image } = getRandomWord();
    document.getElementById("word-image-container").style.backgroundImage = `url(${image})`;
    document.getElementById("word-display").innerHTML = `<span class="spell-text";">Spell: ${word}</span>`;
    document.getElementById("input-box").value = "";
    document.getElementById("result-message").textContent = "";
}

        
            function checkSpelling() {
                const userTypedWord = document.getElementById("input-box").value.toLowerCase();
                const displayedWord = document.getElementById("word-display").textContent.split(": ")[1].toLowerCase();
        
                if (userTypedWord === displayedWord) {
                    document.getElementById("result-message").innerHTML = '<span style="color: #000000; font-size: 38px;">Correct! Well done!</span>';
                    setTimeout(initializeGame, 1500);
                } else {
                    document.getElementById("result-message").innerHTML = '<span style="color: #000000; font-size: 38px;">Incorrect. Try again.</span>';
                }
        
                
            }
        
            initializeGame();
        </script>
        
        <?php include("footer.php"); ?>
    </body>
</html>
