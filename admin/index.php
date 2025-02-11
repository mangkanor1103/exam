<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath . '/inc/header.php');
?>

<style>
    .adminpanel {
        width: 500px;
        color: #555;
        margin: 30px auto 0;
        padding: 50px;
        border: 1px solid #ddd;
        background: #f9f9f9;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .adminpanel h2 {
        color: green;
        margin-bottom: 10px;
    }
    .adminpanel p {
        font-size: 16px;
        color: #777;
    }
</style>

<div class="main">
    <h1>Admin Panel</h1>
    <div class="adminpanel">
        <h2>Welcome to the Admin Control Panel</h2>
        <p>You can manage users and the online exam system from here.</p>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
