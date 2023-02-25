<?php
	get_header();

	$id_page = get_page_by_path( 'blog', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-01-blog">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12 wq-box_tp-7 wq-box_tl-7 wq-blog_item">
					<?php
						global $query_string;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$query_args = explode("&", $query_string);
						// essa variavel não deve ser reuniciada
						$search_query = array();
						foreach($query_args as $key => $string) {
							$query_split = explode("=", $string);
							$search_query[$query_split[0]] = urldecode($query_split[1]);
						}
						$search_query['post_type'] = array('post');
						$search_query['posts_per_page'] = 5;
						$search_query['paged'] = $paged;

						$query = new WP_Query( $search_query );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								$attachID = get_post_thumbnail_id( get_the_ID() );

								$categories = get_the_terms( get_the_ID(), 'category' );
								$htmlCategory = '';
								if ( $categories && ! is_wp_error( $categories ) ){
									$draught_links = array();
									foreach ($categories as $category) {
										$item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
										array_push($draught_links, $item);
									}
									$htmlCategory = implode(' | ', $draught_links);
								}
					?>
						<div class="wq-blog_conteudo">
							<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
							<a href="<?php echo get_permalink(); ?>">
								<figure>
									<?php echo getImageThumb(get_post_thumbnail_id(), '925x500'); ?>
								</figure>
							</a>
							<div class="wq-flex">
								<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12 wq-box_tp-10 wq-box_tl-10">
									<ul class="wq-lista-inline">
										<li>
											<span class="flaticon-calendar-1"></span>
											<?php echo get_the_date('d', $item->ID); ?>/<?php echo get_the_date('m', $item->ID); ?>/<?php echo get_the_date('Y', $item->ID); ?>
										</li>
										<li>
											<span class="flaticon-folder-1"></span>
											<?php echo $htmlCategory; ?>
										</li>
									</ul>
								</div>
							</div>
							<?php echo wpautop(the_excerpt()); ?>
							<a href="<?php echo get_permalink(); ?>" class="wq-btn_1">Saiba mais</a>
						</div>
					<?php } } wp_reset_query(); ?>
					<?php
						if (function_exists("pagination")) {
							pagination($query);
						}
					?>
				</div>
				<?php
					get_sidebar();
				?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>