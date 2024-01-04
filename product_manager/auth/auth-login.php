<?php
    include 'server/conn.php';
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        
        // filter the input from unwanted inputs
        
        $email = filter_var($email,FILTER_DEFAULT);

        //fetch the data from the database to compare

        $sql = "SELECT * FROM user_tbl WHERE user_email='$email'";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            
            $fetched = mysqli_fetch_assoc($query);

            if (password_verify($pass,$fetched['user_password'])) {
                
                session_start();
                $_SESSION['active']="yes";
                $_SESSION['user'] = $fetched['user_name'];
                $_SESSION['id'] = $fetched['user_id'];
                header("location:index.php");
            }else {
                ?>
                <div>
                    <p>check your password </p>
                </div>
                <?php
            }
        }else {
            ?>
            <div>
                <p>Please Create account First ! 
                    <a href="signup.html" hreflang="en">
                        I don't have an account.
                    </a> 
                </p>
            </div>
            <?php
        }

    }    
?>