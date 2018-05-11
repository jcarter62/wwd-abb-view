<?php
/**
 * @Author WWD
 * @Copyright (c) 2018. Westlands Water District. (https://wwd.ca.gov)
 * This code is released under the GPL licence version 3 or later, available here
 * http://www.gnu.org/licenses/gpl.txt
 */

class wwd_station_list
{
    private $auth;
    private $isAuth = false;

    /**
     * wwd_station_list constructor.
     */
    public function __construct()
    {
        add_shortcode( 'wwd-station-list', array( $this, 'execute'));
    }

    public function execute() {
        $this->auth = new wwd_auth();
        $this->isAuth = $this->auth->isIsAuthenticated();

        $out = '<div>WWD Lift Stations</div>';


        return $out;
    }

}

$wwd_sta_list = new wwd_station_list();