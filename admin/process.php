<?php
        require_once('../lib/database.php');
        $database = new Database();

        if(!isset($_GET['action']) || empty($_GET['action'])) {
                exit;
        }

        switch ($_GET['action']) {
                case 'aboutme':
                        if( $_FILES['about-me-main-img']['error'] !== 0 ) {
                                $data = array(
                                        "text" => strip_tags($_POST['about-me-text']),
                                        "quote" => strip_tags($_POST['about-me-quote'])
                                );
                        }else{
                                $data = array(
                                        "text" => strip_tags($_POST['about-me-text']),
                                        "quote" => strip_tags($_POST['about-me-quote']),
                                        "img" => file_get_contents($_FILES['about-me-main-img']['tmp_name'])
                                );
                        }
                        $where['id'] = '=' . '0';
                        $database->updateRows("about_me", $data, $where);
                        header('Location: edit-about-me.php');
                        break;
                case 'addnewpost':
                        $homeData = $database->getRow("home");
                        $total = $homeData['total'] + 1;

                        $data = array(
                                "id" => $total,
                                "post_text" => strip_tags($_POST['about-me-text']),
                                "post_title" => strip_tags($_POST['about-me-quote']),
                                "img" => file_get_contents($_FILES['about-me-main-img']['tmp_name'])
                        );
                        $database->insertRows("posts", $data);

                        // update home page total
                        $homeData = array(
                                'total' => $total
                        );
                        $homeWhere['id'] = '=' . '0';
                        $database->updateRows("home", $homeData, $homeWhere);

                        header('Location: edit-my-works-page.php');
                        break;
                case 'editpost':
                        if( $_FILES['about-me-main-img']['error'] !== 0 ) {
                                $data = array(
                                        "post_text" => strip_tags($_POST['about-me-text']),
                                        "post_title" => strip_tags($_POST['about-me-quote'])
                                );
                        }else{
                                $data = array(
                                        "post_text" => strip_tags($_POST['about-me-text']),
                                        "post_title" => strip_tags($_POST['about-me-quote']),
                                        "img" => file_get_contents($_FILES['about-me-main-img']['tmp_name'])
                                );
                        }
                                
                        $where['id'] = '=' . strip_tags($_POST['post-id']);
                        $database->updateRows("posts", $data, $where);
                        
                        header('Location: edit-my-works-page.php');
                        break;
                case 'delete-work':
                        // echo ':)';
                        $id = $_GET['pid'];
                        $where['id'] = '=' . $id;
                        $database->removeRows('posts', $where );

                        // update home page total
                        $homeData = $database->getRow("home");
                        $total = $homeData['total'] - 1;

                        $homeData = array(
                                'total' => $total
                        );
                        $homeWhere['id'] = '=' . '0';
                        $database->updateRows("home", $homeData, $homeWhere);

                        // Clean up post Id's
                        if ( $id != ( $homeData['total'] + 1) ) {
                                $movedPostData = array(
                                        'id' => $id
                                );

                                $moveWhere['id'] = '=' . ($homeData['total'] + 1);
                                $database->updateRows("posts", $movedPostData, $moveWhere);
                        }

                        header('Location: ./edit-my-works-page.php');
                        break;
                default:
                        # code...
                        echo 'Sometimes there\'s nothing to do :)';
                        break;
        }
?>