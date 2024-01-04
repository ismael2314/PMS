<?php
    include 'server/conn.php';
    if (isset($_POST['sign'])) {
        $user = $_POST['uname'];
        $pass = $_POST['password'];
        $email = $_POST['email'];

        // filter the input from unwanted inputs

        $user = filter_var($user,FILTER_DEFAULT);
        $email = filter_var($email,FILTER_DEFAULT);

        // hashing the password for security reasons

        $pass_hash = password_hash($pass,PASSWORD_DEFAULT);

        // store it to the data base

        $sql = "INSERT INTO user_tbl(user_name,
                                    user_email,
                                    user_password)
                VALUES( '$user',
                        '$email',
                        '$pass_hash')";
        
        
        try {
            $query = mysqli_query($conn,$sql);
            if($query){
                header("location:login.php");
            }
        } catch (\Throwable $th) {
            ?>
            <div>
                <p class="info info-error">Your email already existed !</p>
            </div>
            <?php
        }
        
    }

?>