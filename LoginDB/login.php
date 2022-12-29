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

        // local variables declaration
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // remaining on the same website as the login creds aren't entered
        if($name == null || $name == "" || $email == null || $email == "" || $password == null || $password == "")
        {
            $con->close();
            echo "Please enter the login credentials!!";
            /* Redirect browser */
            header("Location: ../LoginDB/login.html");
        }

        // creating the data base object
        $sql = "INSERT INTO `user db`.`user` (`Name`, `Email`, `Password`, `Time`) VALUES ('$name', '$email', '$password', current_timestamp())";
        echo $sql;

        if($con->query($sql) == true)
        {
            echo "Successfully inserted";
            /* Redirect browser */
            header("Location: ../Main/main.html"); 
        }
        else
        {
            echo "ERROR : $sql <br> $con->error";
        }

        $con->close();
    }
?>