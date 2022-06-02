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
            margin-right: 500px;
            margin-left: 150px;
            margin-top: 200px;
            background-color: white;
    }
</style>
<?php
$con=mysqli_connect('localhost','root','','courier');
$T_id=$_POST['T_id'];
$email=$_POST['email'];
$my_query="SELECT * FROM info WHERE id='$T_id' AND email='$email'";
$result=mysqli_query($con,$my_query);
while($rows = mysqli_fetch_assoc($result)){
    $Cname=$rows["C_name"];
    $id_=$rows["id"];
    $mail=$rows["email"];
    $Pno=$rows["P_no"];
    $S=$rows["Type_service"];
    $F=$rows["From_Address"];
    $T=$rows["To_Address"];
    $placed=$rows["Order_placed_on"];
    $del_id=$rows["Deliveryman_id"];
    $qq="SELECT Deliveryman_name,Deliveryman_phone FROM deliveryman WHERE Deliveryman_id='$del_id'";
    $res=mysqli_query($con,$qq);
    while($r=mysqli_fetch_assoc($res)){
        $del_name=$r["Deliveryman_name"];
        $del_phone=$r["Deliveryman_phone"];
    }
    $ex=$rows["Expected_delivery_date"];
}
?>
<a href="Home.html" target="_self">Logout</a>
<div>
    Customer name : <?php echo "$Cname";?><br>
    Tracking id : <b><?php echo "$id_";?></b><br>
    E-mail: <?php echo "$mail";?><br>
    Phone : <?php echo "$Pno";?> <br>
    Service requested : <?php echo "$S";?> <br>
    From Address:<?php echo "$F";?> <br>
    To Address: <?php echo "$T"; ?> <br> 
    Order placed on: <?php echo "$placed";?> <br>
    Deliveryman name: <?php echo "$del_name";?> <br>
    Deliveryman phone: <?php echo "$del_Phone"?> <br>
    Delivery expected on: <?php echo "$ex"?> <br>
</div>

