<?php

    include_once ("../lib/Session.php");
    Session::checkAdminSession();
    include_once ("../lib/Database.php");
    include_once ("../helpers/Format.php");

    $db  = new Database();
    $fm  = new Format();

    // Prevent caching
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

    // Logout handling
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
        header("Location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="phpcoding">
        <section class="headeroption"></section>

        <section class="maincontent">
            <nav class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="users.php">Manage Users</a></li>
                    <li><a href="quesadd.php">Add Question</a></li>
                    <li><a href="queslist.php">Question List</a></li>
                    <li><a href="?action=logout">Logout</a></li>
                </ul>
            </nav>
