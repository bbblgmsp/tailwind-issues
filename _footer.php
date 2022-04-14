<?php

$contact = $pages->get("/contact/");

echo '<div id="'.$contact->name.'">';

echo '<div id="footerwallpaper" class="uk-background-cover uk-light uk-flex uk-width-full" uk-parallax="bgy: 250" style="background: green;"><div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical"><div class="ckeditor">'.$contact->body.'</div></div>
</div>';

echo '</div>';

	echo '<ul>';

	foreach ($homepage->children("allocation=2") as $menuitem) {
	    echo '<li><a class="link" href="#' . $menuitem->name . '" uk-scroll>' . $menuitem->title . '</a></li>';
	}

	echo '</ul>';

echo '</div>';


?>