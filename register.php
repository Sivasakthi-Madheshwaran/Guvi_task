<?php
    $fname = filter_input(INPUT_POST,'fname');
    $lname = filter_input(INPUT_POST,'lname');
    $dobirth = filter_input(INPUT_POST,'dobirth');
    $gender = filter_input(INPUT_POST,'gender');
    $phnum = filter_input(INPUT_POST,'phnum');
    $email = filter_input(INPUT_POST,'email');
    $city = filter_input(INPUT_POST,'city');
    $pword = filter_input(INPUT_POST,'pword');


    if (!empty($fname) && !empty($lname) && !empty($dobirth) && !empty($gender) && !empty($phnum) && !empty($email) && !empty($city) && !empty($pword))
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "final";

        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_errno() .')'.mysqli_connect_error());
        }
        else{

            $SELECT = "SELECT email From dfile Where email = ? Limit 1";
            $INSERT = "INSERT Into dfile (fname, lname, dobirth, gender, phnum, email, city, pword)values(?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            //checking username
            if ($rnum==0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssssisss", $fname,$lname,$dobirth,$gender,$phnum,$email,$city,$pword);
                $stmt->execute();
                echo "New record inserted sucessfully";
                <html>
                    <head>                    
                    <body>
                        <button>sign in</button>
                    </body>
                    </head>
                </html>
            } else {
                echo "Someone already register using this email";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else{
        echo "All field are required";
        die();
    }
?>