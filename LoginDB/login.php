<?php

    if(isset($_POST['name']))
    {
        $server = "localhost";
        $username = "root";
        $password = "";

        // this is how we make the secure connection with database
        $con = mysqli_connect($server, $username, $password);

        if(!$con)
        {
            die("connection to this database failed due to" .mysqli_connet_error());
        }
        echo "Success connecting to the database";

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO `user db`.`user` (`Name`, `Email`, `Password`, `Time`) VALUES ('$name', '$email', '$password', current_timestamp())";
        echo $sql;

        if($con->query($sql) == true)
        {
            echo "Successfully inserted";
        }
        else
        {
            echo "ERROR : $sql <br> $con->error";
        }

        $con->close();
    }
?>