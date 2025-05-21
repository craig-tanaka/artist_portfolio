<?php
        require_once('lib/database.php');
        $database = new Database();

        // Gets id of current home post
        $homePageData = $database->getRow("home");
        // Gets the affromentioned post data
        $where['id'] = '=' . $homePageData['current'];
        $homePagePost = $database->getRow("posts", "*", $where);

        // Update home table post id next post id
        if ( $homePageData['current'] == $homePageData['total'] ) {
                $current = 1;
        } else {
                $current = $homePageData['current'] + 1;
        }
        $data = array(
                'current' => $current       
        );
        $where['id'] = '=' . '0';
        $database->updateRows("home", $data, $where);

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Design Portfolio</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>
        <nav>
                <a href="./about-me.php" class="nav-links">about me</a>
                <h1>Design Portfolio</h1>
                <a href="./my-works.php" class="nav-links">my works</a>
                </ul>
        </nav>

        <main>
                <div class="main-content">
                        <?php 
                                        echo '<img class="home-page-img" src="data:image/jpeg;base64,'.base64_encode($homePagePost['img']).'"/>';
                                ?>
                        <div class="main-content-text-cont">
                                <h3>
                                        <?php echo $homePagePost['post_title']; ?>
                                </h3>
                                <p>
                                        <?php echo $homePagePost['post_text']; ?>
                                </p>
                        </div>
                </div>

        </main>

        <footer>
                <span class="footer-left">
                        <span>Craig Tanaka Mudzingwa</span>
                        /
                        <span>2023</span>
                        /
                        <span>All Rights Reserved</span>
                </span>

                <script>
                        const textCont = document.querySelector('.main-content-text-cont');
                        const height = textCont.clientHeight;

                        textCont.style.top = '50%';
                        textCont.style.marginTop = "-" + (height / 2) + "px";
                </script>
        </footer>

</body>

</html>