<?php  
 if(isset($_POST["book_id"]))  
 {  
      $id=$_POST["book_id"];
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "bookstore");  
      $query = "SELECT * FROM book_details INNER JOIN catagory ON book_details.cat_id = catagory.id WHERE book_details.id = $id";  
      
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Book Name</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Catagory Name</label></td>  
                     <td width="70%">'.$row["catagory_name"].'</td>  
                </tr>
                <tr>  
                <td width="30%"><label>Auther Name</label></td>  
                <td width="70%">'.$row["auther_name"].'</td>  
           </tr>    
                <tr>  
                     <td width="30%"><label>Price</label></td>  
                     <td width="70%">'.$row["price"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Publisher</label></td>  
                     <td width="70%">'.$row["publish"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Image</label></td>  
                     <td width="70%"><img src="image/'.$row["image"].'" class="block-20" style="width:200px;height:100px;"></td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>ISBN</label></td>  
                    <td width="70%">'.$row["isbn"].' </td>  
                </tr> 
               <tr>  
                    <td width="30%"><label>Medium</label></td>  
                    <td width="70%">'.$row["medium"].'</td>  
               </tr> 
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
