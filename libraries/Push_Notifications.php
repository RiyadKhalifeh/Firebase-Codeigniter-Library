<?php

class Push_Notifications {

    public function push_notification($title = "", $body = "", $icon = "myIcon", $sound = "mySound", $token) {

        define('API_ACCESS_KEY', 'Your Key');
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token = $token;

        $notification = [
            'title' => $title,
            'body' => $body,
            'icon' => $icon,
            'sound' => $sound
        ];
        $extraNotificationData = ["message" => $notification, "moredata" => ''];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to' => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
    }

}
