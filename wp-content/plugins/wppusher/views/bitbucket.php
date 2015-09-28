<?php

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

?>

<br>

<?php settings_errors(); ?>

<form method="post" action="<?php echo admin_url(); ?>options.php">
    <?php settings_fields('pusher-bb-settings'); ?>
    <?php do_settings_sections('pusher-bb-settings'); ?>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">
                <label>Bitbucket username</label>
            </th>
            <td>
                <input name="bb_user" type="text" id="bb_user" value="<?php echo esc_attr(get_option('bb_user')); ?>" class="regular-text">
                <p class="description">Only neccessary if you have private repositories.</p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label>Bitbucket password</label>
            </th>
            <td>
                <input name="bb_pass" type="password" id="bb_pass" class="regular-text" placeholder="<?php echo (get_option('bb_pass')) ? '********' : null; ?>">
                <p class="description">It is highly recommended that you create a seperate <strong>read only</strong> user for WP Pusher to use.</p>
            </td>
        </tr>
        </tbody>
    </table>
    <?php submit_button('Save Bitbucket credentials'); ?>
</form>
