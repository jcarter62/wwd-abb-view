<?php
/**
 * @Author WWD
 * @Copyright (c) 2018. Westlands Water District. (https://wwd.ca.gov)
 * This code is released under the GPL licence version 3 or later, available here
 * http://www.gnu.org/licenses/gpl.txt
 */

class wwd_abb_settings
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'exec_wp_enqueue_scripts'));
        add_action('admin_menu', array($this, 'exec_Options'));
    }

    function exec_Options()
    {
        add_menu_page('WWD ABB View Settings', 'WWD ABB View', 'manage_options',
            'wwdAbbViewAdmin', array($this, 'wwdAbbViewAdminPage'), '', 200);
    }

    function wwdAbbViewAdminPage()
    {
        if (array_key_exists('submit_admin_update', $_POST)) {
            update_option('wwd-abb-apikey', $_POST['inp-abb-apikey']);
            update_option('wwd-abb-apiurl', $_POST['inp-abb-apiurl']);
            update_option('wwd-abb-role', $_POST['inp-abb-role']);

            update_option('wwd-abb-days2rpt', $_POST['inp-abb-days2rpt']);
            update_option('wwd-abb-rpd', $_POST['inp-abb-rpd']);

            ?>
            <div>Updated!!</div>
            <?php
        }

        $apikey = get_option('wwd-abb-apikey', '');
        $apiurl = get_option('wwd-abb-apiurl', '');
        $role = get_option('wwd-abb-role');
        $days2rpt = get_option('wwd-abb-days2rpt');
        $rpd = get_option('wwd-abb-rpd');

        ?>
        <div class="wrap">
            <h2>WWD ABB View Settings:</h2>
            <form method="post" action="">
                <label for="inp-abb-apiurl">Base URL:</label>
                <textarea name="inp-abb-apiurl" class="large-text"><?php print $apiurl; ?></textarea>
                <label for="inp-abb-apikey">KEY:</label>
                <textarea name="inp-abb-apikey" class="large-text"><?php print $apikey; ?></textarea>
                <label for="inp-abb-role">Role Required for Viewing:</label>
                <select name="inp-abb-role">
                    <?php wp_dropdown_roles($role); ?>
                </select>
                <hr>
                <label for="inp-abb-days2rpt">Days To Report:</label>
                <input type="number" name="inp-abb-days2rpt" class="large-text" placeholder="Number"
                       value="<?php print $days2rpt; ?>">

                <label for="inp-abb-rpd">Readings Per Day:</label>
                <?php print($this->rpd_dropdown($rpd)) ?>
                <hr>
                <input type="submit" name="submit_admin_update"
                       class="button button-primary" value="UPDATE SETTINGS">
            </form>
            <hr>
        </div>

        <?php
    }

    private function rpd_dropdown($value) {
        $nl = chr(10) . chr(13);
        $items = array(
            array("name"=>"4", "value"=>"4PerDay"),
            array("name"=>"2", "value"=>"2PerDay"),
            array("name"=>"1", "value"=>"1PerDay")
        );

        $out = '<select name="inp-abb-rpd">' . $nl;

        foreach( $items as $item ) {
            $out .= '<option ';
            if ( $value == $item["value"] ) {
                $out .= ' selected="selected" ';
            }
            $out .= ' value="'. $item['value'] .'">';
            $out .= $item['name'].'</option>' . $nl ;
        }
        $out .= '</select>' . $nl;

        return $out;
    }

    function exec_wp_enqueue_scripts()
    {
        $root = plugin_dir_url(WWD_LAT_INFO_BASE);
        $url = $root . 'css/style.css';

        wp_enqueue_style('my-css-file', $url, '', time());

        $jsURL = $root . 'js/wwd_scripts.js';
        wp_enqueue_script('my-js-file', $jsURL, '', null, true );
    }
}

$wwd_abb_settings = new wwd_abb_settings();
