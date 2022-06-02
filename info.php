<style>
    body{ background-image: url(a.jfif);
            background-position: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    div{
        text-align: center;
        color: black;
        border-style: groove;
            border-radius: 12px;
            text-align: center;
            margin-right: 400px;
            margin-left: 250px;
            margin-top: 200px;
            background-color: white;
    }

</style>
<?php
$con=mysqli_connect('localhost','root','','courier');
$cname=$_POST["C_name"];
$pno=$_POST["P_no"];
$typeS=$_POST["service"];
$email=$_POST["email"];
$D=date("d/m/Y");
$From_address=$_POST["From_Address"];
$To_Address=$_POST["To_Address"];
$deliveryman=array("DLY01","DLY02","DLY03","DLY04","DLY05","DLY06");
$deliveryman_id=$deliveryman[array_rand($deliveryman,1)];
$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$id=substr(str_shuffle($str_result),0,6);
$ed=date("d/m/Y");
$sql="INSERT INTO info (C_name,P_no,Type_service,id,email,From_address,To_Address,Order_placed_on,Expected_delivery_date,Deliveryman_id) VALUES ('$cname','$pno','$typeS','$id','$email','$From_address','$To_Address','$D','$ed','$deliveryman_id')";
$rs = mysqli_query($con , $sql);
$my_query="SELECT Deliveryman_name,Deliveryman_phone FROM deliveryman WHERE deliveryman_id='$deliveryman_id'";
$result=mysqli_query($con, $my_query);
while($rows = mysqli_fetch_assoc($result)){
    $del_name=$rows["Deliveryman_name"];
    $delphone=$rows["Deliveryman_phone"];
}
//$msg="Thank You $cname for choosing AJM Courier service\n Your Tracking id is $id\n Login to coustomer login to track your $typeS";
//mail("$email","Tracking id","$msg")
?>
<div>
    Thank You <?php echo "$cname";?> for choosing our service<br>
    Your tracking id is:<b> <?php echo "$id";?></b><br>
    Type of Service Requested is <?php echo "$typeS";?><br>
    Amount to be paid is Rs.<?php if($typeS=="letter"){echo "50";}else{echo "100";}?><br>
    The tracking id has been sent to <?php echo "$email";?><br>
    Order Placed on:<?php echo "$D";?><br>
    Deliveryman Name :<?php echo "$del_name";?><br>
    Deliveryman Phone: <?php echo "$delphone";?><br>
    Delivery Expected on :<?php echo "$ed";?><br><br>
    Login to Constumer login using the tracking id to track the <?php echo "$typeS";?><br>
</div>
<br><br><br><br><br>
<a href="Home.html" style="text-align: center;">Back to Home page</a><br><br>
