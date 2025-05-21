<?php
    require_once('../lib/database.php');
    $database = new Database();
?>
<!DOCTYPE html>
<html lang="en">

        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>My Design Portfolio | Add New Post</title>
                <link rel="stylesheet" href="../style.css">
                <script defer src="./js/edit-about-me.js"></script>
        </head>

        <body>
                
                <main class="edit about-me-main">
                        <nav class="about-me-nav">
                                <a href="#" class="nav-links">about me</a>
                                <h1>    
                                        <a href="./index.php">
                                                Design Portfolio
                                        </a>
                                </h1>
                                <a href="./my-works.php" class="nav-links">my works</a>
                        </nav>

                        <form class="about-me-content"  action="process.php?action=addnewpost" method="post" enctype="multipart/form-data">
                                <div class="about-me-top-content">
                                        <div class="about-me-top-content-right">
                                                <label for="about-me-main-img">Post Image</label>
                                                <input type="file" name="about-me-main-img">
                                                <div class="edit-about-me-main-img-cont">
                                                        <img class="about-me-main-img edit" src="">
                                                        <div class="edit-about-me-main-img-overlay">Change Image</div>
                                                </div>
                                        </div>
                                        <div class="about-me-top-content-left">
                                                <label for="about-me-text">Post Text</label>
                                                <textarea name="about-me-text" rows="15" class="about-me-text"></textarea>
                                        </div>
                                </div>

                                <div class="edit-about-me-quote-row">
                                        <label for="about-me-quote">Post Title :</label>
                                        <input name="about-me-quote" class="about-me-quote" type="text" value="" />
                                </div>
                                <div class="edit-about-me-submit-row">
                                        <input type="submit" value="Submit">
                                </div>
                        </form>

                </main>

                <footer>
                        <span class="footer-left">
                                <span>Craig Tanaka Mudzingwa</span>
                                /
                                <span>2023</span>
                                /
                                <span>All Rights Reserved</span>
                        </span>
                </footer>

        </body>

</html>