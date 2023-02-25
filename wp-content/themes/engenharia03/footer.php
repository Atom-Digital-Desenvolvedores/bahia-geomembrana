<?php
	$id_sobre = get_page_by_path( 'sobre', OBJECT, 'page' )->ID;
	$id_admin = get_page_by_path( 'slug-outras-info', OBJECT, 'adminpanel' )->ID;

	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
?>

	<footer class="wq-footer">
		<div class="wq-subfooter">
			<div class="wq-container">
				<div class="wq-flex">
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6 wq-box_tl-6">
						<h4>Endereço</h4>
						<ul class="wq-contato">
							<li>
								<span class="flaticon-placeholder-1"></span>
								<?php echo get_post_meta( $id_endereco, 'wsg_endereco', true ) ?>
							</li>
						</ul>
					</div>
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6 wq-box_tl-6">
						<h4>Contatos</h4>
						<ul class="wq-contato">
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
								<li>
									<span class="flaticon-<?php echo $wsg_telefone_icone; ?>"></span>
									<a href="<?php echo $wsg_telefone_link; ?>"><?php echo $wsg_telefone_nmr; ?></a>
								</li>
							<?php } ?>
							<?php
								$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
								foreach ( (array) $wsg_emails as $key => $email ) {
							?>
								<li>
									<span class="flaticon-mail-1"></span>
									<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								</li>
							<?php
								}
							?>
						</ul>
					</div>
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6 wq-box_tl-6">
						<h4>Siga-nos</h4>
						<ul class="wq-lista-inline wq-midias-sociais wq-midias-footer">
							<?php
								$arrayQuery_Midias_Sociais = array(
									'post_type'			=> array( 'redes_sociais' ),
									'posts_per_page'	=> '-1',
									'orderby' 			=> 'menu_order',
									'order' 			=> 'ASC',
								);

								$query_Midias_Sociais = new WP_Query($arrayQuery_Midias_Sociais);

								while ( $query_Midias_Sociais->have_posts()) {
									$query_Midias_Sociais->the_post();
							?>
								<li><a href="<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_link', true ); ?>" target="_blank" class="flaticon-<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_titulo', true); ?>"></a></li>
							<?php
								}
								wp_reset_query();
							?>
						</ul>
					</div>
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6 wq-box_tl-6">
						<h4>Menu</h4>
						<ul class="wq-menu-footer">
							<?php
								$menu_name = 'header-menu';
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$primaryNav = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

								$activeclass = '';
								$count = 0;
								$submenu = FALSE;
								foreach ( $primaryNav as $navItem ) {
									$activeclass = '';
									if($navItem->object_id == $getid){
										$activeclass = 'class="live-act"';
									}
									if (!$navItem->menu_item_parent ){
										$parent_id = $navItem->ID;
										echo '<li><a href="'.$navItem->url.'" '.$activeclass.'   title="'.$navItem->title.'">'.$navItem->title.'</a>';
									}
									if ( $parent_id == $navItem->menu_item_parent ) {
										if ( !$submenu ): $submenu = true;
											echo "

												<ul class=\"wq-dropdown\">";
										endif;
							?>
								<li>
									<a href="<?php echo $navItem->url; ?>" class="title"><?php echo $navItem->title; ?></a>
								</li>
							<?php
										if ( $primaryNav[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
											echo "</ul>";
											$submenu = false;
										}
									}
									if ( $primaryNav[ $count + 1 ]->menu_item_parent != $parent_id ){
										echo "</li>";
										$submenu = false;
									}
									$count++;
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="wq-copyright">
			<div class="wq-container">
				<div class="wq-flex">
					<?php echo wpautop(get_post_meta( $id_sobre, 'wsg_sobre_footer_copyright', true )); ?>
					<?php echo wpautop(get_post_meta( $id_admin, 'agency_setting_footer_site_content', true )); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'script_analytics', true );
	?>

	<script src="<?php bloginfo('template_url') ?>/js-template/footer-load.js"></script>

	<?php wp_footer(); ?>

</body>
</html>