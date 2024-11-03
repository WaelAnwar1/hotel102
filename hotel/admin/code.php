
<?php 

    require '../config/functions.php';

    if(isset($_POST['user_new_save']))
    {
        $name= mysqli_real_escape_string($conn, $_POST['name']);
        $phone= mysqli_real_escape_string($conn, $_POST['phone']);
        $email= mysqli_real_escape_string($conn, $_POST['email']);
        $password= mysqli_real_escape_string($conn, $_POST['password']);
        $user_role= mysqli_real_escape_string($conn, $_POST['user_role']);
        $user_state= validate($_POST['user_state'] == true ? 1:0);

        if($name != ''  || $password != '' || $email !='')
        {
            $query= "INSERT INTO users SET name='$name', password= '$password', phone='$phone', email='$email', user_role='$user_role', user_state= '$user_state'";
            $result= mysqli_query($conn, $query);

            if($result)
            {
                redirect('users.php', 'User Added Successfully');
            }
            else
            {
                redirect('user-add.php', 'Something Went Wronge');
            }
        }
        else
        {
            redirect('user-add.php','plz, fill all fields');
        }

    }
?>