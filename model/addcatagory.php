<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");
if(isset($_POST['submit'])) {   
    
    $name = mysqli_real_escape_string($mysqli, $_POST['catagory']);
   
    

   
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result2 = mysqli_query($mysqli, "INSERT INTO catagory(catagory_name) VALUES('$name')");

        
        echo "<script>
        alert('The book is added to the system');
        window.location.href='../home.php';
        </script>";
}


?>
</body>
</html>