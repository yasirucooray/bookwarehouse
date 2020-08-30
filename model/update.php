<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
  <?php
  include_once("../config.php");
 
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM book_details WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $price = $res['price'];
    $author=$res['auther_name'];
    $isbn=$res['isbn'];
    $publish=$res['publish'];
    $medium=$res['medium'];
  
}
?>
<?php
// including the database connection file
include_once("../config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $publish=$_POST['publish'];
    $medium=$_POST['medium'];
    $price=$_POST['price'];
    
    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE book_details SET name='$name',auther_name='$author',isbn='$isbn', publish='$publish',medium='$medium',price='$price' WHERE id=$id");
        echo "<script>
alert('The book details Update successfully');
window.location.href='../home.php';
</script>";
    
}
?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Book Store | Update</title>  
           <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> <style>
     body {
      background-image: url("../image/bkupdate.jpg");
      width: 100%;
  height: auto;
  background-repeat: no-repeat;
  background-size: 100% ;
}
     </style>
      </head>  
      <body>  
      <nav class="navbar navbar-default" style="background-color: lightgrey;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../home.php">Book store</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../addbook.php">Add Books<span class="sr-only"></span></a></li>
        <li><a href="../home.php?logout='1'">Logout</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left"method="get" action="search.php">
        <div class="form-group" >
          <input type="text" class="form-control" name="search" placeholder="Search Tital or Author">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br>

<div class="container">    
            
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Update Book Details</div>

            </div>  
            <div class="panel-body" >
                <form method="post" action="update.php">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            

                    <form  class="form-horizontal" method="post" >
                        
                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Book Name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="name"  value="<?php echo $name;?>" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> Author<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="id_email" name="author" value="<?php echo $author;?> "style="margin-bottom: 10px" type="text" />
                            </div>     
                        </div>
                        <div id="div_id_password1" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">ISBN<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="id_password1" name="isbn" value="<?php echo $isbn;?>" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_password2" class="form-group required">
                             <label for="id_password2" class="control-label col-md-4  requiredField"> Publish<span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_password2" name="publish" value="<?php echo $publish;?>" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Medium<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="id_name" name="medium" value="<?php echo $medium;?> "style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Price<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                            <input class="input-md textinput textInput form-control" id="" name="price" value="<?php echo $price;?>" style="margin-bottom: 10px" type="text" />
                             </div>
                        </div>
                        
                        <div class="form-group"> 
                        <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                                <input type="submit" name="update" value="Update" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
    </div> 
</div>
    
</body>
</html>