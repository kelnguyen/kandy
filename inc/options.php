<?php
	
function kn_add_submenu() {
		add_submenu_page( 'themes.php', 'Kandy Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'kn_add_submenu' );
	

function kn_settings_init() { 
	register_setting( 'theme_options', 'kn_options_settings' );
	
	add_settings_section(
		'kn_options_page_section', 
		'Your section description', 
		'kn_options_page_section_callback', 
		'theme_options'
	);
	
	function kn_options_page_section_callback() { 
		echo 'A description and detail about the section.';
	}

	add_settings_field( 
		'kn_text_field', 
		'Enter your text', 
		'kn_text_field_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

	add_settings_field( 
		'kn_checkbox_field', 
		'Check your preference', 
		'kn_checkbox_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);

	add_settings_field( 
		'kn_radio_field', 
		'Choose an option', 
		'kn_radio_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);
	
	add_settings_field( 
		'kn_textarea_field', 
		'Enter content in the textarea', 
		'kn_textarea_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);
	
	add_settings_field( 
		'kn_select_field', 
		'Select from the dropdown', 
		'kn_select_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);

	function kn_text_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="text" name="kn_options_settings[kn_text_field]" value="<?php if (isset($options['kn_text_field'])) echo $options['kn_text_field']; ?>" />
		<?php
	}
	
	function kn_checkbox_field_render() { 
		$options = get_option( 'kn_options_settings' );
	?>
		<input type="checkbox" name="kn_options_settings[kn_checkbox_field]" <?php if (isset($options['kn_checkbox_field'])) checked( 'on', ($options['kn_checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label> 
		<?php	
	}
	
	function kn_radio_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="radio" name="kn_options_settings[kn_radio_field]" <?php if (isset($options['kn_radio_field'])) checked( $options['kn_radio_field'], 1 ); ?> value="1" /> <label>Option One</label><br />
		<input type="radio" name="kn_options_settings[kn_radio_field]" <?php if (isset($options['kn_radio_field'])) checked( $options['kn_radio_field'], 2 ); ?> value="2" /> <label>Option Two</label><br />
		<input type="radio" name="kn_options_settings[kn_radio_field]" <?php if (isset($options['kn_radio_field'])) checked( $options['kn_radio_field'], 3 ); ?> value="3" /> <label>Option Three</label>
		<?php
	}
	
	function kn_textarea_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<textarea cols="40" rows="5" name="kn_options_settings[kn_textarea_field]"><?php if (isset($options['kn_textarea_field'])) echo $options['kn_textarea_field']; ?></textarea>
		<?php
	}

	function kn_select_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<select name="kn_options_settings[kn_select_field]">
			<option value="1" <?php if (isset($options['kn_select_field'])) selected( $options['kn_select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['kn_select_field'])) selected( $options['kn_select_field'], 2 ); ?>>Option 2</option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Kandy Options Page</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'kn_settings_init' );