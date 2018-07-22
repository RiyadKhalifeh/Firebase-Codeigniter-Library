<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SendNotification extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Push_Notifications');
    }

    public function sendNoti() {
        $this->push_notifications->push_notification("test", "testBody", "reciverUserToken");
    }

}
