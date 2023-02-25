<?php
	get_header();

	$id_page = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;
	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-servicos-interna_01">
		<div class="wq-container">
			<div class="wq-servicos-item">
				<div class="wq-item-titulo">
					<figure>
						<?php
							$wsg_servico_item_icone_id = get_post_meta( get_the_ID(), 'wsg_servico_item_icone_id', true );
							getImageThumb($wsg_servico_item_icone_id,'64x64');
						?>
					</figure>
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="wq-conteudo">
					<div class="wq-flex">
						<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-5">
							<div class="wq-projetos-carousel">
								<?php
									$wsg_servico_item_img = get_post_meta( get_the_ID(), 'wsg_servico_item_img', true );

									foreach ( (array) $wsg_servico_item_img as $attachment_id => $attachment_url ) {
								?>
									<figure>
										<?php
											getImageThumb($attachment_id,'576x430');
										?>
									</figure>
								<?php } ?>
							</div>
						</div>
						<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-7">
							<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_servico_interna_conteudo', true )) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-servicos-interna_02 wq-cto">
		<div class="wq-container">
			<h2 class="wq-titulo_1">Outros serviços</h2>
			<div class="wq-conteudo-ful">
				<div class="wq-flex">
					<?php
						$arrayQueryServicos = array(
							'post_type'				=> array( 'servicos192' ),
							'posts_per_page'		=> '4',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'post__not_in'			=> array(
								get_the_ID()
							),
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

	<section class="wq-form-de-captura">
		<div class="wq-container">
			<div class="wq-formulario_servicos">
				<h2 class="wq-titulo_1">Faça seu orçamento</h2>
				<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

					<input type="hidden" name="subject_email" value="Enviado pelo site">
					<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

					<div class="wq-flex">
						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-4 wq-box_tl-4">
							<div class="wq-icones">
								<span class="flaticon-user-1"></span>
								<input type="hidden" name="label-send-data-name" value="Nome">
								<input required type="text" name="send-data-name" placeholder="Seu Nome*">
							</div>
						</div>

						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-4 wq-box_tl-4">
							<div class="wq-icones">
								<span class="flaticon-mail-1"></span>
								<input type="hidden" name="label-send-data-email" value="Email">
								<input required type="email" name="send-data-email" placeholder="Seu E-mail*">
							</div>
						</div>
						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-4 wq-box_tl-4">
							<div class="wq-icones">
								<span class="flaticon-phone-1"></span>
								<input type="hidden" name="label-send-data-phone" value="Telefone">
								<input required type="text" name="send-data-phone" placeholder="Seu Telefone*" class="inputphone">
							</div>
						</div>
						<div class="wq-box_12">
							<input type="hidden" name="label-send-data-message" value="Telefone">
							<textarea name="send-data-message" placeholder="Deixe-nos uma mensagem." required></textarea>
						</div>
					</div>

					<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>

					<button class="wq-btn_1 wq-btn_estilo-2" type="submit">Enviar Contato</button>
				</form>
			</div>
		</div>
	</section>

	<?php include 'inc-call_to_action.php'; ?>

<?php get_footer(); ?>