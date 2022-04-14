<?php namespace ProcessWire; ?>

<style type="text/css">
	
.videoWrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  height: 0;
}
.videoWrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;	
}

</style>

<div id="content">

<?php
	echo '<div>';
	echo '<h2>'.$page->title.'</h2>'; 
?>

	<div class="uk-margin-large">

		<p class="gray"><?=$page->post_date?></p>

		<?php if ($page->images->count) : ?>

		<div class="uk-margin uk-grid-small" uk-grid uk-lightbox="animation: slide">
			<?php foreach ($page->images as $image) : ?>
				<a href="<?=$image->url?>"><img class="uk-responsive-height uk-responsive-width" src="<?=$image->height(350)->url?>" title="<?=$image->title?>" alt="<?=$image->title?>" uk-img/></a>
			<?php endforeach ?>
		</div>

		<?php endif ?> 

		<?php if ($page->vimeo_id != '') : ?>
	 
		<h2>Video</h2>
		<div class="videoWrapper uk-margin">
	        <iframe 
	            src=" "
	            data-src="https://player.vimeo.com/video/<?=$page->vimeo_id?>"
	            data-category="external_media"
	            data-ask-consent="1" 
				width="560" 
				height="349"
	            frameborder="0" 
	            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
	            allowfullscreen>
	        </iframe>
		</div>

		<?php endif; ?>

		<?php if ($page->youtube_id != '') : ?>

		<h2>Video</h2>
		<div class="videoWrapper uk-margin">
			<iframe 
				src=" "
				data-src="https://www.youtube.com/embed/<?=$page->youtube_id?>"
				data-category="external_media"
				data-ask-consent="1" 
				width="560" 
				height="349"
				frameborder="0" 
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
				allowfullscreen>
			</iframe>
		</div>

		<?php endif; ?>

		<div class="uk-margin">

		<?php
		if ($page->source_url) :
			$source_url = $page->source_url;
			if ($page->source_title) : $source_title = $page->source_title; else : $source_title = trimmedUrl($source_url); endif;
			echo '<strong>' . _x('Quelle', 'news') . ': </strong>';
			echo '<a href="'.$source_url.'" target="_blank"';
			echo 'title="'.$source_title.'" alt="'.$source_title.'">';
			echo $source_title;
			echo '</a>';
		endif; ?>

		</div>

	</div>

	<?php
		echo '<br/>';
		echo '<span class="date">'.$page->date.'</span>';
		echo '<br/>';
		echo '<br/>';
		echo $page->headline;
		echo '<br/>';
		echo $page->body;
		echo '<br/>';
		echo '</div>';
	?>

</div>
