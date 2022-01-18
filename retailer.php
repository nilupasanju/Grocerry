<head>
    <title>My Grocery</title>
    <link rel="stylesheet" href="grocery.css">

</head>
<body>
    <header>
            <!--Navigation-->
            <nav>
                <div class="rowh">
                    <!--Logo-->
                    
                    <!--List-->
                    <ul class="main-nav">
                        <li><a href="product.php">Product  </a></li>
                        <li><a href="category.php">Category  </a></li>
                        <li><a href="#">Retailer   </a></li>
                        <li><a href="grocery.php">Home  </a></li>
                        
                    </ul>
                </div>
            </nav>
    </header>
    <div class="rowh">
         <?php

        $con = mysqli_connect("127.0.0.1","root","","groceries");

        if(mysqli_connect_errno())
        {
            echo "Failed to connect to Database".mysqli_connect_error();
        }else{
            echo "Connected to Database</br>";
        
            $sql = "SELECT * from retailer";
            $result = $con->query($sql);
            
            if($result->num_rows>0){
                echo "<table style=\"width:100%\">";
                echo "<caption> Retailer List </caption>";
                echo "<tr>";
                echo "<td> ID </td>";
                echo "<td> Name </td>";
                echo "<td> Location </td>";
                echo "<td> Contact </td>";
                echo "<td> email Id </td>";
                echo "</tr>";

                while($row=$result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" .$row['id']. "</td>";
                echo "<td>" .$row['name']. "</td>";
                echo "<td>" .$row['location']. "</td>";
                echo "<td>" .$row['address']. "</td>";
                echo "<td>" .$row['contact']. "</td>";
                echo "<td>" .$row['email_id']. "</td>";
                echo "</tr>";
                echo "</table>";
                }
            }
            //close connection

            mysqli_close($con);
        }
        ?>
    </div>

    <footer class="footer">
        
        <nav class="footer-nav">    
            <div>
                <pre>
                    DITMELBOURNE<br>
                    Franston Street<br>
                    Melbourne
                </pre>
            </div>
            
            <p>
                Copyright &copy; 2021 by GroceryApp(DITMELBOURNE). All rights reserved.
            </p>
        
        </nav>
    </footer>
</body>