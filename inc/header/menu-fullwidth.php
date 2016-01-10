<?php



/*
Эта функция вызывается если меню для темы не установлено и вместо меню выводит просто список страниц.
Как правило это бывает в момент активации новой темы и там всего одна страница: Пример страницы
*/
function wpbss_main_menu_fallback() {

	global $post;

	$args = array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'hierarchical' => 0,
	);
	$pages = get_pages($args);
//var_dump($pages);
	?>
	<ul class="nav navbar-nav">
		<?php foreach($pages as $post): setup_postdata($post); ?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a>
			</li>
		<?php endforeach; wp_reset_postdata(); ?>
	</ul>
<?php
}
