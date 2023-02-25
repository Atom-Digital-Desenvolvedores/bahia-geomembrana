<?php
	get_header();

	$id_page = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-03 wq-cto">
		<div class="wq-container">
			<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_servicos_01_titulo', true ); ?></h2>
			<div class="wq-cto descricao-do-servico">
				<?php echo wpautop(get_post_meta( $id_page, 'wsg_servicos_01_texto', true )); ?>
			</div>
			<div class="wq-conteudo-ful">
				<div class="wq-flex">
					<?php
						$arrayQueryServicos = array(
							'post_type'				=> array( 'servicos192' ),
							'posts_per_page'		=> '-1',
							'orderby' => 'menu_order',
							'order' => 'ASC',
						);
						$queryServicos = new WP_Query($arrayQueryServicos);
						while ( $queryServicos->have_posts()) {
							$queryServicos->the_post();
					?>
						<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6 wq-box_tl-4">
							<a href="<?php the_permalink(); ?>">
								<div class="wq-conteudo">
									<span>
										<?php
											$wsg_servico_item_icone_id = get_post_meta( get_the_ID(), 'wsg_servico_item_icone_id', true );
											getImageThumb($wsg_servico_item_icone_id,'64x64');
										?>
									</span>
									<h3><?php the_title(); ?></h3>
								</div>
							</a>
						</div>
					<?php } wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</section>

	<?php include "inc-call_to_action.php"; ?>

<?php get_footer(); ?>