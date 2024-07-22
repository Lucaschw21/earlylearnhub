<!DOCTYPE html>
<html lang="en">
    <head>
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/contact.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    </head>
    <body>
        <section>
            <div class="container">
                <?php 
                    include("inc/connect.php");
                    $nm = $_POST['name'];
                    $phone = $_POST['phone'];
                    $eml = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    
                    $sql = "INSERT INTO contactform(CF_Name, CF_Phone, CF_Email, CF_Subject, CF_Message) VALUES ('$nm', '$phone', '$eml', '$subject', '$message')" or
                    die("Error inserting data into table");

                    if($conn->query($sql) === TRUE){
                        echo("<h1> Thank You For Your Message! </h1>");
                        echo("<p> We would love to repond to your queries and help you succeed. </p>");
                        echo "<meta http-equiv=\"refresh\" content=\"3;URL=userLoginPage.php\">";
                        
                        
                    } else {
                        echo "<h1>Error: " . $sql . "<br>" . $conn->error."</h1>";
                        echo "<meta http-equiv=\"refresh\" content=\"3;URL=userLoginPage.php\">";
                    }

                    //Close specified connection
                    $conn->close();
                ?>
            </div>
        </section>
        <script type="text/javascript" src="scripts/script.js"></script>
    </body>
</html>