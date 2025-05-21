<?php
        require_once('lib/database.php');
        $database = new Database();
        
        $aboutMeData = $database->getRow("about_me");
?>
<!DOCTYPE html>
<html lang="en">

        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>My Design Portfolio | About Me</title>
                <link rel="stylesheet" href="style.css">
        </head>

        <body>
                
                <main class="about-me-main">
                        <nav class="about-me-nav">
                                <a href="#" class="nav-links">about me</a>
                                <h1>    
                                        <a href="./index.php">
                                                Design Portfolio
                                        </a>
                                </h1>
                                <a href="./my-works.php" class="nav-links">my works</a>
                        </nav>

                        <section class="about-me-content">
                                <div class="about-me-top-content">
                                        <?php 
                                                echo '<img class="about-me-main-img edit" src="data:image/jpeg;base64,'.base64_encode($aboutMeData['img']).'"/>';
                                        ?>
                                        <p class="about-me-text">
                                                <?php echo $aboutMeData['text']?>
                                        </p>
                                </div>

                                <p class="about-me-quote"><?php echo $aboutMeData['quote']; ?></p>
                        </section>

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