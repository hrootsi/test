
<html>
<head>
<title>Proovitöö</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<table border="1" height=900 align=center width=800>
<tr >
<td colspan=2 height=50><h1>Proovitöö</h1></td>
</tr>
<tr>
<td width=250 align=left valign=top>
<form method="post">
		Username: <input type="text" name="name" id="name"/></br>
		Password: <input type="password" name="pw" id="pw"/></br>		
		<input type="submit" value="Login"></br>	
<a HREF="/~t093841/facebook/index.php">Avaleht</a><br>
<a HREF="/~t093841/facebook/register.php">Registreeri</a></br>
<a HREF="/~t093841/facebook/registered.php">Kõik registreerunud</a></br></td>
<td >
<?php

if (isset($_REQUEST['name'])) {
	if(isset($_REQUEST['pw'])){

		$con = mysql_connect("localhost","root","ruutjuur");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		$name = $_POST["name"];
		mysql_select_db("my_db", $con);

		$r = mysql_query("SELECT * FROM Persons where Name='".$_POST["name"]."' and Password='".$_POST["pw"]."'");
		if(mysql_num_rows($r) > 0){
			$_SESSION["name"] = $name;
			header("location:logged.php?ID=0");
			
		}
		else{
			echo "Username or password incorrect!";
		}
	}
}
?>
</td>
</tr>
</table>
</html>
