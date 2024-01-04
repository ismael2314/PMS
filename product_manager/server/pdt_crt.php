<?php
    $user_id = $_SESSION['id'];
    include "server/conn.php";
    if (isset($_POST['pdt_crt'])) {
        
        $pdt_name  = $_POST['pname'];
        $pdt_price = $_POST['price'];
        $pdt_quantity = $_POST['quantity'];
        $pdt_discription = $_POST['dis'];
        $pdt_aval = !empty($_POST['aval']) ? "avaliable":"not-avaliable";
        
        
        // filter out the input characters
        $pdt_name = filter_var($pdt_name,FILTER_DEFAULT);
        $pdt_price = filter_var( $pdt_price,FILTER_DEFAULT);
        $pdt_quantity = filter_var($pdt_quantity,FILTER_DEFAULT);
        $pdt_discription = filter_var($pdt_discription,FILTER_DEFAULT);

        /**
         * in hance filter
         */
        // store the product detail into the database
        unset($_POST);
        $pdt_id_gen = md5(random_int(0,time()));
        $pdt_crt_sql = "INSERT INTO product_tbl(pdt_id,
                                                pdt_name,
                                                pdt_price,
                                                pdt_quantity,
                                                pdt_discription,
                                                pdt_avalible
                                                )
                        VALUES('$pdt_id_gen',
                               '$pdt_name',
                               '$pdt_price',
                               '$pdt_quantity',
                               '$pdt_discription',
                               '$pdt_aval')";
        $pdt_usr_link = "INSERT INTO pdt_usr_tbl VALUES('$pdt_id_gen','$user_id')";
        $pdt_crt_query = mysqli_query($conn,$pdt_crt_sql);
        $pdt_usr_link_query = mysqli_query($conn,$pdt_usr_link);
        if ($pdt_crt_query && $pdt_usr_link) {
            ?>
            <div>
                <p class="info info-success">Successfully inserted new product !</p>
            </div>
            <?php
        }else {
            ?>
            <div>
                <p class="info info-error">Error has occured while tring to insert product detail !</p>
            </div>
            <?php
        }
        
    }

?>