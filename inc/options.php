<?php
	
function kn_add_submenu() {
		add_submenu_page( 'themes.php', 'Kandy Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'kn_add_submenu' );
	

function kn_settings_init() { 
	register_setting( 'theme_options', 'kn_options_settings' );
	
	add_settings_section(
		'kn_options_page_section', 
		'Description', 
		'kn_options_page_section_callback', 
		'theme_options'
	);
	
	function kn_options_page_section_callback() { 
		echo 'Welcome to the Kandy Theme Options Page. I have created various theme options listed below.';
	}

	add_settings_field( 
		'kn_text_field', 
		'Leave a message on the Contact Page', 
		'kn_text_field_render', 
		'theme_options', 
		'kn_options_page_section' 
	);

/*    
	add_settings_field( 
		'kn_checkbox_field', 
		'Select your preference', 
		'kn_checkbox_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);
*/    

	add_settings_field( 
		'kn_radio_field', 
		'Select a caption to appear on the Contact Page', 
		'kn_radio_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);

/*    
	add_settings_field( 
		'kn_textarea_field', 
		'Enter content here', 
		'kn_textarea_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);
*/
	
	add_settings_field( 
		'kn_select_field', 
		'Select from the dropdown to choose a colour to change the background of the content area on the Home Page', 
		'kn_select_field_render', 
		'theme_options', 
		'kn_options_page_section'  
	);
 
       
    add_settings_field( 
		'kn_select_field2', 
		'Select from the dropdown to change the font style of the content area on the Home Page', 
		'kn_select_field_render2', 
		'theme_options', 
		'kn_options_page_section'  
	);    

      add_settings_field( 
		'kn_select_field3', 
		'Select from the dropdown to change the font size of the content area on the Home Page', 
		'kn_select_field_render3', 
		'theme_options', 
		'kn_options_page_section'  
	);    

// Gives the option to leave a message on the Contact Page
    
	function kn_text_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="text" name="kn_options_settings[kn_text_field]" value="<?php if (isset($options['kn_text_field'])) echo $options['kn_text_field']; ?>" />
		<?php
	}

/*    
	function kn_checkbox_field_render() { 
		$options = get_option( 'kn_options_settings' );
	?>
		<input type="checkbox" name="kn_options_settings[kn_checkbox_field]" <?php if (isset($options['kn_checkbox_field'])) checked( 'on', ($options['kn_checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label> 
		<?php	
	}
*/

// Gives the option to select one of three captions to be displayed on the Contact Page    
	
	function kn_radio_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<input type="radio" name="kn_options_settings[kn_radio_field]" <?php if (isset($options['kn_radio_field'])) checked( $options['kn_radio_field'], 1 ); ?> value="<h2>Thanks for visiting my portfolio site!</h2>" /> <label>Caption One: "Thanks for visiting my portfolio site!"</label><br />

		<input type="radio" name="kn_options_settings[kn_radio_field]" <?php if (isset($options['kn_radio_field'])) checked( $options['kn_radio_field'], 2 ); ?> value="<h2>Check out my photography pages!</h2>" /> <label>Caption Two: "Check out my photography pages!"</label><br />

		<input type="radio" name="kn_options_settings[kn_radio_field]" <?php if (isset($options['kn_radio_field'])) checked( $options['kn_radio_field'], 3 ); ?> value="<h2>Connect with me on social media!</h2>" /> <label>Caption Three: "Connect with me on social media!"</label>
		<?php
	}

/*    
    
	function kn_textarea_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<textarea cols="40" rows="5" name="kn_options_settings[kn_textarea_field]"><?php if (isset($options['kn_textarea_field'])) echo $options['kn_textarea_field']; ?></textarea>
		<?php
	}
*/

// Gives the option to change the background colour of the content area    

	function kn_select_field_render() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<select name="kn_options_settings[kn_select_field]">
			<option value="#9AE5E6" <?php if (isset($options['kn_select_field'])) selected( $options['kn_select_field'], 1 ); ?>>Colour 1: Non-Photo Blue</option>
            
            
			<option value="#EDC79B" <?php if (isset($options['kn_select_field'])) selected( $options['kn_select_field'], 2 ); ?>>Colour 2: Desert Sand</option> 
  
                    
            <option value="#CA6680" <?php if (isset($options['kn_select_field'])) selected( $options['kn_select_field'], 3 ); ?>>Colour 3: Cinnamon Satin</option>
		</select>
	<?php
	}

// Gives the option to change the font style of the text in the content area on the Home Page   
    
    function kn_select_field_render2() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<select name="kn_options_settings[kn_select_field2]">
			<option value="'Shadows Into Light', cursive;" <?php if (isset($options['kn_select_field2'])) selected( $options['kn_select_field2'], 1 ); ?>>Font 1: Shadows Into Light</option>
            
            
			<option value="'Euphoria Script', cursive;" <?php if (isset($options['kn_select_field2'])) selected( $options['kn_select_field2'], 2 ); ?>>Font 2: Euphoria Script</option> 
  
                    
            <option value="'Petit Formal Script', cursive;" <?php if (isset($options['kn_select_field2'])) selected( $options['kn_select_field2'], 3 ); ?>>Font 3: Petit Formal Script</option>
		</select>
	<?php
	}
    
// Gives the option to change the font size in the content area on the Home Page
    
       function kn_select_field_render3() { 
		$options = get_option( 'kn_options_settings' );
		?>
		<select name="kn_options_settings[kn_select_field3]">
			<option value="1em" <?php if (isset($options['kn_select_field3'])) selected( $options['kn_select_field3'], 1 ); ?>>Font Size: 1em</option>
            
            
			<option value="1.5em" <?php if (isset($options['kn_select_field3'])) selected( $options['kn_select_field3'], 2 ); ?>>Font Size: 1.5em</option> 
  
                    
            <option value="2em" <?php if (isset($options['kn_select_field3'])) selected( $options['kn_select_field3'], 3 ); ?>>Font Size: 2em</option>
		</select>
	<?php
	}


    function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Kandy Theme Options Page</h2>
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