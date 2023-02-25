<?php
	get_header();

	$id_page = get_page_by_path( 'sobre', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-01">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_6 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-6">
					<?php
						$wsg_sobre_01_radio = get_post_meta( $id_page, 'wsg_sobre_01_radio', true );
						$wsg_sobre_01_img_link = get_post_meta( $id_page, 'wsg_sobre_01_img_link', true );
						$wsg_sobre_01_img_id = get_post_meta( $id_page, 'wsg_sobre_01_img_id', true );
					?>
					<?php if ($wsg_sobre_01_radio == 'option1') { ?>
						<figure>
							<?php if (strlen($wsg_sobre_01_img_link) > 0) { ?>
								<a href="<?php echo $wsg_sobre_01_img_link; ?>" data-lity>
									<?php
										getImageThumb($wsg_sobre_01_img_id,'530x415');
									?>
								</a>
							<?php } else{
								getImageThumb($wsg_sobre_01_img_id,'530x415');
							} ?>
						</figure>
					<?php } elseif ($wsg_sobre_01_radio == 'option2') { ?>
						<?php echo get_post_meta( $id_page, 'wsg_sobre_01_iframe', true ); ?>
					<?php } ?>
				</div>
				<div class="wq-box_6 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-6">
					<div class="wq-conteudo">
						<div class="wq-titulo_1">
							<h2><?php echo get_post_meta( $id_page, 'wsg_sobre_01_titulo', true ); ?></h2>
						</div>
						<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_01_conteudo', true )); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-02-empresa wq-cto">
		<div class="wq-container">
			<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_sobre_02_titulo', true ); ?></h2>
			<div class="wq-flex">
				<?php
					$entries = get_post_meta( $id_page, 'sobre_02_items', true );
					$position = 0;

					foreach ( (array) $entries as $key => $entry ) {

						$position++;

						if ( isset( $entry['wsg_sobre_02_items_img_id'] ) ) {
							$wsg_sobre_02_items_img_id = $entry['wsg_sobre_02_items_img_id'];
						}
						if ( isset( $entry['wsg_sobre_02_items_titulo'] ) ) {
							$wsg_sobre_02_items_titulo = $entry['wsg_sobre_02_items_titulo'];
						}
						if ( isset( $entry['wsg_sobre_02_items_texto'] ) ) {
							$wsg_sobre_02_items_texto = $entry['wsg_sobre_02_items_texto'];
						}
				?>
					<div class="wq-box_4 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-4">
						<div class="wq-icon">
							<?php getImageThumb($wsg_sobre_02_items_img_id,'64x64') ?>
						</div>
						<div class="wq-conteudo">
							<h3><?php echo $wsg_sobre_02_items_titulo; ?></h3>
							<?php echo wpautop($wsg_sobre_02_items_texto); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!--<section class="wq-04-empresa">
		<div class="wq-container">
			<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_sobre_03_titulo', true ); ?></h2>
			<div class="wq-flex">
				<?php
					$arrayQueryEquipe = array(
						'post_type'				=> array( 'equipe192' ),
						'posts_per_page'		=> '-1',
						'orderby' => 'menu_order',
						'order' => 'ASC',
					);
					$queryEquipe = new WP_Query($arrayQueryEquipe);
					while ( $queryEquipe->have_posts()) {
						$queryEquipe->the_post();
				?>
					<div class="wq-box_3 wq-box_cp-12f wq-box_cl-12f wq-box_tp-6 wq-box_tl-3">
						<figure>
							<?php
								$wsg_equipe_item_img_id = get_post_meta( get_the_ID(), 'wsg_equipe_item_img_id', true );
								getImageThumb($wsg_equipe_item_img_id,'300x300');
							?>
						</figure>
						<div class="wq-conteudo">
							<h3><?php the_title(); ?></h3>
							<span><?php echo get_post_meta( get_the_ID(), 'wsg_equipe_item_cargo', true ); ?></span>
							<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_equipe_item_resumo', true )); ?>
							<ul class="wq-lista-inline">
								<?php
									$entries = get_post_meta( get_the_ID(), 'equipe_redes_sociais', true );

									foreach ( (array) $entries as $key => $entry ) {

										if ( isset( $entry['wsg_equipe_redes_sociais_icone'] ) ) {
											$wsg_equipe_redes_sociais_icone = $entry['wsg_equipe_redes_sociais_icone'];
										}
										if ( isset( $entry['wsg_equipe_redes_sociais_link'] ) ) {
											$wsg_equipe_redes_sociais_link = $entry['wsg_equipe_redes_sociais_link'];
										}
								?>
									<li><a href="<?php echo $wsg_equipe_redes_sociais_link; ?>" target="_blank" class="flaticon-<?php echo $wsg_equipe_redes_sociais_icone; ?>"></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>-->

<?php get_footer(); ?>