<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $query = "DELETE FROM contact_inquiries WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

$_SESSION['alert_type'] = 'success';
$_SESSION['alert_message'] = 'Inquiry deleted successfully!';
header("Location: index.php");
exit;

