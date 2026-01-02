<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $query = "SELECT image FROM team_members WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $member = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    $query = "DELETE FROM team_members WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($member && $member['image']) {
        deleteImage($root_path . '../assets/img/team/' . $member['image']);
    }
}

$_SESSION['alert_type'] = 'success';
$_SESSION['alert_message'] = 'Team member deleted successfully!';
header("Location: index.php");
exit;

