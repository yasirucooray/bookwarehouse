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
include_once("config.php");
 $connect = mysqli_connect("localhost", "root", "", "bookstore");  
 $query = "SELECT * FROM book_details";  
 $result = mysqli_query($connect, $query);  
 
 $query1 = "SELECT catagory_name FROM catagory ";
 $result2 = mysqli_query($mysqli, $query1);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[0]</option>";
}
?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Book Store | Home</title>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  
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
      <a class="navbar-brand" href="#">Book store</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="addbook.php">Add Books<span class="sr-only">(current)</span></a></li>
        <li><a href="home.php?logout='1'">Logout</a></li>
        
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
           <br /><br />  
           <div class="row">
               <div class="col-xs-6 col-md-39" style="width:100%; height: 250px; background-color:lightgray;">
                    <form action="model/addcatagory.php" method="post">
                         <div class="form-group">
                         <center> <h3 for="exampleInputEmail1">Add Catagory</h3></center>
                         <input type="text" class="form-control" name="catagory" placeholder="Add Catagory" >
                         </div>
                         <button type="submit" name="submit" class="btn btn-primary" style=" position: absolute;right: 100px;">Submit</button>
                    </form>
                    <form action="catagory.php" method="get">
                         <div class="form-group">
                         <center> <h3 for="exampleInputEmail1">Select Catagory</h3></center>
                         <select class="form-control" name="cat">
                         <?php echo $options;?>
                         </select>
                         </div>
                         <button type="submit" class="btn btn-primary" style=" position: absolute;right: 100px;">Submit</button>
                    </form>
                </div>
  ...     </div>
<br><br>
<br/> 
  
           <div class="container" style="width:100%;">  
                <h3 align="center">All Book Details in book store</h3>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered ">  
                          <tr>  
                               <th>Book Name</th>  
                               <th>Author Name</th>
                               <th>Price</th>
                               <th>Image</th>
                               <th>View</th>  
                               <th>Update</th> 
                               <th>Remove</th> 
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                              $s=$row['image'];
                          ?>  
                          <tr>  
                               <td><?php echo $row["name"]; ?></td>  
                               <td><?php echo $row["auther_name"]; ?></td>  
                               <td style="width:100px"><?php echo $row["price"]; ?></td>  
                               <td><img src="image/<?php echo $row["image"]; ?>" class="block-20" style="width:150px;height:100px;"></td>  
                               <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-primary  view_data" /></td>
                               <td> <?php   echo "<a class='btn btn-warning' href=\"model/update.php?id=$row[id]\">Update</a> "?></td>
                               <td><?php echo "<a class='btn btn-danger' href=\"model/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> 
                        " ?></td>
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Book Details</h4>  
                </div>  
                <div class="modal-body" id="book_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var book_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{book_id:book_id},  
                success:function(data){  
                     $('#book_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
