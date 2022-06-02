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
            div{
                color: black;
            }
            table, th, td {
    border: 1px solid black;
    background-color: whitesmoke;
    text-align: center;
    width: 30%;
}
.a{
    font-size: 30px;
    text-align: center;
    color: black;
}
.div_a{
    color: black;
    text-align: left;
    align-content: left;
}
        </style>
<?php
$con=mysqli_connect('localhost','root','','courier');
$u_name=$_POST["Uname"];
$id=$_POST["Id"];
$pwd=$_POST["Pwd"];
$my_query="SELECT Manager_name,Manager_id,Phone FROM manager WHERE uname='$u_name' AND Manager_id='$id' AND pwd='$pwd'";
$result = mysqli_query($con , $my_query);
while($rows = mysqli_fetch_assoc($result)){
    $name=$rows["Manager_name"];
    $id_=$rows["Manager_id"];
    $Phone=$rows["Phone"];
}
?>
<p class="pp">AJM Couriers</p>
<a href="manager_login.html" target="_self" style="float: right;">Logout</a>
<div class="div_a">
    
   <b> Manager Name: <?php echo "$name";?><br>
    Manager id : <?php echo "$id_";?><br>
    Phone no : <?php echo "$Phone";?> <br><br></b>
    <hr><hr>
</div>
<p class="a">Costumer Details</p>
<?php
if($id=="MGR01")
{
$my_query="SELECT C_name,P_no,id,From_Address,To_Address,Order_placed_on,Deliveryman_id FROM info";
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
}
else{
    if($id_=="MGR02"){
        $d1="DLY01";
        $d2="DLY02";
    }
    if($id_=="MGR03"){
        $d1="DLY03";
        $d2="DLY04";
    }
    if($id_=="MGR04"){
        $d1="DLY05";
        $d2="DLY06";
    }
    $qu="SELECT C_name,P_no,id,From_Address,To_Address,Order_placed_on,Deliveryman_id FROM info WHERE Deliveryman_id='$d1'";
    $rr=mysqli_query($con,$qu);
    echo "<table><tr><th>Coustomer name</th><th>Phone</th><th>From Address</th><th>To address</th><th>Order Placed On</th><th>Deliveryman name</th><th>Manager id</th></tr>";
    while($rows = mysqli_fetch_assoc($rr)){
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
$qu="SELECT C_name,P_no,id,From_Address,To_Address,Order_placed_on,Deliveryman_id FROM info WHERE Deliveryman_id='$d2'";
    $rr=mysqli_query($con,$qu);
    while($rows = mysqli_fetch_assoc($rr)){
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
}
?>