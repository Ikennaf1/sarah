<?php

/****************
 | Enque styles |
 ****************
*/

add_action( 'wp_enqueue_scripts', 'sarah_enqueue_styles' );
add_action('admin_init', 'sarah_settings_init');

function sarah_enqueue_styles() {
	wp_enqueue_style( 
		'sarah-style', 
		get_stylesheet_uri()
	);
    
    wp_enqueue_style( 
		'sarah-style-2', 
		get_stylesheet_directory_uri() . '/sarah.css'
	);
}

/************************
 | The settings section |
 ************************
*/

function sarah_settings_init() {
	// register a new setting for "general" page
	register_setting('general', 'sarah_settings');

	// register a new section in the "general" page
	add_settings_section(
		'sarah_settings_section',
		'Sarah Theme Settings Section', 'sarah_settings_section_callback',
		'general'
	);

	// register new fields in the "sarah_settings_section" section, inside the "general" page
	add_settings_field(
		'sarah_name_settings_field',
		'Display Name', 'sarah_name_settings_field_callback',
		'general',
		'sarah_settings_section'
	);

	add_settings_field(
		'sarah_title_settings_field',
		'Your title (ex. Copywriter)', 'sarah_title_settings_field_callback',
		'general',
		'sarah_settings_section'
	);

	add_settings_field(
		'sarah_bio_settings_field',
		'Short bio', 'sarah_bio_settings_field_callback',
		'general',
		'sarah_settings_section'
	);

	add_settings_field(
		'sarah_cta_settings_field',
		'CTA button text', 'sarah_cta_settings_field_callback',
		'general',
		'sarah_settings_section'
	);
}

/**
 * register sarah_settings_init to the admin_init action hook
 */
add_action('admin_init', 'sarah_settings_init');

// section content cb
function sarah_settings_section_callback() {
	echo '<p>Sarah Theme Settings.</p>';
}

// field content cb
function sarah_name_settings_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('display_name');
	// output the field
	?>
	<input type="text" name="display_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function sarah_title_settings_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('user_title');
	// output the field
	?>
	<input type="text" name="user_title" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function sarah_bio_settings_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('user_bio');
	// output the field
	?>
	<textarea name="user_bio"><?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?></textarea>
    <?php
}

function sarah_cta_settings_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('cta_text');
	// output the field
	?>
	<input type="text" name="cta_text" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

/************
 | Patterns |
 ************
*/

/******************
 | Retrieve icons |
 ******************
*/
function themeGetSocials()
{
    return [
        'facebook' => [
            'name' => 'Facebook',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6" stroke="currentColor" fill="currentColor"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>'
        ],
        'x' => [
            'name' => 'X',
            'icon' => '<svg viewBox="0 0 24 24" class="w-6 h-6" aria-hidden="true" fill="currentColor"><g><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></g></svg>'
        ],
        'instagram' => [
            'name' => 'Instagram',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6" fill="currentColor"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>'
        ],
        'linkedin' => [
            'name' => 'LinkedIn',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6" fill="currentColor"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>'
        ]
    ];
}

function themeGetContacts()
{
    return [
        'phone' => [
            'name' => 'Phone number',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="currentColor" stroke="currentColor"><path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" /></svg>'
          
        ]
    ];
}
