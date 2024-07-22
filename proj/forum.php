<?php
session_start();

// check if user is logged in, if not logged in will redirect to login page and cannot use forum
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

date_default_timezone_set('Asia/Kuala_Lumpur');

//$conn = mysqli_connect("localhost:3301", "root", "", "assignment2_webdev");
include("inc/connect.php");

$datas = mysqli_query($conn, "SELECT forum.*, user.User_Username FROM forum JOIN user ON forum.User_ID = user.User_ID WHERE reply_id = 0");

// Search function
if (isset($_POST["search_submit"])) {

    if (!empty($_POST["search_keyword"])) {
        $search_keyword = "%{$_POST["search_keyword"]}%";
        $searchQuery = "SELECT forum.*, user.User_Username FROM forum JOIN user ON forum.User_ID = user.User_ID WHERE Forum_Title LIKE ? OR Forum_Description LIKE ? ORDER BY Forum_Timestamp";
        $stmt = mysqli_prepare($conn, $searchQuery);
        mysqli_stmt_bind_param($stmt, "ss", $search_keyword, $search_keyword);
        mysqli_stmt_execute($stmt);
        $search_result = mysqli_stmt_get_result($stmt);

        $datas = mysqli_num_rows($search_result) > 0 ? $search_result : $datas;
    }
}

// Submit comment function
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["comment"];
    $timestamp = date('F j Y \a\t g:i A');
    $reply_id = $_POST["reply_id"];
    $user_id = $_SESSION['User_ID'];

    $existingCommentQuery = "SELECT * FROM forum WHERE Forum_Title = ? AND Forum_Description = ? AND reply_id = ?";
    $stmt = mysqli_prepare($conn, $existingCommentQuery);
    mysqli_stmt_bind_param($stmt, "ssi", $title, $description, $reply_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        $insertQuery = "INSERT INTO forum (User_ID, Forum_Title, Forum_Description, Forum_Timestamp, reply_id) VALUES (?, ?, ?, NOW(), ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "issi", $user_id, $title, $description, $reply_id);
        mysqli_stmt_execute($stmt);
    }
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EarlyLearn Hub</title>
    <link rel="stylesheet" href="styles/headerfooter.css">
    <link rel="stylesheet" href="styles/forum.css">
    <link rel="stylesheet" href="styles/userProfile.css">
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Your-Preferred-Font', sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }

        .container {
            background: #fff;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .comment,
        .reply {
            margin-top: 20px;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .reply {
            border: 1px solid #ccc;
        }

        .comment p, .reply p {
            margin: 10px 0;
        }

        form {
            margin: 20px 0;
        }

        form h3 {
            margin-bottom: 10px;
        }

        form input,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button.submit,
        button.reply {
            background: blue;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            width: 100%;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        button.reply {
            background: green;
        }

        form button[type="submit"] {
            background: green;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 5px;
            max-width: 120px;
        }

        .search-bar form {
            text-align: center;
        }

        .search-bar form input {
            width: 30%;
            padding: 10px;
            margin-bottom: 0%;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-bar form button[type="submit"] {
            background: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 5px;
            margin-left: 10px;
        }

        form button.submit:hover,
        button.reply:hover,
        form button[type="submit"]:hover,
        .search-bar form button[type="submit"]:hover {
            background: #007BFF;
        }

        .timestamp {
            font-family: 'Verdana';
            font-size: 13px;
        }

        .reply {
            font-size: 1;
            padding: 8px 12px;
            background-color: whitesmoke;
            color: black;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <?php include("headerafter.php") ?>
    <section>
        <article>

        <div class="communityForums">
                <h2>Community Forums</h2>
            </div>

            <div class="search-bar">
                <form action="" method="post">
                    <input type="text" name="search_keyword" class="search-input" placeholder="Search comments..." value="<?php if(isset($_POST['search_keyword'])){ echo htmlentities($_POST['search_keyword']); }?>">
                    <button type="submit" name="search_submit">Search</button>
                </form>
            </div>

            <div class="container-boxes">
                <div class="box">
                    <div class="box-background"></div>
                    <div class="titlebox release-notes">
                        <div class="box-title">Release Notes</div>
                    </div>
                    <div class="box-content">Stay updated on new features, enhancements, and bug fixes in EarlyLearn Hub</div>
                </div>
                <div class="box">
                    <div class="box-background"></div>
                    <div class="titlebox ideas">
                        <div class="box-title">Ideas</div>
                    </div>
                    <div class="box-content">If you got any ideas or suggestions on what you like to see in EarlyLearn Hub, leave your thoughts here.</div>
                </div>
                <div class="box">
                    <div class="box-background"></div>
                    <div class="titlebox community">
                        <div class="box-title">Ask the Community</div>
                    </div>
                    <div class="box-content">Have any questions about EarlyLearn Hub? Post it here.</div>
                </div>
            </div>

            <div class="container">
                <form action="" method="post">
                    <h3 id="title">Leave a Comment</h3>
                    <input type="hidden" name="reply_id" id="reply_id">
                    <input type="text" name="title" placeholder="Title" id="titleInput">
                    <textarea name="comment" placeholder="Your comment"></textarea>
                    <button class="submit" type="submit" name="submit">Submit</button>
                </form>

                <?php
                if (isset($_GET["search"])) {
                    foreach ($search_result as $result) {
                        include 'comment.php';
                    }
                } else {
                    foreach ($datas as $data) {
                        include 'comment.php';
                    }
                }
                ?>
            </div>

            <script>
                function reply(id, name) {
                    title = document.getElementById('title');
                    titleInput = document.getElementById('titleInput');
                    title.innerHTML = id ? "Reply to " + name : "Leave a Comment";
                    titleInput.style.display = id ? "none" : "block";
                    document.getElementById('reply_id').value = id;
                }
            </script>
        </article>
    </section>

    <?php include("footer.php"); ?>
</body>

</html>