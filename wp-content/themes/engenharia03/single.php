<?php
	get_header();

	$id_page = get_page_by_path( 'blog', OBJECT, 'page' )->ID;

	$id_disqus = get_page_by_path( 'configuracoes-do-disqus', OBJECT, 'gerais' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<?php
		if (have_posts()) : while (have_posts()) : the_post();
			$attachID = get_post_thumbnail_id(get_the_ID());
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

	<section class="wq-01-blog">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-8 wq-blog_item">
					<div class="wq-blog_conteudo">
						<h2 class="wq-titulo_1"><?php the_title(); ?></h2>
						<figure>
							<?php echo getImageThumb(get_post_thumbnail_id(), '925x500'); ?>
						</figure>
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
						<?php echo wpautop(the_content()); ?>
					</div>
					<div class="wsg-comentarios">
						<?php disqus_embed(get_post_meta( $id_disqus, 'wsg_disqus_code', true )); ?>
					</div>
				</div>
				<?php
					get_sidebar();
				?>
			</div>
		</div>
	</section>

	<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>

	<?php
		$categories = get_the_category(get_the_ID());
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category){
				array_push($category_ids, $individual_category->term_id);
			}
			sort($category_ids);
			$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array(get_the_ID()),
				'posts_per_page'=>3,
			);
			$my_query = new wp_query($args);
			$relacionados = $my_query->get_posts();

			if (count($relacionados) > 0) {
	?>

	<section class="wq-09">
		<div class="wq-container">
			<h2 class="wq-titulo_1">Posts relacionados</h2>
			<div class="wq-09_item">
				<div class="wq-flex">
					<?php
						}
						foreach ($relacionados as $key => $relacionado) {
							setup_postdata($relacionado);
							$attachID = get_post_thumbnail_id($relacionado->ID);
							$author_id=$post->post_author;
							$categories = get_the_terms( $relacionado->ID, 'category' );
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
						<div class="wq-box_4 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-4">
							<figure>
								<?php echo getImageThumb(get_post_thumbnail_id($relacionado->ID), '370x247'); ?>
							</figure>
							<div class="wq-conteudo">
								<h3><a href="<?php echo get_permalink($relacionado->ID); ?>"><?php echo $relacionado->post_title; ?></a></h3>

								<span class="wq-data">
									<?php echo get_the_date('d', $relacionado->ID); ?>/<?php echo get_the_date('m', $relacionado->ID); ?>/<?php echo get_the_date('Y', $relacionado->ID); ?>
								</span>
								<span>
									<?php echo $htmlCategory; ?>
								</span>
								<?php echo wpautop($relacionado->post_excerpt); ?>
								<a href="<?php echo get_permalink($relacionado->ID); ?>" class="wq-btn_2">Ler mais</a>
							</div>
						</div>
					<?php
						} wp_reset_postdata();
						if (count($relacionados) > 0) {
					?>
				</div>
			</div>
		</div>
	</section>

	<?php
			}
		}
	?>

	<?php include 'inc-call_to_action.php'; ?>

<?php get_footer(); ?>