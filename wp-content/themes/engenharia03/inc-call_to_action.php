<?php $id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID; ?>
	<?php
		$wsg_call_to_action_img_id = get_post_meta($id_home, 'wsg_call_to_action_img_id', true);
		$wsg_call_to_action_img_id = wp_get_attachment_image_src($wsg_call_to_action_img_id, '1920x500');
		$wsg_call_to_action_img_id = $wsg_call_to_action_img_id[0];
	?>
	<section class="wq-04" style="background-image: url(<?php echo $wsg_call_to_action_img_id; ?>);">
		<div class="wq-container">
			<div class="wq-04_item">
				<h3><?php echo get_post_meta($id_home, 'wsg_call_to_action_texto', true); ?></h3>
				<a href="<?php echo get_post_meta($id_home, 'wsg_call_to_action_btn_link', true); ?>" class="wq-btn_1"><?php echo get_post_meta($id_home, 'wsg_call_to_action_btn_texto', true); ?></a>
			</div>
		</div>
	</section>