
        
        <?

// I Set a few variables to make my page Nice . and i Stared with assign varibles
$site_title = "My Grocery App";
$bg_color = "white";
$user_name = "Nilupa";
$big_font = "h3";
$hcolour="green";
?>
<html>
<head>
    <title><? echo $site_title; ?></title>
</head>
<body bgcolor="<? echo $bg_color; ?>" >
<?
// Display an intro. message with date and user name.
echo "
<$big_font>My Grocery | ".date("F d, Y")." <br>
Greetings, $user_name! <br></$big_font>
";
?>
<h3 style="color:blue";>My Grocery App</h3>
<h2>Grocery list</h2>
        <div>
            
            <input type="text" id="grocery" name="addGrocery">
            <input type="button" value="additem" onclick="addGrocery();">
            <h3 id="demo">Grocery List</h3>
            <div id="Result"></div>     
            
        </div>
<?php
echo "Hi";
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
        }
    }
    //close connection

    mysqli_close($con);
}
?>
<h3>Read Data from excel and Insert in to Database</h3>
<?php
/*Connection to databse */
echo "Before Connection <br>";
$con = mysqli_connect("127.0.0.1","root","","groceries");

if(mysqli_connect_errno())
{
    echo "Failed to connect to Database".mysqli_connect_error();
}else{
    echo "Connected to Database</br>";
    if(($handle = fopen("retailer.csv", "r")) !== FALSE){
        echo "CSV file open-Success <br>";
        $row=1;
        while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            echo $data . "<br>";
            echo "Reading data". $row . "<br>";
            //Count data in each row
            $num = count($data);
            $sql = "INSERT INTO retailer(name,location,address,contact_no,email_id)
            VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]');";

            $readresult = $con->query($sql);
            echo "Inserted Record".$row."<br>";
            $row++;

        }
        echo "Insertion completed <br>";
        fclose($handle);
    }else{
        echo "Failed to open Excel file <br>";
    }

}

?>
</body>
</html>