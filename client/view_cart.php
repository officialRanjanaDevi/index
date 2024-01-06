<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

   echo" <div class='head'><table class='table  table-bordered'>
                <th class='sno  box'>S.No.</th>
                <th class='name  box'>Product Name</th>
                <th class='price  box'>Price</th>
                <th class='pdt-img  box'>  Product Image </th>
                <th class='detail box'>Detail</th>  
                
                <th class='action  box'>     Remove     </th>  
    </table></div>";
  
   
$userid=$_SESSION['userid'];
   $sql_result=mysqli_query($conn,"select * from cart join product_details on cart.pid=product_details.pid  where userid=$userid");

   $total=0;
   $count=1;
while($row=mysqli_fetch_assoc($sql_result)){
    
    $total+=$row['price'];
    echo " <div class='table_box'>
    <table class='table   table-bordered'>
                <td class='sno'>$count</td>
                <td class='name'>$row[name]</td>
                <td class='price'>$row[price]</td>
                <td class='pdt-img'>
                    <img src='$row[impath]'>
                </td>
                <td class='detail'>$row[detail]</td>  
                
                <td class='action'>                    
                    <a href='remove.php?cartid=$row[cartid]'>
                        <button class='btn btn-danger'>Remove from cart</button>
                    </a>
                </td>  
    </table></div>";
     $count=$count+1;
    
}

echo "<div class='m-5 d-flex justify-content-center align-items-center'>
<h1>Place Order</h1>
<a href='place_order.php?'><button  class='btn btn-danger m-3'>Pay $total</button></a>
</div>";
include "footer.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }
        .head{
            margin-left: 80px; 
        
        }
        .table_box{
            height: 200px;
            margin-left: 80px;
           
        }
        .pdt-img{
            height: 150px;
            width: 150px;
        }
        .name{
            height: 150px;
            width: 300px;
        }
        .price{
            height: 150px;
            width: 150px;
        }
        .sno{
            height: 150px;
            width: 50px;
          
        }
        .detail{
            height: 150px;
            width: 500px;
        }
        .action{
            height: 200px;
            width: 200px;
            
        }
        .box{
           height: 50px;
           font-size: large;
          
        }
       
    </style>

</head>
<body>

    
</body>
</html> 


