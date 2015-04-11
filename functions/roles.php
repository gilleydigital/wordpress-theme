<?php
	add_action('switch_theme', 'customize_roles');

	function customize_roles () {
		// Remove mid-level roles
		remove_role( 'author' );
		remove_role( 'contributor' );

		// Editor
	    $editor = get_role( 'editor' );

		$editor->remove_cap( 'list_users' );
	    $editor->remove_cap( 'edit_users' );
	    $editor->remove_cap( 'delete_users' );
	    $editor->remove_cap( 'create_users' );
		$editor->remove_cap( 'remove_users' );
		$editor->remove_cap( 'promote_users' );

		$editor->add_cap( 'edit_theme_options' );
		$editor->add_cap('gravityforms_view_entries');
		$editor->add_cap('gravityforms_view_entry_notes');
	}
?>