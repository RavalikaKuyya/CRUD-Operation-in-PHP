<?php

include 'Config.php'; 
include 'Send.php';
//Display the selected record
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $edit_state = true; 
    $rec = mysqli_query($conn,"Select * from info where id=$id"); //To get the id 
    $record = mysqli_fetch_array($rec);
    $name = $record['Name'];
    $MobileNumber = $record['Mobile'];
    $address = $record['Address'];
    $id = $record['id'];

}

?>
<!DOCTYPE html>
<html>
<head>
<title>
 CRUD operations in php
 </title>    <link rel="stylesheet" type="text/css" href="TableStyle.css">
 
    </head>
    <body>
       
    <table>
        <thead>
        <tr>
        <th>Name</th>
          <th>Mobile</th>  <th>Address</th>
        <th colspan="2"> Action </th></tr>
            </thead>
       
        <tbody>
             
                
           <?php 
    
            $sql ="SELECT * from info";
            
            $result = $conn->query($sql);
            if($result->num_rows > 0){ ?>
              <?php  while($row = $result-> fetch_assoc()){ ?>
              <tr>
            <td> <?php echo $row['Name']; ?> </td>
                   <td> <?php echo $row['Mobile']; ?> </td> <td> <?php echo $row['Address']; ?> </td>
                  <td > <a href="index.php?edit=<?php echo $row['id'];?>" > Edit</a></td> 
                   <td> <a href="Index.php?del=<?php echo $row['id'];?>" >Delete</a> </td>
            </tr>  <?php }
            } ?>
              
        </tbody>
        
        </table>
        <form action="send.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
 
 
          <div class="input-group">
              <label>Name</label>
    <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" >
          </div>
         
           <div class="input-group">
              <label>Mobile</label>
    <input  type="text" name="MobileNumber" placeholder="Mobile Number" value="<?php echo $MobileNumber; ?>">
          </div>
             
          <div class="input-group">
              <label>Address</label>
            <input  type="text" name="Address" placeholder="Address" value="<?php echo $address; ?>">
          </div>
     <div class="input-group">
         <?php if($edit_state == false):?>
         <button type="submit" name="Save" class="btn" >Save</button>
         <?php else: ?>
         <button type="submit" name="Update" class="btn" >Update</button>
         <?php endif ?>
        
  </div>
              
            
 
    
</form>
       
    </body>