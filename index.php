<?php

    session_start();
    if (!isset($_SESSION['active'])) {
        
        header("location:login.php");
    }else {
        session_regenerate_id();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product_manager | Working...</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav" id="top_end">
        <h1>PMS</h1>
        <?php include "auth/auth-logout.php";?>
        <form method="post" id="logout_frm">
            <button type="submit" name="logout">Log out</button>
        </form>         
    </div>
    <div class="main">

        <div id="product_list">
            <input type ="search" name="pdt_search" placeholder="Keyword" id="pdt_src">
            <div id="pdt_src_rslt">
                    result
            </div>
            <?php include "server/pdt_crt.php";?>
            <?php include "server/pdt_udt.php"?>
            <?php include "server/pdt_del.php"?>
            <?php include "server/pdt_lst.php"?>
            </div>
        </div>
    </div>
    <script src="js/api/ajax.js"></script>
    <script src="js/events.js"></script>
    <a href="#top_end" class="nav-btn">Top</a>
</body>
</html>
<?php   unset($_POST);?>