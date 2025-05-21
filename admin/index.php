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
                <title>Design Portfolio | Admin</title>
                <link rel="stylesheet" href="../style.css">
        </head>

        <body>
                <nav>
                        <a href="../about-me.php" class="nav-links">about me</a>
                        <h1>    
                                        <a href="../index.php">
                                                Design Portfolio
                                        </a>
                                </h1>
                        <a href="../my-works.php" class="nav-links">my works</a>
                        </ul>
                </nav>

                <main class="admin-main">
                        <h1 class="admin-select-header" >What Do You Want To Change</h1>

                        <section class="admin-choice-selection">
                                <a href="./edit-my-works-page.php" class="edit-my-works-page">Edit My Works Page</a>
                                <a href="./edit-about-me.php" class="edit-about">Edit About me</a>
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