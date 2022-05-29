<?php include "db.php";

$msg = "";
$hash = "";
$pss = "";

    $name = $_POST["name"];
    $password = $_POST["password"];
    $options = ['cost'=>5];
    $hashing = password_hash($password,PASSWORD_DEFAULT,$options);
	 if ($name == '' || $password == '') {
        $msg = "You must enter all fields";
    } else {
        $sql = "INSERT INTO users (username,secretcode) VALUES ('$name','$hashing')";
        $query = mysqli_query($con,$sql);
         
    if(password_verify($password,$hashing)){
        $msg="Password is valid!";
        $hash="$hashing";
        $pss="$password";
    }else{
        $msg="Password is invalid!";
    }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" />
<title>HASHing</title>
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>

	<form name="hashingform" method="post" >
		<table class="form" border="0">
            
            <tr>
			<td></td>
				<td style="color:red;">
				<?php echo $msg; ?></td>
			</tr> 
            
            <tr>
			<td></td>
                <td style="color:green;">
				<?php echo $hash; ?></td>
			</tr> 
            
            <tr>
			<td></td>
                <td style="color:green;">
				<?php echo $pss; ?></td>
			</tr> 
			
			<tr>
				<th><label for="name"><strong>Name:</strong></label></th>
				<td><input class="htext" name="name" id="name" type="text" size="30" /></td>
			</tr>
			<tr>
				<th><label for="name"><strong>Password:</strong></label></th>
				<td><input class="htext" name="password" id="password" type="password" size="30" /></td>
			</tr>
			<tr>
			<td></td>
				<td class="submitbtn">
				<input class="hbtn" type="submit" value="Submit" alt="Submit" title="Submit" />
			</td>
				
			</tr>
		</table>
	</form>

</body>
</html>
