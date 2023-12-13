<?php
if(isset($_POST['search']))
{
$valuetosearch=$_POST['id input'];
$query="select *from patient where p_id='$valuetosearch'";
$search_result = filtertable($query);
}
else
{
$query="select *from 'patient' where p_id='id input'"; 
$search_result=filtertable($query);
}
function filtertable($query)
{
$connect=mysqli_connect("localhost","root","","healthcare");
$filter_Result=mysqli_query($connect,$query);
return $filter_Result;
}
?>

<!Doctype html>
<head>
    <title>
        view details
        </title>
        <style>
            table,tr,td,th
            {
                border:1px solid black;
            }
            
        </style>
        </head>
 <body>
     <form>
    patient id<input type="text" name="id input" placeholder="search id" value="search"/>
     <input type="submit" name="search" value="go"><br><br>
     
     <table>
         <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>gender</th>
</tr>
<?php 
while($row =mysqli_fetch_array($search_result)){ ?>
    <tr>
        <td><?php echo $row['p_id'];?></td>
        <td><?php echo $row['p_name'];?></td>
        <td><?php echo $row['p_email'];?></td>
        <td><?php echo $row['p_phone'];?></td>
        <td><?php echo $row['p_gender'];?></td>
    </tr>
    <?php }?>
    </table>
    </form>
    
      </body>  
      
  </html>