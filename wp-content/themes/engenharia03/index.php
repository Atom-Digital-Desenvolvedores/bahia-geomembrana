<?php
	get_header();

	$id_page = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<section class="wq-banner">
		<div class="wq-banner_carousel">
			<?php
				$entries = get_post_meta( $id_page, 'banner_items', true );

				foreach ( (array) $entries as $key => $entry ) {

					$wsg_banner_items_titulo = null;
					$wsg_banner_items_texto = null;
					$wsg_banner_items_btn_texto = null;

					if ( isset( $entry['wsg_banner_items_img_id'] ) ) {
						$wsg_banner_items_img_id = $entry['wsg_banner_items_img_id'];
					}
					if ( isset( $entry['wsg_banner_items_titulo'] ) ) {
						$wsg_banner_items_titulo = $entry['wsg_banner_items_titulo'];
					}
					if ( isset( $entry['wsg_banner_items_texto'] ) ) {
						$wsg_banner_items_texto = $entry['wsg_banner_items_texto'];
					}
					if ( isset( $entry['wsg_banner_items_btn_link'] ) ) {
						$wsg_banner_items_btn_link = $entry['wsg_banner_items_btn_link'];
					}
					if ( isset( $entry['wsg_banner_items_btn_texto'] ) ) {
						$wsg_banner_items_btn_texto = $entry['wsg_banner_items_btn_texto'];
					}
			?>
				<div class="wq-banner_item">
					<div class="wq-banner-img">
						<figure>
							<?php getImageThumb($wsg_banner_items_img_id,'1920x560') ?>
						</figure>
					</div>
					<div class="wq-container">
						<div class="wq-banner_conteudo">
							<?php if($wsg_banner_items_titulo != null && strlen($wsg_banner_items_titulo) > 0){ ?>
								<h2><?php echo $wsg_banner_items_titulo ?></h2>
							<?php } ?>
							<?php if($wsg_banner_items_texto != null && strlen($wsg_banner_items_texto) > 0){ ?>
								<?php echo wpautop($wsg_banner_items_texto); ?>
							<?php } ?>
							<?php if($wsg_banner_items_btn_texto != null && strlen($wsg_banner_items_btn_texto) > 0){ ?>
								<a class="wq-btn_1" href="<?php echo $wsg_banner_items_btn_link; ?>"><?php echo $wsg_banner_items_btn_texto; ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>

	<section class="wq-conteudo-novo">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-5">
					<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_pos_banner_texto_esq', true ); ?></h2>
				</div>
				<div class="wq-box_7 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-7">
					<p><?php echo get_post_meta( $id_page, 'wsg_pos_banner_texto_dir', true ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-01">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-5">
					<?php
						$wsg_sobre_radio = get_post_meta( $id_page, 'wsg_sobre_radio', true );
						$wsg_sobre_img_link = get_post_meta( $id_page, 'wsg_sobre_img_link', true );
						$wsg_sobre_img_id = get_post_meta( $id_page, 'wsg_sobre_img_id', true );
					?>
					<?php if ($wsg_sobre_radio == 'option1') { ?>
						<figure>
							<?php if (strlen($wsg_sobre_img_link) > 0) { ?>
								<a href="<?php echo $wsg_sobre_img_link; ?>" data-lity>
									<?php
										getImageThumb($wsg_sobre_img_id,'530x415');
									?>
								</a>
							<?php } else{
								getImageThumb($wsg_sobre_img_id,'530x415');
							} ?>
						</figure>
					<?php } elseif ($wsg_sobre_radio == 'option2') { ?>
						<?php echo get_post_meta( $id_page, 'wsg_sobre_iframe', true ); ?>
					<?php } ?>
				</div>
				<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-7">
					<div class="wq-conteudo">
						<div class="wq-titulo_1">
							<h1><?php echo get_post_meta( $id_page, 'wsg_sobre_titulo', true ); ?></h1>
						</div>
						<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_conteudo', true )); ?>
						<a href="<?php bloginfo('url') ?>/sobre" class="wq-btn_1">Saiba mais</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-03 wq-cto">
		<div class="wq-container">
			<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_servicos_titulo', true ); ?></h2>
			<div class="wq-cto descricao-do-servico">
				<?php echo wpautop(get_post_meta( $id_page, 'wsg_servicos_texto', true )); ?>
			</div>
			<div class="wq-conteudo-ful">
				<div class="wq-flex">
					<?php
						$wsg_servicos_na_home = get_post_meta( $id_page, 'wsg_servicos_na_home', true );

						$arrayQueryServicos = array(
							'post_type'				=> array( 'servicos192' ),
							'posts_per_page'		=> '8',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'post__in'				=> $wsg_servicos_na_home
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

	<section class="wq-05">
		<div class="wq-container">
			<div class="wq-flex">
				<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_projetos_titulo', true ); ?></h2>
				<a href="<?php bloginfo('url') ?>/projetos" class="wq-btn_1"> Ver todos projetos</a>
			</div>
		</div>
		<div class="wq-flex">
			<?php
				$wsg_projetos_na_home = get_post_meta( $id_page, 'wsg_projetos_na_home', true );

				$arrayQueryServicos = array(
					'post_type'				=> array( 'projetos192' ),
					'posts_per_page'		=> '3',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post__in'				=> $wsg_projetos_na_home
				);
				$queryServicos = new WP_Query($arrayQueryServicos);
				while ( $queryServicos->have_posts()) {
					$queryServicos->the_post();
			?>
				<div class="wq-box_4f wq-box_cp-12f wq-box_cl-4f wq-box_tp-4f wq-box_tl-4f">
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
			<?php } wp_reset_query(); ?>
		</div>
	</section>

	<section class="wq-07">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_3 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-4">
					<h2 class="wq-titulo_1"><?php echo get_post_meta($id_page, 'wsg_marcas_titulo', true); ?></h2>
					<div class="wq-botoes_para-carousel">
						<a href="javascript:;" onclick="jQuery('.wq-07 .owl-nav .owl-prev').click();"><span class="flaticon-prev"></span></a>
						<a href="javascript:;" onclick="jQuery('.wq-07 .owl-nav .owl-next').click();"><span class="flaticon-next"></span></a>
					</div>
				</div>
				<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-8">
					<div class="wq-07_item">
						<div class="wq-parceiros-carousel">
							<?php
								$entries = get_post_meta( $id_page, 'marcas_items', true );

								$countImgs = 0;

								echo '<div><div class="wq-flex">';

								foreach ( (array) $entries as $key => $entry ) {
									$countImgs++;

									if ( isset( $entry['wsg_marcas_items_img_id'] ) ) {
										$wsg_marcas_items_img_id = $entry['wsg_marcas_items_img_id'];
									}
							?>
								<div class="wq-box_4 wq-box_cp-6 wq-box_cl-6">
									<figure>
										<?php getImageThumb($wsg_marcas_items_img_id,'full') ?>
									</figure>
								</div>
							<?php
									if ($countImgs == 6) {
										echo '
												</div>
											</div>
											<div>
												<div class="wq-flex">'
										;
									}
									if ($countImgs == 12) {
										echo '
												</div>
											</div>
											<div>
												<div class="wq-flex">'
										;
									}
									if ($countImgs == 18) {
										echo '
												</div>
											</div>
											<div>
												<div class="wq-flex">'
										;
									}
									if ($countImgs == 24) {
										echo '
												</div>
											</div>
											<div>
												<div class="wq-flex">'
										;
									}
									if ($countImgs == 30) {
										echo '
												</div>
											</div>
											<div>
												<div class="wq-flex">'
										;
									}
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-06">
		<div class="wq-container">
			<h2 class="wq-titulo_1"><?php echo get_post_meta($id_page, 'wsg_depoimentos_titulo', true); ?></h2>
			<div class="wq-depoimentos_carousel">
				<?php
					$arrayQueryDepoimentos = array(
						'post_type'				=> array( 'depoimentos192' ),
						'posts_per_page'		=> '-1',
						'orderby' => 'menu_order',
						'order' => 'ASC',
					);
					$queryDepoimentos = new WP_Query($arrayQueryDepoimentos);
					while ( $queryDepoimentos->have_posts()) {
						$queryDepoimentos->the_post();
				?>
					<div class="wq-conteudo_ful">
						<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_depoimento_item_conteudo', true )); ?>
						<div class="wq-conteudo">
							<div class="wq-flex">
								<figure>
									<?php
										$wsg_depoimento_item_img_id = get_post_meta( get_the_ID(), 'wsg_depoimento_item_img_id', true );
										getImageThumb($wsg_depoimento_item_img_id,'100x100');
									?>
								</figure>
								<div class="wq-conteudo">
									<h3><?php the_title(); ?></h3>
									<p><?php echo get_post_meta( get_the_ID(), 'wsg_depoimento_item_cargo', true ) ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php } wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<!--<section class="wq-08">
		<div class="wq-container">
			<div class="wq-08_item">
				<div class="wq-flex">
					<div class="wq-box_5 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-12f">
						<div class="wq-08_conteudo">
							<h2 class="wq-titulo_1"><?php echo get_post_meta($id_page, 'wsg_info_2_titulo', true); ?></h2>
							<?php echo wpautop(get_post_meta($id_page, 'wsg_info_2_texto', true)); ?>
						</div>
					</div>
					<div class="wq-box_6 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-12f">
						<div class="wq-08_video">
							<div>
								<?php echo get_post_meta($id_page, 'wsg_info_2_iframe', true); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->

	<section class="wq-09">
		<div class="wq-container">
			<h2 class="wq-titulo_1"><?php echo get_post_meta($id_page, 'wsg_blog_titulo', true); ?></h2>
			<div class="wq-09_item">
				<div class="wq-flex">
					<?php
						$args = array (
							'post_type'         => 'post',
							'posts_per_page'    => 3
						);
						$query = new WP_Query( $args );
						$posts = $query->get_posts();
						foreach ($posts as $key => $item) {
							// setup_postdata($item);
							$categories = get_the_terms( $item->ID, 'category' );
							$htmlCategory = '';
							if ( $categories && ! is_wp_error( $categories ) ){
								$draught_links = array();
								foreach ($categories as $category) {
									$cat_Item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
									array_push($draught_links, $cat_Item);
								}
								$htmlCategory = implode(' | ', $draught_links);
							}
					?>
						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6 wq-box_tl-6">
							<figure>
								<?php echo getImageThumb(get_post_thumbnail_id($item->ID), '387x270'); ?>
							</figure>
							<div class="wq-conteudo">
								<h3 class="wq-titulo_2"><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a></h3>
								<span class="wq-data">
									<?php echo get_the_date('d', $item->ID); ?>/<?php echo get_the_date('m', $item->ID); ?>/<?php echo get_the_date('Y', $item->ID); ?>
								</span>
								<span><?php echo $htmlCategory; ?></span>
								<?php echo wpautop($item->post_excerpt); ?>
								<a href="<?php echo get_permalink($item->ID); ?>" class="wq-basico_link">Ler mais</a>
							</div>
						</div>
					<?php }wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</section>
	
	<?php include "inc-call_to_action.php"; ?>
<?php get_footer(); ?>