<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php $title = $page->title; echo $title; ?></title>
    <meta name="description" content="<?php echo $page->summary; ?>" />
    
    <!-- UIkit CSS -->
    <!-- <link rel="stylesheet" href="<?php // echo $config->urls->templates?>styles/uikit-3.4.6/css/uikit.min.css" /> -->

    <!-- FRE:D -->
<!--     <script src="<?php // echo $config->urls->templates?>styles/js/uikit.min.js"></script>
    <script src="<?php // secho $config->urls->templates?>styles/js/uikit-icons.min.js"></script>
 -->
    <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
    <!-- <link rel="stylesheet" type="text/css" href="<?php // echo $config->urls->templates?>styles/custom.css?v=1.0" /> -->
    <link rel="stylesheet" type="text/css" href="<?=$config->urls->templates?>tailwindcss/public/build/tailwind.css?v=1.6" />
    <link rel="stylesheet" type="text/css" href="<?=$config->urls->templates?>tailwindcss/css/tailwind.css?v=1.6" />


    <!-- UIkit JS -->
<!--     <script src="<?php // echo $config->urls->templates?>styles/uikit-3.4.6/js/uikit.min.js"></script>
    <script src="<?php // echo $config->urls->templates?>styles/uikit-3.4.6/js/uikit-icons.min.js"></script>
 -->
    <!-- AJAX CALL -->
    <!-- <script src="<?php // echo $config->urls->templates?>styles/uikit-3.4.6/js/uikit-icons.min.js"></script> -->
    
    <!-- font awesome -->     
    <script src="https://kit.fontawesome.com/18e205e8e3.js" crossorigin="anonymous"></script>

    <!-- favicons :D -->
<!--     <link rel="apple-touch-icon" sizes="180x180" href="./site/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./site/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./site/favicons/favicon-16x16.png">
    <link rel="manifest" href="./site/favicons/site.webmanifest">
    <link rel="mask-icon" href="./site/favicons/safari-pinned-tab.svg" color="#00a85f">
    <meta name="msapplication-TileColor" content="#00a85f">
    <meta name="theme-color" content="#ffffff">
 -->
    <?php
    // handle output of 'hreflang' link tags for multi-language
    // this is good to do for SEO in helping search engines understand
    // what languages your site is presented in	
    foreach($languages as $language) {
        // if this page is not viewable in the language, skip it
        if(!$page->viewable($language)) continue;
        // get the http URL for this page in the given language
        $url = $page->localHttpUrl($language); 
        // hreflang code for language uses language name from homepage
        $hreflang = $homepage->getLanguageValue($language, 'name'); 
        // output the <link> tag: note that this assumes your language names are the same as required by hreflang. 
        echo "\n\t<link rel='alternate' hreflang='$hreflang' href='$url' />";
    }

    ?>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
            
</head>
