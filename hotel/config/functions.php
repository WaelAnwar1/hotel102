<?php 
    session_start();
    require 'dbconn.php';

    function validate($inputData)
    {
        global $conn;
        return mysqli_real_escape_string($conn, $inputData);
    }   


    function redirect($url, $status)
    {
        $_SESSION['status'] = $status;
        header('Location:'.$url);
        exit(0);
    }


    function alertMessage()
    {
        if(isset($_SESSION['status']))
        {
            echo 
            '<div class="alert alert-success">
                <h6>'.$_SESSION['status'].'</h6>
            </div>';
            unset($_SESSION['status']);
        }
    }


    function get_all_rec($tableName)
    {
        global $conn;
        $table= validate($tableName);

        $query= "SELECT * FROM $table";
        $result= mysqli_query($conn, $query);
        return $result;
    }

    function CheckParamId($param)
    {       
        if(isset($_GET['id']))
        {
            if($_GET[$param] != null)
            {
                return $_GET[$param];
            }
            else
            {
                return 'No id found';
            }
        }
        else
        {
            return 'No id given';
        }
    }

    function getById($tableName, $id)
    {
        global $conn;
        $table= validate($tableName);
        $id= validate($id);

        $query= "SELECT * FROM $table WHERE id='$id' LIMIT 1";
        $result=mysqli_query($conn, $query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
                $response= [
                    'status' => 200,
                    'message'=>'Fetched Data',
                    'data' => $row
                ];
                return $response;

            }
            else
            {
                $response= [
                    'status' => 404,
                    'message' => 'No Data Record!'
                ];
                return $response;
            }
        }
        else
        {
            $response= [
                'status' => 500,
                'message' => 'Something Went Wronge!'
            ];
            return $response;
        }
    }
?>

