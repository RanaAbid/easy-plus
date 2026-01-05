
<?php
$sys_env = "production"; //development, production
$protocol = "https://";//   https:// or http://
$web_dir = "";
$url = $_SERVER['SERVER_NAME'];
$url_arr_2 = explode(".",$url);
$app = $url_arr_2[0];
if (strpos($app, 'localhost') !== false or strpos($app, '127.0.0.1') !== false) {
  $sys_env = "development"; //development, production
  $protocol = "http://";//   https:// or http://
  $web_dir = "projects/easy-plus/";
}
$app_path = $protocol . $_SERVER['HTTP_HOST'] . "/".$web_dir;
$root_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $web_dir;

// Cloudflare Turnstile Configuration
// Get these keys from your Cloudflare dashboard
$turnstile_site_key = "1x00000000000000000000BB"; // Replace with actual site key
$turnstile_secret_key = "1x0000000000000000000000000000000AA"; // Replace with actual secret key

// Office Contact Information
$offices = [
    'dubai' => [
        'name' => 'Dubai Office',
        'phone' => '+971525444984',
        'email' => 'easyplus984@gmail.com',
        'address' => 'Office 17, 26B Street Al Mamoura Ras Al Khaimah United Arab Emirates',
        'working_hours' => '7:00am - 6:00pm (Mon - Fri) Sat, Sun & Holiday Closed',
        'description' => 'Completely recaptiualize 24/7 communities via standards compliant metrics whereas web-enabled content'
    ],
    'australia' => [
        'name' => 'Australia Office',
        'phone' => '+(310) 2591 21563',
        'email' => 'info@example.com',
        'address' => '258 Dancing Street, Miland Line, HUYI 21563, Canberra',
        'working_hours' => '7:00am - 6:00pm (Mon - Fri) Sat, Sun & Holiday Closed',
        'description' => 'Completely recaptiualize 24/7 communities via standards compliant metrics whereas web-enabled content'
    ],
    'usa' => [
        'name' => 'United State Office',
        'phone' => '+(310) 2591 21563',
        'email' => 'info@example.com',
        'address' => '258 Dancing Street, Miland Line, HUYI 21563, NewYork',
        'working_hours' => '7:00am - 6:00pm (Mon - Fri) Sat, Sun & Holiday Closed',
        'description' => 'Completely recaptiualize 24/7 communities via standards compliant metrics whereas web-enabled content'
    ]
];

// Footer contact information (uses Dubai office as primary)
$footer_contact = [
    'address' => $offices['dubai']['address'],
    'working_hours' => 'Weekdays 8am - 22pm Weekend 10am - 12pm',
    'email' => $offices['dubai']['email'],
    'phone' => $offices['dubai']['phone']
];

// Social Media Links
$social_media = [
    'facebook' => 'https://www.facebook.com/',
    'instagram' => 'https://www.instagram.com/',
    'linkedin' => 'https://www.linkedin.com/'
];
?>