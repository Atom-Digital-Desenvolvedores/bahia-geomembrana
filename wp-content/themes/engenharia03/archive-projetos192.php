<?php
	get_header();

	$id_page = get_page_by_path( 'projetos', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<div class="wq-porojetos-listagem wq-05">
		<div class="wq-container">
			<div class="wq-galeria">
				<ul class="wq-galeria_btns wq-lista-inline">
					<li><a href="javascript:void(0)" class="wq-galeria_btn-todos" data-galeria="todos">Todos</a></li>
					<?php

						$terms = get_terms('projetos_categorias');
						foreach ($terms as $term) {
					?>
						<li><a href="javascript:void(0)" class="wq-galeria_btn" data-galeria="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a></li>
					<?php } ?>
				</ul>
				<div class="wq-galeria_items wq-flex">
					<?php

						$arrayQueryServicos = array(
							'post_type'				=> array( 'projetos192' ),
							'posts_per_page'		=> '-1',
							'orderby' => 'menu_order',
							'order' => 'ASC',
						);
						$queryServicos = new WP_Query($arrayQueryServicos);
						while ( $queryServicos->have_posts()) {
							$queryServicos->the_post();

							$terms = get_the_terms( get_the_ID() , 'projetos_categorias' );

							if ( $terms != null ){
								foreach( $terms as $term ) {
					?>
						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6 wq-box_tl-4 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6 wq-box_tl-4 wq-galeria_item" data-galeria="<?php echo $term->term_id; ?>">
							<a href="<?php the_permalink(); ?>">
								<figure>
									<?php
										$wsg_projeto_item_icone_id = get_post_meta( get_the_ID(), 'wsg_projeto_item_icone_id', true );
										getImageThumb($wsg_projeto_item_icone_id,'500x300');
									?>
									<figcaption>
										<h3><?php the_title(); ?></h3>
									</figcaption>
								</figure>
							</a>
						</div>
					<?php } } } wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Aqui irá o conteudo -->

	<?php include "inc-call_to_action.php"; ?>

<?php get_footer(); ?>