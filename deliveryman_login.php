<style>
body{ background-image: url(a.jfif);
            background-position: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .pp{font-size: 50px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: black;}
            .a{
    font-size: 30px;
    text-align: center;
    color: black;
}
table, th, td {
    border: 1px solid black;
    background-color: whitesmoke;
    text-align: center;
    width: 30%;
}
</style>
<?php
$con=mysqli_connect('localhost','root','','courier');
$u_name=$_POST["Uname"];
$id=$_POST["Id"];
$pwd=$_POST["Pwd"];
$my_query="SELECT Deliveryman_name,Deliveryman_id,Deliveryman_phone FROM deliveryman WHERE uname='$u_name' AND Deliveryman_id='$id' AND pwd='$pwd'";
$result = mysqli_query($con , $my_query);
while($rows = mysqli_fetch_assoc($result)){
    $name=$rows["Deliveryman_name"];
    $id_=$rows["Deliveryman_id"];
    $Phone=$rows["Deliveryman_phone"];
}
?>
<p class="pp">AJM Couriers</p>
<a href="Deliveryman_login.html" target="_self" style="float: right;">Logout</a>
<div class="div_a">
    
   <b> Deliveryman Name: <?php echo "$name";?><br>
    Deliveryman id : <?php echo "$id_";?><br>
    Phone no : <?php echo "$Phone";?> <br><br></b>
    <hr><hr>
    <p class="a">Costumer Details</p>
    <?php
    $my_query="SELECT C_name,P_no,id,From_Address,To_Address,Order_placed_on,Deliveryman_id FROM info WHERE Deliveryman_id='$id_'";
    $result=mysqli_query($con,$my_query);
    echo "<table><tr><th>Coustomer name</th><th>Phone</th><th>From Address</th><th>To address</th><th>Order Placed On</th><th>Deliveryman name</th><th>Manager id</th></tr>";
    while($rows = mysqli_fetch_assoc($result)){
        $cname=$rows["C_name"];echo "<tr><td>$cname</td>";
        $pno=$rows["P_no"];echo "<td>$pno</td>";
        //$T_id=$rows["id"];echo "<td>$T_id</td";
        $F=$rows["From_Address"];echo "<td>$F</td>";
        $T=$rows["To_Address"];echo "<td>$T</td>";
        $placed=$rows["Order_placed_on"];echo "<td>$placed</td>";
        $del_id=$rows["Deliveryman_id"];
        $qq="SELECT Deliveryman_name,Manager_id FROM deliveryman WHERE Deliveryman_id='$del_id'";
        $res=mysqli_query($con,$qq);
        while($r=mysqli_fetch_assoc($res)){
            $delname=$r["Deliveryman_name"];echo "<td>$delname</td>";
            $mgr=$r["Manager_id"];echo "<td>$mgr</td></tr>";
        }
    }
    echo "</table>";