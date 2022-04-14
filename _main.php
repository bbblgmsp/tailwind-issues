<?php namespace ProcessWire; ?>

<html lang="<?php echo _x('de', 'HTML language code'); ?>">

    <?php require '_head.php'; ?>

    <body>

        <!-- cover -->
        <div id="container">    

        <div id="wrapper">
            <div id="top" style="z-index: 980;">

                <div class='topnav navi uk-flex-center bgwhite'>

                    <nav class="uk-navbar-container bgwhite" uk-navbar uk-sticky>
                            <?php 
                            if ($page->id == 1) {$link = "#top"; $scroll = "uk-scroll";} else {$link = $homepage->url; $scroll = "";} ?>

                            <h1>
                                <a id="logo" class="uk-navbar-item uk-logo" href="<?=$link?>" <?=$scroll?>>
                                </a>
                            </h1>
                        <div class="uk-navbar-left">


                        </div>
                        <div class="uk-navbar-right">

                            <?php 
                            echo '<ul class="uk-navbar-nav desktop">';
                                if ($page->id == 1) {
                                    foreach ($homepage->children("allocation=1") as $menuitem) {
                                        echo '<li><a class="link" href="#' . $menuitem->name . '" uk-scroll>' . $menuitem->title . '</a>';

                                        if (!$menuitem->children("template=successive_layout")->count()) { 
                                            echo '</li>'; 
                                            continue; 
                                        } ?>

                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">

                                            <?php
                                            foreach ($menuitem->children("template!=client, template!=cooperation") as $submenuitem) { ?>
                                                <li class="uk-nav-header">
                                                    <strong><a class="link submenu" href="#<?=$submenuitem->name?>" uk-scroll><?=$submenuitem->title?></a></strong>
                                                    <?php
                                                    $subsubmenuitems = $submenuitem->children();
                                                    if ($subsubmenuitems->count()) { 
                                                        foreach ($subsubmenuitems as $subsubmenuitem) { ?>
                                                            <a class="link subsubmenu" href="#<?=$subsubmenuitem->name?>" uk-scroll><?=$subsubmenuitem->title?></a>
                                                        <?php } 
                                                    } ?>
                                                </li>
                                                <?php } ?> 
                                            </ul>
                                        </div>
                                <?php } 
                                } else {
                                    foreach ($homepage->children as $menuitem) {
                                        echo '<li><a class="link" href="'.$homepage->url.'#' . $menuitem->name . '">' . $menuitem->title . '</a>';

                                        if (!$menuitem->children("template=successive_layout")->count()) { 
                                            echo '</li>'; 
                                            continue; 
                                        } ?>

                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">

                                            <?php
                                            foreach ($menuitem->children("template!=client, template!=cooperation") as $submenuitem) { 
                                                echo '<li class="uk-nav-header">
                                                    <strong><a class="link" href="'.$homepage->url.'#'.$submenuitem->name.'" uk-scroll>'.$submenuitem->title.'</a></strong>';
                                                    $subsubmenuitems = $submenuitem->children();
                                                    if ($subsubmenuitems->count()) { 
                                                        foreach ($subsubmenuitems as $subsubmenuitem) {
                                                            echo '<a class="link" href="'.$homepage->url.'#'.$subsubmenuitem->name.'" uk-scroll>'.$subsubmenuitem->title.'</a>';
                                                         } 
                                                    }
                                                echo '</li>';
                                                } 
                                            echo '</ul>
                                        </div>';
                                } }
                            echo '</ul> <span class="gray"> | </span> ';
                            echo '<ul class="uk-navbar-nav desktop">';

                            foreach($languages as $language) {
                                $url = $page->localUrl($language); 
                                $hreflang = $homepage->getLanguageValue($language, 'name'); 

                                if(!$page->viewable($language)) continue; // is page viewable in this language?
                                if($language->id == $user->language->id) { ?>
                                    <li>
                                        <a class="uk-active" hreflang="$hreflang" href="<?=$url?>"><?=$language->title?></a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a class="link" hreflang="$hreflang" href="<?=$url?>"><?=$language->title?></a>
                                    </li>
                                <?php }
                            } ?>

                            </ul>
                        </div>
    
                        <a class="link mobile uk-padding-small" style="right: 0; position: absolute;" uk-toggle="target: #offcanvas-flip"><span uk-icon="icon: menu; ratio: 2;"></span></a>
                        <!-- <a class="link mobile uk-padding-small" style="right: 0; position: absolute;" uk-toggle="target: #offcanvas-flip"><i style="font-size: 30px;" class="fas fa-bars"></i></span></a> -->
                    </nav>

                    <div class="mobile" id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
                        <div class="uk-offcanvas-bar">

                            <div class="uk-padding">

                                <h4><?=__("Sprachen");?></h4>

                                <button class="uk-offcanvas-close" type="button" uk-close></button>

                                <ul class="nostyle">

                                <?php 
                                foreach($languages as $language) {
                                    $url = $page->localUrl($language); 
                                    $hreflang = $homepage->getLanguageValue($language, 'name'); 

                                    if(!$page->viewable($language)) continue; // is page viewable in this language?
                                    if($language->id == $user->language->id) { ?>
                                        <li>
                                            <a class="link uk-active" hreflang="$hreflang" href="<?=$url?>"><?=$language->title?></a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a class="link" hreflang="$hreflang" href="<?=$url?>"><?=$language->title?></a>
                                        </li>
                                    <?php }
                                } ?>

                                </ul>

                            </div>
                        </div>
                    </div>


                </div>
                
                <!-- language switcher / navigation -->
                
            </div>

            <main id='main' class="uk-padding">
                <!-- main content -->
                <div id='content'>
                    :D
                </div>

            </main>
        </div>
        </div>

        <?php require '_footer.php'; ?>
    
    </body>    
</html>