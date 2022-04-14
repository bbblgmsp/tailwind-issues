<?php namespace ProcessWire; ?>
	<div id="content" class="bg-emerald-600">

	<?php 

	// $some_page = $pages->get("template=successive_layout");

	// echo '<div id="'.$some_page->name.'" class="section uk-margin-large-bottom">';
	// echo '<h2 class="uk-text-center">'.$some_page->title.'</h2>';
	// echo '<div uk-grid>';

	// echo successiveLayout($some_page, $homepage);
	
	// echo '</div>';
	// echo '</div>';

	// if ($some_page->children->count()) {

	// 	foreach ($some_page->children as $item) {

	// 		echo '<div id="'.$item->name.'" class="section uk-margin-large-bottom">';
	// 		echo '<h3 class="uk-text-center">'.$item->title.'</h3>';
	// 		echo '<div uk-grid>';

	// 		echo successiveLayout($item, $homepage);
			
	// 		echo '</div>';
	// 		echo '</div>';

	// 		if (!$item->children->count()) {continue;}

	// 		foreach ($item->children as $item) {

	// 			echo '<div id="'.$item->name.'" class="section uk-margin-large-bottom">';
	// 			echo '<h4 class="uk-text-center">'.$item->title.'</h4>';
	// 			echo '<div uk-grid>';

	// 			echo successiveLayout($item, $homepage);
				
	// 			echo '</div>';
	// 			echo '</div>';

	// 		}

	// 	}

	// }


	$articles = $pages("template=article");

	foreach ($articles as $article) {

		echo '<div class="bg-emerald-600" style="display: inline-block; padding: 10px;">';
		echo '<a href="'.$article->url.'">';
		echo '<strong>'.$article->title.'</strong>';
		echo '</a>';
		echo '<br />';
		echo '<a href="'.$article->url.'">';
		echo '<img width="400" src="'.$article->images->first->url.'"/>';
		echo '</a>';
		echo '<br />';
		echo '<p>EUR 12,34</p>';
		echo '<br />';
		echo '<button>add to cart</button>';
		echo '</div>';

	}



	?>

	</div>
