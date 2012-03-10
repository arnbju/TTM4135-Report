<?php
if ($_SERVER[SSL_CLIENT_S_DN_CN] == "arnedab@stud.ntnu.no" || $_SERVER[SSL_CLIENT_I_DN_CN] == "Staff CA"){
$host="localhost"; // Host name
$username="gr10"; // Mysql username
$password="zqRGRyUH"; // Mysql password
$db_name="dbgr10"; // Database name

$connection = mysqli_connect($host, $username, $password, $db_name) or die ("Unable to connect!");

$query = "SELECT navn FROM brukere";

$result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error($connection));

?>
<form action='delete_user.php' method='post'>
<?php
echo "<table>";
    echo "<tr><th></th><th>User</th></tr>";

    while($row = mysqli_fetch_row($result)) {
?>
        <tr>
        <td><?=$row[0]?></td>
	<td><input type="radio" name="username" value="<?=$row[0]?>" /></td>
        </tr>
<?php
    }

    echo "</table>";

?>


<input type='submit' value='Remove user' />

</form>



<form action='register_user.php' method='post'>
	Username: <input name='username' /><br />
	Password: <input name='password' type='password' /><br />
	<input type='submit' />
</form>

<?php

} else{
echo "Du har ikke tilgang her";

}
?>

