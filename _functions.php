<?php namespace ProcessWire; 

function successiveLayout($item, $homepage) {

	$out = '';

	foreach ($item->successive_grid as $slg) {

		$type = $slg->type;

		if ($type == 'eintel') {$class = 'uk-width-1-1@l';}
		elseif ($type == 'zweitel') {$class = 'uk-width-1-2@l uk-width-1-1@m';}
		elseif ($type == 'drittel') {$class = 'uk-width-1-3@l uk-width-1-2@m uk-width-1-1@s';}
		elseif ($type == 'viertel') {$class = 'uk-width-1-4@m uk-width-1-1@s';}
		elseif ($type == 'dreiviertel') {$class = 'uk-width-3-4@m uk-width-1-1@s';}
		elseif ($type == 'zweidrittel') {$class = 'uk-width-2-3@m uk-width-2-3@s';} 
		else {$class = '';}

		$out .= '<div class="'.$class.'">';

		foreach ($slg->grid_element as $slge) {

			if ($slge->type == 'GE_image') {

				$out .= '<div class="GE_image">';
				
				foreach ($slge->images as $slgei) {
						$out .= '<img src="'.$slgei->url.'"/>';
				}

				$out .= '</div>';

			}
			
			if ($slge->type == 'GE_slogan') {
				echo '
					<div class="uk-width-1-1"><div class="uk-height-medium uk-background-cover uk-light uk-flex uk-margin-auto" uk-parallax="bgy: 200" style="background-image: url('.$homepage->background->first->url.');">
					    <p class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical slogan">'.$slge->slogan.'</p>
					</div></div>';
			}

			if ($slge->type == 'GE_text') {
				$out .= $slge->headline;
			}

			if ($slge->type == 'GE_body') {
				$out .= '<div class="ckeditor">'.$slge->body.'</div>';
			}

			if ($slge->type == 'GE_accordion') {

				$out .= '<ul uk-accordion>';

				foreach ($slge->accordion as $slgea) { 
				    $out .= '
				    	<li>
							<a class="greenbold uk-accordion-title">'.$slgea->title.'</a>
							<div class="uk-accordion-content">'.$slgea->body.'</div>
						</li>';
				}

				
				$out .= '</ul>';

			}

		}
		
		$out .= '</div>';

	}

	return($out);

}


function clientsLayout($client) {

    $out = '
	    <li class="uk-width-1-1">
	        <div class="uk-card uk-card-default">
	            <div class="uk-card-body">
	                <h4 class="uk-card-title">'.$client->title.'</h4>
	                <strong>'.$client->headline.'</strong>
	                <div class="ckeditor"><br/><i class="fas fa-quote-left"></i>'.$client->body.'<i class="fas fa-quote-right"></i></div>
	            </div>
	        </div>
	    </li>';

	return $out;

}




function cooperationLayout($cooperation) { 

	$out = '<div class="uk-width-1-5@m uk-width-1-1@s GE_image">';
	$out .= '<a target="_blank" href="'.$cooperation->website.'"><img src="'.$cooperation->images->first->width(200)->url.'"/></a>';
	$out .= '</div>';
	$out .= '<div class="uk-width-4-5">';
	$out .= '<h4>'.$cooperation->title.'</h4>';
	$out .= $cooperation->body;
	$out .= '<a class="link" target="_blank" href="'.$cooperation->website.'">'.nicer($cooperation->website).'</a>';
	$out .= '</div>';

	return $out;

}


// function newsLayoutSelfMade($article) {
// 	$out = '	    
// 		<div>
// 	        <div class="uk-tile uk-tile-default">
// 	            <div class="uk-tile-media-top">
// 	                <a href="'.$article->url.'">
// 	                	<img src="'.$article->images->first->url.'" alt="">
// 	                </a>
// 	            </div>
// 	            <div class="uk-card-body">
// 	                <h3 class="uk-card-title"><a class="green" href="'.$article->url.'">'.$article->title.'</a></h3>
// 					<u>'.$article->date.'</u>
// 	                <p>'.$article->headline.'</p>
// 			    <strong><a class="green" href="'.$article->url.'">'.__('weiterlesen…').'</a></strong>
// 	            </div>
// 	        </div>
// 	    </div>';

// 	return $out;

// }


function newsLayout($article) {
	$out = '	    
        <li>
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
					<a href="'.$article->url.'">';

					if ($article->vimeo_id != '' || $article->youtube_id) : 
						
						if ($article->vimeo_id != '') : 

							$thumb_URL = grab_vimeo_thumbnail($article->vimeo_id);
					        if ($thumb_URL == true) : 

					        $out .= '<a href="'.$article->url.'">
						                	<img src="'.$thumb_URL.'"/>
						                </a>';

						    endif;

						elseif ($article->youtube_id != '') : 

							$thumb_URL = "http://img.youtube.com/vi/".$article->youtube_id."/0.jpg";

					        $out .= '<a href="'.$article->url.'">
						            		<img src="'.$thumb_URL.'"/>
										</a>';

						endif; 

					else :

						$out .= '<a href="'.$article->url.'"><img src="'.$article->images->first->url.'"/></a>';

					endif; 


				$out .=

                   '</a>
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">'.$article->title.'</h3>
					<span class="date">'.$article->date.'</span>
	                <p>'.$article->headline.'</p>
				    <strong><a class="link" href="'.$article->url.'">'.__('weiterlesen…').'</a></strong>
                </div>
            </div>
        </li>';

	return $out;

}


function nicer($items) {
    
    $nicer = str_replace("https://", "", $items);
    $nicer = str_replace("http://", "", $nicer);
    $nicer = strtolower($nicer);
    $nicer = rtrim($nicer, '/');
    
    return $nicer;
    
}

?>

