<?php
    /**
     * Delete
     * 
     */

    include "server/conn.php";
    if (isset($_POST['pdt_del'])) {

        $pdt_id = $_POST['pid'];

        //filter the inputs

        $pdt_id = filter_var($pdt_id,FILTER_DEFAULT);

        $pdt_del_sql = "DELETE FROM product_tbl WHERE pdt_id='$pdt_id'";
        $pdt_del_query = mysqli_query($conn,$pdt_del_sql);

        if($pdt_del_query){
            ?>
            <div>
                <p class="info info-success">
                    Successfully deleted the product !
                </p>
            </div>
            <?php
        }else {
            ?>
            <div>
                <p class="info info-error">
                    Error while trying to remove product !
                </p>
            </div>
            <?php
        }
        unset($_POST);
    }