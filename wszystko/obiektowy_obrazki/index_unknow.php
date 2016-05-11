<html>
<head>
<!--    administrator komentarzy z facebooka-->
    <meta property="fb:admins" content="100005557807089"/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  <!--- kodowanie polskich znaków -->
<!---->
<!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="custom.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">

        /* Sticky footer styles
        -------------------------------------------------- */

        html,
        body {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
        }

        /* Wrapper for page content to push down footer */
        #wrap {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            /* Negative indent footer by it's height */
            margin: 0 auto -60px;
        }

        /* Set the fixed height of the footer here */
        #push,
        #footer {
            height: 60px;
        }
        #footer {
            background-color: #f5f5f5;
            text-align: center;
        }

        /* Lastly, apply responsive CSS fixes as necessary */
        @media (max-width: 767px) {
            #footer {
                margin-left: -20px;
                margin-right: -20px;
                padding-left: 20px;
                padding-right: 20px;
            }
        }





    </style>
</head>

<body>
<!--google-->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-54328694-2', 'auto');
    ga('send', 'pageview');

</script>



<!--skrypt obsługujący komentarze facebook-->
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.5&appId=1776971415858954";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<!--skrypt obsługujący like button-->
<!---->
<!--<div id="fb-root"></div>-->
<!--<script>(function(d, s, id) {-->
<!--        var js, fjs = d.getElementsByTagName(s)[0];-->
<!--        if (d.getElementById(id)) return;-->
<!--        js = d.createElement(s); js.id = id;-->
<!--        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1776971415858954";-->
<!--        fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));</script>-->


<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=1776971415858954";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <ul class="nav nav-pills">
<!--            <li role="presentation" class="active"><a href="#">Home</a></li>-->

            <?php
            session_save_path('session/');
            session_start();


            if(!(isset($_SESSION['userID']))) {
                echo '<li role="presentation"><a href="?page=login">Zaloguj</a></li>';
            }
            if(isset($_SESSION['userID'])) {

                echo '<li role="presentation"><a href="?page=logout">Wyloguj</a></li>';

                echo '<li role="presentation"><a href="?page=add">Dodaj zdjęcie</a></li>';
            }
            ?>


            <li role="presentation"><a href="?category=all">Wszystko</a></li>
            <li role="presentation"><a href="?category=top">News</a></li>
            <li role="presentation"><a href="?category=technowinki">Technowinki</a></li>
            <li role="presentation"><a href="?category=natura">Natura</a></li>
            <li role="presentation"><a href="?category=nieporawni">Nieporawni</a></li>
            <li role="presentation"><a href="?category=inne">Inne</a></li>
            <li role="presentation"><a href="?category=rule">Regulamin</a></li>
        <li><form class="navbar-form navbar-left" role="search" method="get" action="index_unknow.php"></li>

           <li><button type="submit" class="btn btn-default" name="category" value="search">Szukaj</button>
            </li>
            <li><div class="form-group">
                <input type="text" class="form-control" placeholder="w opisie" name="searchValue">
            </div></li>

        </ul>
        </form>
    </nav>
</div>

<div class="container" style="padding-top: 100px;">


<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 26.02.16
 * Time: 16:39
 */

// dodaje
session_save_path('session/');
session_start();


include 'src/Pictures.php';
include 'src/Users.php';

////Testowe wyświetlanie zmiennych///


//////////////// Produkty//
$product = new Pictures();
$user = new Users();

$description = $_GET['searchValue'];

$searchButton = $_GET['seachButton'];


if(isset($_GET['picture'])) {
    $picture = $_GET['picture'];
    $product->onePicture($picture);
} else {

// wyloguj

if(isset($_GET['page'])) {
    if($_GET['page'] == 'logout') {
        session_destroy();
        header("Location: index_unknow.php?category=all");
        exit;
    }
}



// logowanie do zmiennej sesyjnej
if(isset($_POST['log'])) {

    $_SESSION['userID'] = $user->login($_POST['login'], $_POST['password']);
    header("Location: index_unknow.php?page=add");
    exit;
}

// wyświetlanie logowania i rejestracji
if(isset($_GET['page'])) {
    if($_GET['page'] == "login") {

        //$product->writeForm();
        $user->writeForm();

    }
}

// rejestracja
if(isset($_POST['reg'])) {
    $user->registry($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['login'], $_POST['password'], $_POST['password2']);
}

// potwierdzenie rejestracji
if(isset($_GET['activate'])) {
    $user->userActivate($_GET['activate']);
}


if(isset($_GET['picture'])) {
    $picture = $_GET['picture'];
    $product->onePicture($picture);
}

if(isset($_SESSION['userID'])) {
    // sprawdzam aktywację konta a potem dodaje zdjęcie
    if($user->checkActivate($_SESSION['userID'])) {


            // dodawanie produktu formularz

            if(isset($_GET['page'])) {
                if($_GET['page'] == "add") {

                    $product->writeForm();

                }
            }

            // dodawanie produktu SQL
            if(isset($_POST['insertPicture'])) {
                $product->addProduct($_FILES['file_upload'], $_SESSION['userID'], $_POST['category'],
                    $_POST['primaryName'], $_POST['description'], $_POST['$likes'] );
                header ("Location: index_unknow.php?category=all");
                exit;
            }
    } else {
        echo "Konto nie aktywowane. Potwierdź rejestrację.";
    }
}

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$category = $_GET['category'];

// wyszukiwarka i domyslna kategoria tj. nie specjalna

if(isset($description)) {
    $product->showPictureSearch($product->cutterMin($page), 5, $description);
} else {
$product->showPictureCategory($product->cutterMin($page), 5, $category);
}

if($_GET['category'] == 'rule') {
    $product->writeRule();
}
if($_GET['category'] == 'all') {
    $product->showPictureAll($product->cutterMin($page), 5);
}
if($_GET['category'] == 'top') {
    $product->showPictureTop($product->cutterMin($page), 5);
}
?>


</div>
    <div class="container">
        <div class="row jumbotron" style="text-align: center">
            <div class="col-md-2"></div>
                <div class="col-md-6">
<?php

if(!(($page=='add') || isset($_GET['picture']))) {
    //$product->paginationProto($product->counter(),5);

    if(isset($description)) {
        $product->paginationSearch($product->counterSearch($description), 5, $category, $description);
    } else {
        $product->paginationCategory($product->counterCategory($category), 5, $category);
    }

    if($_GET['category'] == 'top') {
        $product->paginationTop($product->counter(), 5);
    }

    if($_GET['category'] == 'all') {
        $product->paginationAll($product->counter(), 5);
    }

}

}
?>
            </div>
            <div class="col-md-2"></div>
        </div>
</div>

<!--footer-->
 <!-- Begin page content -->
<div class="container">



<div id="footer">
    <div class="container">
        <br />
        <p class="muted credit">Developed: Krzysztof Sikora Contact: listdlakrzycha@gmail.com</p>

    </div>
</div>
</div>
<!--end footer-->


</body>
</html>
