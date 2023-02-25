<?php
	function add_theme_caps_adminpanel() {

		// gets the administrator role
		$wsg_super_admin = get_role('wsg_super_admin');
		$wsg_super_admin->add_cap('edit_published_adminpanel_s');
		$wsg_super_admin->add_cap('publish_adminpanel');
		$wsg_super_admin->add_cap('delete_published_adminpanel_s');
		$wsg_super_admin->add_cap('edit_adminpanel');
		$wsg_super_admin->add_cap('delete_adminpanel_s');
		$wsg_super_admin->add_cap('edit_others_adminpanel');
		$wsg_super_admin->add_cap('delete_others_adminpanel_s');
		$wsg_super_admin->add_cap('delete_private_adminpanel_s');
		$wsg_super_admin->add_cap('edit_private_adminpanel_s');
		$wsg_super_admin->add_cap('read_private_adminpanel');

		$wsg_agency = get_role('wsg_agency');
		$wsg_agency->add_cap('edit_published_adminpanel_s');
		$wsg_agency->add_cap('publish_adminpanel');
		$wsg_agency->add_cap('delete_published_adminpanel_s');
		$wsg_agency->add_cap('edit_adminpanel');
		$wsg_agency->add_cap('delete_adminpanel_s');
		$wsg_agency->add_cap('edit_others_adminpanel');
		$wsg_agency->add_cap('delete_others_adminpanel_s');
		$wsg_agency->add_cap('delete_private_adminpanel_s');
		$wsg_agency->add_cap('edit_private_adminpanel_s');
		$wsg_agency->add_cap('read_private_adminpanel');

		// So pode manipular os seus proprios
		// $author = get_role('author');
		// $author->add_cap('edit_published_adminpanel_s');
		// $author->remove_cap('publish_adminpanel');
		// $author->add_cap('delete_published_adminpanel_s');
		// $author->add_cap('edit_adminpanel');
		// $author->add_cap('delete_adminpanel_s');
		// $author->remove_cap('edit_others_adminpanel');
		// $author->remove_cap('delete_others_adminpanel_s');
		// $author->remove_cap('delete_private_adminpanel_s');
		// $author->add_cap('edit_private_adminpanel_s');
		// $author->add_cap('read_private_adminpanel');

	}
	add_action( 'admin_init', 'add_theme_caps_adminpanel');
?>