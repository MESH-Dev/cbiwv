<?php
/*
Plugin Name: PhpSword Google Analytics
Plugin URI: https://69plugins.com/free-plugins/phpsword-google-analytics/
Description: Insert Google Analytics code to your WordPress website. No need to connect your account, no verification or no complex setting. Just install and activate the WordPress plugin to add the Google Analytics code to your site. You can also completely enable or disable analytic code from your website.
Version: 1.0
Author: Pradnyankur Nikam
Author URI: http://www.pradnyankur.com
License: GPL2
*/

class PhpSword_Analytics {
public $phpsw_analytics_options;
public function __construct()
{
$this->phpsw_analytics_options = get_option('phpsw_analytics_options');
$this->register_settings_and_fields();
}

public function add_phpsw_analytics_page()
{
// Adds a main menu on left column.
add_menu_page('PhpSword Analytics', 'PhpSw Analytics', 'administrator', __FILE__, array('PhpSword_Analytics', 'show_form_page'));
}
	
public function show_form_page(){
?>
<div class="wrap">
	<h2>PhpSword Google Analytics</h2>
	<p>Very simple and easy to use WordPress plugin to add Google Analytics codes to your WordPress website.</p>
	<form method="post" action="options.php">
	<?php
	// group name as attribute
	settings_fields('phpsw_analytics_options');
	do_settings_sections(__FILE__);
	?>
	<p class="submit"><input type="submit" name="submit" class="button-primary" value="Save Changes" /></p>
	</form>
</div>
<?php
}

public function register_settings_and_fields()
{
register_setting('phpsw_analytics_options', 'phpsw_analytics_options');
add_settings_section('phpsw_main_section', 'PhpSword Analytics', array($this, 'phpsw_main_section_cb'), __FILE__);
add_settings_field('phpsw_analytics_code', 'Analytics Code: ', array($this, 'phpsw_analytics_code_field'), __FILE__, 'phpsw_main_section');
add_settings_field('phpsw_analytics_option', 'Enable/Disable Analytics Code: ', array($this, 'phpsw_analytics_option_field'), __FILE__, 'phpsw_main_section');
}

public function phpsw_main_section_cb()
{

}
// Analytics code text area
public function phpsw_analytics_code_field()
{
echo '<label for="phpsw_analytics_options[analytics_code]">Insert your google analytics code in the given box.</label>';
echo "<textarea name=\"phpsw_analytics_options[analytics_code]\" class=\"large-text code\" rows=\"10\" clos=\"10\">";
echo $this->phpsw_analytics_options['analytics_code'];
echo "</textarea>";
}

// Enable/Disable code
public function phpsw_analytics_option_field()
{
echo "<select name=\"phpsw_analytics_options[phpsw_analytics_option]\">";
echo "<option value=\"Enabled\"";
if($this->phpsw_analytics_options['phpsw_analytics_option']==='Enabled'){ echo ' selected=\"selected\" '; }
echo ">Enable</option>";
echo "<option value=\"Disabled\"";
if($this->phpsw_analytics_options['phpsw_analytics_option']==='Disabled'){ echo ' selected=\"selected\" '; }
echo ">Disable</option>";
echo "</select>";
}

} // Class End

add_action('admin_menu','add_phpsw_analytics_menu');
function add_phpsw_analytics_menu(){
PhpSword_Analytics::add_phpsw_analytics_page();
}
add_action('admin_init', 'instantiate_phpsword_analytics_class');
function instantiate_phpsword_analytics_class(){
new PhpSword_Analytics();
}
add_action('wp_footer', 'add_phpsword_analytics');
function add_phpsword_analytics(){
$phpsw_analytics = get_option('phpsw_analytics_options');
// if option is enabled from setting then add analytics code in the footer
	if($phpsw_analytics['phpsw_analytics_option']==='Enabled')
	{
	echo $phpsw_analytics['analytics_code'];
	}
}
?>