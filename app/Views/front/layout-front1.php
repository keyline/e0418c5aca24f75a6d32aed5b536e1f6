<?php
$pageName = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
$ASSETS_URL = getenv('ASSETS_URL');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?=$head?>
    </head>
    <body>
        <div class="loadingio-spinner-pulse-4ofwcox9r54" style="display:none;">
            <div class="ldio-0lvymc0w5sdn">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <header>
            <?=$header?>
        </header>
        <div id="pageContent">
            <?=$maincontent?>
        </div>
        <script src="<?=$ASSETS_URL?>splide-4.1.3/dist/js/splide.min.js"></script>
        <script>
            var splide1 = new Splide('.splide1', {
                type: 'loop',
                gap: 10,
                arrows: false,
                pagination: false,
                mediaQuery: 'min',
                breakpoints: {
                    0: {
                        focus: 'center',
                        perPage: 4
                    },
                    600: {
                        focus: 0,
                        perPage: 4,
                    },
                    1000: {
                        perPage: 7,
                        focus: 'center',
                        // destroy:true,
                    }
                },
            });
            splide1.mount();
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <?php if(empty($_GET['page'])){ ?>
        <script type="text/javascript" src="<?=$ASSETS_URL?>redirect-ajax.js"></script>
                 
        <?php } ?>
    </body>
</html>