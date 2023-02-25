<?php
	get_header();

	$id_page = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;

	$wsg_contato_widget = get_post_meta($id_page, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-01-contato">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-4 wq-box_tl-5">
					<div>
						<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_contato, 'wsg_contato_01_titulo', true ); ?></h2>
						<div class="wq-endereco-contato">
							<h5>
								<span class="flaticon-placeholder-1"></span>
								<?php echo get_post_meta( $id_endereco, 'wsg_endereco', true ) ?>
							</h5>
							<?php
								$entries = get_post_meta( $id_telefones, 'wsg_telefone_items', true );
								foreach ( (array) $entries as $key => $entry ) {

									if ( isset( $entry['wsg_telefone_nmr'] ) ) {
										$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
									}
									if ( isset( $entry['wsg_telefone_link'] ) ) {
										$wsg_telefone_link = $entry['wsg_telefone_link'];
									}
									if ( isset( $entry['wsg_telefone_icone'] ) ) {
										$wsg_telefone_icone = $entry['wsg_telefone_icone'];
									}
							?>
								<h5>
									<?php if ($wsg_telefone_icone == 'phone-1') { ?>
										<span class="flaticon-phone-1"></span>
									<?php } else{ ?>
										<span class="flaticon-whatsapp-1"></span>
									<?php } ?>
									<a href="<?php echo $wsg_telefone_link; ?>"><?php echo $wsg_telefone_nmr; ?></a>
								</h5>
							<?php } ?>
							<?php
								$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
								foreach ( (array) $wsg_emails as $key => $email ) {
							?>
								<h5>
									<span class="flaticon-mail-1"></span>
									<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								</h5>
							<?php } ?>
						</div>
						<ul>
							<?php
								$wsg_contato_01_horario = get_post_meta( $id_page, 'wsg_contato_01_horario', true );
								foreach ( (array) $wsg_contato_01_horario as $key => $horario ) {
							?>
								<li><?php echo $horario; ?></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="wq-box_7 wq-box_cp-12 wq-box_cl-12 wq-box_tp-8 wq-box_tl-7">
					<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_contato, 'wsg_contato_01_titulo_form', true ); ?></h2>
					<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

						<input type="hidden" name="subject_email" value="Enviado pelo site">
						<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página de contato">

						<div class="wq-icones">
							<i class="flaticon-user-1"></i>
							<input type="hidden" name="label-send-data-name" value="Nome">
							<input required type="text" name="send-data-name" placeholder="Seu Nome*">
						</div>
						<div class="wq-icones">
							<i class="flaticon-mail-1"></i>
							<input type="hidden" name="label-send-data-email" value="Email">
							<input required type="email" name="send-data-email" placeholder="Seu E-mail*">
						</div>
						<div class="wq-icones">
							<i class="flaticon-phone-1"></i>
							<input type="hidden" name="label-send-data-phone" value="Telefone">
							<input required type="text" name="send-data-phone" placeholder="Seu Telefone*" class="inputphone">
						</div>
						<div class="wq-icones">
							<i class="flaticon-folder-1"></i>
							<input type="hidden" name="label-send-data-message" value="Mensagem">
							<textarea placeholder="Sua Mensagem*" name="send-data-message" required></textarea>
						</div>

						<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>

						<button class="wq-btn_1" type="submit">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>