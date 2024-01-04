<table>
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Avaliblity</td>
            <td>Discription</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <form method="post" >
            <tr>
                <td></td>
                <td>
                    <input name="pname"  placeholder="Product name"  type='text' required minlength="5" >
                </td>
                <td>
                    <input name="price" placeholder="Product price" type='number' min='0.0' required>
                </td>
                <td>
                    <input name="quantity" placeholder="Quantity" type='number'  min = '1' required>
                </td>
                <td>
                    <input type='checkbox' value='avalible' name="aval"> is-avalible
                </td>
                <td>
                    <textarea name="dis" placeholder="Product discription" required minlength="60"></textarea></td>
                <td>
                <button type="submit" name="pdt_crt">Add</button>
                </td>
            </tr>
        </form>
<?php 
    include "server/conn.php";
    $user_id = $_SESSION['id'];
    $pdt_lst_sql = "SELECT p.pdt_id,
                           p.pdt_name,
                           pdt_price,
                           pdt_quantity,
                           pdt_avalible,
                           pdt_discription 
                    FROM product_tbl p, 
                         user_tbl u, 
                         pdt_usr_tbl put 
                    WHERE p.pdt_id=put.pdt_id 
                    AND u.user_id=put.usr_id 
                    AND u.user_id='$user_id' 
                    ORDER BY pdt_id DESC ";
    $pdt_lst_query = mysqli_query($conn,$pdt_lst_sql);
    if($pdt_lst_query){
        $row_count=0;
        while ($row = mysqli_fetch_assoc($pdt_lst_query)) {
            $row_count =$row_count +1;  
        ?>
        <form method="post" class="pdt_lst_form">
            <tr>
                <td class="fst_td">
                    <p>
                    pdt_<?php echo $row_count;  ?>
                    </p>
                    
                </td>
                <input type="hidden" value="<?php echo $row['pdt_id']?>" name="pid">
                <td><label class="d-sm">Product Name</label><input name="pname"    type='text' value='<?php echo $row['pdt_name']?>' aria-lable="Product name"></td>
                <td><label class="d-sm">Product price</label><input name="price" type='number' value='<?php echo $row['pdt_price']?>' min='0.0' aria-lable="Price"></td>
                <td><label class="d-sm">Product quantity</label><input name="quantity"    type='number' value='<?php echo $row['pdt_quantity']?>' min = '1' aria-lable="Quantity"></td>
                <td><label>
                    <input type='checkbox' name="aval" value='<?php echo $row['pdt_avalible']?>' 
                        <?php
                            if ($row['pdt_avalible']=='avaliable') {
                                echo "checked";
                            }
                        ?>
                    > <?php echo $row['pdt_avalible']?></label>
                </td>
                <td><label class="d-sm">Product Discription</label><textarea name="dis" aria-lable="Discription"><?php echo $row['pdt_discription']?></textarea></td>
                <td>
                    <button type="submit" name="pdt_upd" aria-lable="update">Update</button>
                    <button type="submit" name="pdt_del" aria-lable="delete">Delete</button>
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
?>
 </tbody>
</table>