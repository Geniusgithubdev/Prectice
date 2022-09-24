<?php
session_start();
if(!isset($_SESSION["user"]))
{
	header('location:login.php');
}
$email=$_SESSION["user"];

$con = mysqli_connect('localhost', 'root', '', 'mwf4');
$qry="select * from signup where email='$email'";
$result=mysqli_query($con,$qry);
$row=mysqli_fetch_array($result);
$name=$row["name"];
$city=$row["city"];
$dob=$row["dob"];
mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>profile</title>
</head>

<body bgcolor="orange">
<h1>Welcome <?php echo $email;?>!</h1>
<table width="800" border="1" cellspacing="5" bgcolor="pink">
  <tbody>
    <tr>
      <td><a href="profile.php">Profile</a></td>
      <td><a href="edit_profile.php">Edit Profile</a></td>
      <td><a href="ch_psw.php">change psw</a></td>
      <td><a href="search.php">search</a></td>
      <td><a href="logout.php">logout</a></td>
    </tr>
  </tbody>
</table>
<hr>
<form method="post" action="#">
<table width="400" border="1" cellspacing="5" bgcolor="pink">
  <tbody>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" value="<?php echo $name ?>"></td>
    </tr>
    <tr>
      <td>email</td>
      <td><input type="email" readonly name="email" value="<?php echo $email ?>"></td>
    </tr>
    <tr>
      <td>city</td>
      <td><input type="text" name="city" value="<?php echo $city ?>"></td>
    </tr>
    <tr>
      <td>dob</td>
      <td><input type="text" name="dob" value="<?php echo $dob ?>"></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" value="UPDATE" name="u"></td>
    </tr>
  </tbody>
</table>

</form>
<?php
if(isset($_POST["u"]))
{
	$name=$_POST["name"];
	$email=$_POST["email"];
	$dob=$_POST["dob"];
	$city=$_POST["city"];
	
	$con = mysqli_connect('localhost', 'root', '', 'mwf4');
	echo $qry="update signup set name='$name', city='$city', dob='$dob' where email='$email'";
	mysqli_query($con,$qry);
	mysqli_close($con);
	header("location:profile.php");
	
	
}
?>
</body>
</html>