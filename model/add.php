<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");
if(isset($_POST['submit'])) {   
    $db = mysqli_connect('localhost', 'root', '', 'bookstore');
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $author = mysqli_real_escape_string($mysqli, $_POST['author']);
    $publish = mysqli_real_escape_string($mysqli, $_POST['publish']);
    $isbn = mysqli_real_escape_string($mysqli, $_POST['isbn']);
    $medium = mysqli_real_escape_string($mysqli, $_POST['medium']);
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);
    $username = mysqli_real_escape_string($mysqli, $_POST['price']);
    $cat = mysqli_real_escape_string($mysqli, $_POST['cat']);
    

  $user_check_query = "SELECT * FROM catagory WHERE catagory_name='$cat'";
  $result2 = mysqli_query($db, $user_check_query);
  if(isset($_POST['isbn'])){
    $isbn2 = $_POST['isbn'];
  $query = "select count(*) as isbn from book_details where isbn='".$isbn2."'";

   $result = mysqli_query($mysqli,$query);

  if(mysqli_num_rows($result)){
     $row = mysqli_fetch_array($result);

     $count = $row['isbn'];
   
     if($count > 0){
         $response = "<span style='color: red;'> echo '<script>
         alert('The isbn is used');
         window.location.href='../addbook.php';
         </script>'; </span>";
     }
     else{
  

  while($row = mysqli_fetch_array($result2))  
  {  
    $s=$row['id'];
  }
     
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result2 = mysqli_query($mysqli, "INSERT INTO book_details(name,auther_name,publish,isbn,medium,image,price,cat_id) VALUES('$name','$author','$publish','$isbn','$medium','$image','$username','$s')");

        $result3 = mysqli_query($mysqli, "INSERT INTO author(name) VALUES('$author')");
        echo "<script>
        alert('The book is added to the system');
        window.location.href='../home.php';
        </script>";
}
}}

echo $response;
die;
}
?>
</body>
</html>