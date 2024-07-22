<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/math.css">
        <link rel="stylesheet" href="styles/userProfile.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    </head>

    <body>
        <?php include("headerafter.php"); ?>

        <section>
            <div class="row">
                <div class="game-text">
                    <h5>Choose One To Play!</h5>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="game-img">
                        <a href="adding.php" >
                        <img src="image/adding.png" width="100%">
                        </a>
                    </div>   
                    <div class="game-text">
                        <a href="adding.php">ADDITION</a></li>
                    </div>
                </div>

                <div class="container">
                    <div class="game-img">
                        <a href ="subtract.php">
                        <img src="image/subtraction.jpg" width="100%">
                        </a>
                    </div>   
                    <div class="game-text">
                        <a href="subtract.php">SUBTRACTION</a></li>
                    </div>
                </div>
                
                <div class="container">
                    <div class="game-img">
                        <a href ="multiply.php">
                        <img src="image/multiply.jpg" width="100%">
                        </a>
                    </div>   
                    <div class="game-text">
                        <a href="multiply.php">MULTIPLICATION</a></li>
                    </div>
                </div>

                <div class="container">
                    <div class="game-img">
                        <a href ="divide.php">
                        <img src="image/divide.png" width="100%">
                        </a>
                    </div>   
                    <div class="game-text">
                        <a href="divide.php">DIVISION</a></li>
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>
    </body>
</html>
