<?php
    require_once('../lib/database.php');
    $database = new Database();
    $posts = $database->getRows('posts');
?>
<!DOCTYPE html>
<html lang="en">

        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>My Design Portfolio | Edit My Works</title>
                <link rel="stylesheet" href="../style.css">
        </head>

        <body>
                <header class="my-works-header">
                        <nav>
                                <h1>
                                        <a href="./index.php">
                                                Design Portfolio
                                        </a>
                                </h1>
                                <div class="nav-sub-row">
                                        <a href="./edit-about-me.php" class="nav-links">about me</a>
                                        <a href="#" class="nav-links">my works</a>
                                </div>
                                </ul>
                        </nav>
                </header>

                <section class="main-section--my-works">
                        <aside class="my-works-aside">
                                <hr>
                                <h2>Edit Your Works</h2>
                                <a class="add-new-post" href="./add-new-post.php">Add New Post</a>
                                <hr>

                                <p class="my-works-quote">The Muse of Inspiration Loves a Blue Collar Work Ethic. She loves the Working-Stiff and hates Pri-Madonnas</p>
                                <b class="my-quotes-quote-author">Steven Prestfield</b>

                                <hr>

                                <h4 class="my-works-socials-header">My Social Media</h4>
                                <ul class="my-works-social-links">
                                        <li>Facebook: <em>@Artist101</em></li>
                                        <li>Twitter: <em>@RemaArtistic</em></li>
                                        <li>Instagram: <em>@FailedArtist</em></li>
                                </ul>

                                <hr>

                                <div class="aside-footer">
                                        <div>Craig Tanaka Mudzingwa</div>
                                        <div>Copyright 2023</div>
                                        <div>All Rights Reserved</div>
                                </div>

                                <hr>
                        </aside>

                        <main class="my-works-main">

                                <?php foreach ($posts as $post) { ?>
                                        <div class="my-works-work" id="<?php echo $post['id']; ?>">
                                                <?php 
                                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($post['img']).'"/>';
                                                ?>
                                                <div class="my-works-work-img-after"></div>
                                                <div class="my-works-work-subtext">
                                                        <h5 class="my-works-work-title">
                                                                <?php echo $post['post_title']; ?>
                                                        </h5>
                                                        <p class="my-works-work-para">
                                                                <?php echo $post['post_text']; ?>
                                                        </p>
                                                        
                                                        <span>
                                                                <a href="./edit-post.php?pid=<?php echo $post['id']; ?>" class="edit-post-link">Edit Post</a>
                                                                <a href="./process.php?action=delete-work&pid=<?php echo $post['id']; ?>" class="edit-post-link">Delete Post</a>

                                                        </span>
                                                </div>
                                        </div>
                                <?php } ?>
                        </main>

                </section class="main-content-section">

        </body>

</html>