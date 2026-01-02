<?php
include('../includes/config.php');
include('../includes/dbcode.php');

// Function to verify Turnstile token
function verifyTurnstile($token, $secret) {
    $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
    $data = [
        'secret' => $secret,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        return false;
    }

    $response = json_decode($result, true);
    return $response['success'] ?? false;
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');
$cf_turnstile_response = $_POST['cf-turnstile-response'] ?? '';

// Validate required fields
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Verify Turnstile
if (empty($cf_turnstile_response) || !verifyTurnstile($cf_turnstile_response, $turnstile_secret_key)) {
    echo json_encode(['success' => false, 'message' => 'CAPTCHA verification failed']);
    exit;
}

// Save to database
$query = "INSERT INTO contact_messages (name, email, subject, message, ip_address, user_agent) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $query);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database error']);
    exit;
}

$name = mysqli_real_escape_string($link, $name);
$email = mysqli_real_escape_string($link, $email);
$subject = mysqli_real_escape_string($link, $subject);
$message = mysqli_real_escape_string($link, $message);
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

mysqli_stmt_bind_param($stmt, 'ssssss', $name, $email, $subject, $message, $ip_address, $user_agent);

if (!mysqli_stmt_execute($stmt)) {
    echo json_encode(['success' => false, 'message' => 'Failed to save message']);
    exit;
}

mysqli_stmt_close($stmt);

// Prepare email
$to = $offices['dubai']['email']; // Use configured email address
$email_subject = "Contact Form: $subject";
$email_body = "Name: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Service: $subject\n\n";
$email_body .= "Message:\n$message\n";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// Send email (optional - comment out if you don't want emails)
if (mail($to, $email_subject, $email_body, $headers)) {
    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
} else {
    // Email failed but message was saved to database
    echo json_encode(['success' => true, 'message' => 'Message saved successfully (email delivery failed)']);
}
?>