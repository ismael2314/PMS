<?php
    /**
     * Update
     * 
     */

    include "server/conn.php";
    if (isset($_POST['pdt_upd'])) {

        $pdt_id = $_POST['pid'];
        $pdt_name  = $_POST['pname'];
        $pdt_price = $_POST['price'];
        $pdt_quantity = $_POST['quantity'];
        $pdt_discription = $_POST['dis'];
        $pdt_aval = !empty($_POST['aval']) ? "avaliable":"not-avaliable";
        //filter the inputs

        $pdt_id = filter_var($pdt_id,FILTER_DEFAULT);
        $pdt_name = filter_var($pdt_name,FILTER_DEFAULT);
        $pdt_price = filter_var($pdt_price,FILTER_DEFAULT);
        $pdt_quantity = filter_var($pdt_quantity,FILTER_DEFAULT);
        $pdt_discription = filter_var($pdt_discription,FILTER_DEFAULT);
        // update the data from the database

        $pdt_udt_sql = "UPDATE  product_tbl 
                        SET     pdt_name ='$pdt_name',
                                pdt_price='$pdt_price',
                                pdt_quantity ='$pdt_quantity',
                                pdt_discription ='$pdt_discription',
                                pdt_avalible ='$pdt_aval' 
                        WHERE   pdt_id ='$pdt_id'";
        $pdt_udt_query = mysqli_query($conn,$pdt_udt_sql);
        if ($pdt_udt_query) {
             ?>
            <div>
                <p class="info info-success">
                    Successfully updated the product information !
                </p>
            </div>
            <?php
        }else {
            ?>
            <div>
                <p class="info info-error">
                    Error while trying to Update product !
                </p>
            </div>
            <?php
        }
        unset($_POST);
    }

?>