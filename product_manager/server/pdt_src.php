<?php
    session_start();
    include "conn.php";
    
    if (isset($_GET['pdt_src'])) {

        $pdt_key = $_GET['pdt_src'];
        $user_id = $_SESSION['id'];
        // fiter the input

        $pdt_key = filter_var($pdt_key,FILTER_DEFAULT);

        $pdt_src_sql = "SELECT * FROM product_tbl p, pdt_usr_tbl put 
                        WHERE p.pdt_id=put.pdt_id 
                        AND put.usr_id=$user_id AND 
                        pdt_name LIKE '%$pdt_key%'";
        $pdt_src_query = mysqli_query($conn,$pdt_src_sql);
        if($pdt_src_query){
            $row_count=0;
            while ($row = mysqli_fetch_assoc($pdt_src_query)) {
            ?>
            <form method="post" >
                <tr>
                    <input type="hidden" value="<?php echo $row['pdt_id']?>" name="pid">
                    <td><label>Product Name</label><input name="pname"    type='text' value='<?php echo $row['pdt_name']?>'></td>
                    <td><label>Product price</label><input name="price" type='number' value='<?php echo $row['pdt_price']?>' min='0.0'></td>
                    <td><label>Product quantity</label><input name="quantity"    type='text' value='<?php echo $row['pdt_quantity']?>' min = '1'></td>
                    <td>
                        <input type='checkbox' value='<?php echo $row['pdt_avalible']?>' 
                            <?php
                                if ($row['pdt_avalible']=='avaliable') {
                                    echo "checked";
                                }
                            ?>
                        > <?php echo $row['pdt_avalible']?>
                    </td>
                    <td><label>Product Discription</label><textarea name="dis"><?php echo $row['pdt_discription']?></textarea></td>
                    <td>
                        <button type="submit" name="pdt_upd">Update</button>
                        <button type="submit" name="pdt_del">Delete</button>
                    </td>
                </tr>
            </form>
            <?php 
            $row_count =$row_count +1;  
            } 
            if ($row_count==0) {
                ?>
                    <tr>
                        <td colspan="7" class="info">
                            No products avalible
                        </td>
                    </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td colspan="7" class="info info-error">
                    Unable to show product list
                </td>
            </tr>
            <?php
        }
    }