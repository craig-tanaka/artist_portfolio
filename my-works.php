<?php
    require_once('lib/database.php');
    $database = new Database();
    $posts = $database->getRows('posts');
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Design Portfolio | My Works</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>
        <div class="img-displayer-cont">
                <button class="img-display-close-button">x</button>
                <div class="img-display">
                        <img src="" />
                        <button>View</button>
                        <div class="subtext">
                                <button class="subtext-close">x</button>
                                <h5 class="title">
                                </h5>
                                <p class="para">
                                </p>
                        </div>
                </div>
        </div>
        <header class="my-works-header">
                <nav>
                        <h1>
                                <a href="./index.php">
                                        Design Portfolio
                                </a>
                        </h1>
                        <div class="nav-sub-row">
                                <a href="./about-me.php" class="nav-links">about me</a>
                                <a href="#" class="nav-links">my works</a>
                        </div>
                        </ul>
                </nav>
        </header>

        <section class="main-section--my-works">
                <aside class="my-works-aside">
                        <hr>

                        <p class="my-works-quote">The Muse of Inspiration Loves a Blue Collar Work Ethic. She loves the
                                Working-Stiff and hates Pri-Madonnas</p>
                        <b class="my-quotes-quote-author">Steven Prestfield</b>

                        <hr>

                        <h4 class="my-works-socials-header">My Social Media</h4>
                        <ul class="my-works-social-links">
                                <li>Facebook: <em>@Artist101</em></li>
                                <li>Twitter: <em>@RemaArtistic</em></li>
                                <li>Instagram: <em>@FailedArtist</em></li>
                        </ul>

                        <hr>

                        <h4 class="my-works-socials-header">Contact Me</h4>
                        <ul class="my-works-social-links">
                                <li>555 000 000 000</li>
                                <li>johndoe@gmail.com</li>
                                <li>Bydgoscsz Poland</li>
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
                        <div class="my-works-work  non-admin" id="<?php echo $post['id']; ?>">
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
                                </div>
                        </div>
                        <?php } ?>
                </main>

        </section class="main-content-section">

        <footer>
                <span class="footer-left">
                        <span>Craig Tanaka Mudzingwa</span>
                        /
                        <span>2023</span>
                        /
                        <span>All Rights Reserved</span>
                </span>

                <script>
                        const postImages = document.querySelectorAll('.my-works-work-img-after');
                        const imgDisplayerCont = document.querySelector('.img-displayer-cont');
                        const subtextCont = document.querySelector('.img-display .subtext');

                        postImages.forEach((el) => {
                                el.addEventListener('click', (ev) => {
                                        img = ev.target.previousElementSibling;

                                        document.querySelector('.img-display img').src =
                                                img.src;
                                        imgDisplayerCont.style.display = 'flex';
                                        document.querySelector('.img-display .title').innerHTML = img.nextElementSibling.nextElementSibling.children[0].innerHTML;
                                        document.querySelector('.img-display .para').innerHTML = img.nextElementSibling.nextElementSibling.children[1].innerHTML;

                                })
                        });

                        document.querySelector('.img-displayer-cont > button').addEventListener('click', () => {
                                imgDisplayerCont.style.display = 'none';
                        })

                        document.querySelector('.img-display > button').addEventListener('click', () => {
                                document.querySelector('.img-display > .subtext').style.display = 'initial';

                                        const height = subtextCont.clientHeight;
                                        subtextCont.style.marginTop = "-" + (height / 2) + "px";
                        });

                        document.querySelector('.img-display .subtext-close').addEventListener( 'click', () => {
                                subtextCont.style.display = 'none';
                        } )
                </script>
        </footer>

</body>

</html>