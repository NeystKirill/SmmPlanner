<?php 
namespace App\View ; 
/**
 * Абстраактный класс для создания шаблона Html с сыллками и скриптами :
 */
abstract class Base
{
    /**
     * Отрисовывает HTML страницу с использованием предоставленных данных.
     * Метод подготавливает структуру HTML документа и загружает ресурсы, такие как CSS и JavaScript.
     * 
     * @param array $data Ассоциативный массив с данными, которые могут быть использованы в HTML шаблоне.
     */
    public function render(array $data = []) 
    {
        ?> 
        <!DOCTYPE html>
            <!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
            <!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
            <head>
                <meta charset="utf-8">
                <title><?= $data['title'] ?? ''; ?></title>
                <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
                <meta name="author" content="pixelcave">
                <meta name="robots" content="noindex, nofollow">
                <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
                <!-- Icons -->
                <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
                <link rel="shortcut icon" href="/oneui/assets/img/favicons/favicon.png">
                <link rel="icon" type="image/png" href="/oneui/assets/img/favicons/favicon-16x16.png" sizes="16x16">
                <link rel="icon" type="image/png" href="/oneui/assets/img/favicons/favicon-32x32.png" sizes="32x32">
                <link rel="icon" type="image/png" href="/oneui/assets/img/favicons/favicon-96x96.png" sizes="96x96">
                <link rel="icon" type="image/png" href="/oneui/assets/img/favicons/favicon-160x160.png" sizes="160x160">
                <link rel="icon" type="image/png" href="/oneui/assets/img/favicons/favicon-192x192.png" sizes="192x192">
                <link rel="apple-touch-icon" sizes="57x57" href="/oneui/assets/img/favicons/apple-touch-icon-57x57.png">
                <link rel="apple-touch-icon" sizes="60x60" href="/oneui/assets/img/favicons/apple-touch-icon-60x60.png">
                <link rel="apple-touch-icon" sizes="72x72" href="/oneui/assets/img/favicons/apple-touch-icon-72x72.png">
                <link rel="apple-touch-icon" sizes="76x76" href="/oneui/assets/img/favicons/apple-touch-icon-76x76.png">
                <link rel="apple-touch-icon" sizes="114x114" href="/oneui/assets/img/favicons/apple-touch-icon-114x114.png">
                <link rel="apple-touch-icon" sizes="120x120" href="/oneui/assets/img/favicons/apple-touch-icon-120x120.png">
                <link rel="apple-touch-icon" sizes="144x144" href="/oneui/assets/img/favicons/apple-touch-icon-144x144.png">
                <link rel="apple-touch-icon" sizes="152x152" href="/oneui/assets/img/favicons/apple-touch-icon-152x152.png">
                <link rel="apple-touch-icon" sizes="180x180" href="/oneui/assets/img/favicons/apple-touch-icon-180x180.png">
                <!-- Slick Slider CSS -->
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
                <!-- END Icons -->
                <!-- Web fonts -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
                <!-- Bootstrap and OneUI CSS framework -->
                <link rel="stylesheet" href="/oneui/assets/css/bootstrap.min.css">
                <link rel="stylesheet" id="css-main" href="/oneui/assets/css/oneui.css">
            </head>
            <body>
                <?= $this->container($data); ?>

                <!-- Core JS -->
                <script src="/oneui/assets/js/core/jquery.min.js"></script>
                <script src="/oneui/assets/js/core/bootstrap.min.js"></script>
                <script src="/oneui/assets/js/core/jquery.slimscroll.min.js"></script>
                <script src="/oneui/assets/js/core/jquery.scrollLock.min.js"></script>
                <script src="/oneui/assets/js/core/jquery.appear.min.js"></script>
                <script src="/oneui/assets/js/core/jquery.countTo.min.js"></script>
                <script src="/oneui/assets/js/core/jquery.placeholder.min.js"></script>
                <script src="/oneui/assets/js/core/js.cookie.min.js"></script>
                <script src="/oneui/assets/js/app.js"></script>

                <!-- Slick Slider JS -->
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.js-slider').slick({
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            dots: true
                        });
                    });
                </script>
        </body>
    </html>

        <?php
    }
    /**
     * Абстрактный метод container для дальнейшего создания основного sidebar:
     */
    abstract public function container(array $data) ;
}