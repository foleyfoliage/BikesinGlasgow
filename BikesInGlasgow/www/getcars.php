<?php
include 'connect.php';
$q = $_GET['q'];
// Protect against form submission variables.
if (get_magic_quotes_gpc())
{
 $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
 while (list($key, $val) = each($process))
 {
 foreach ($val as $k => $v)
 {
 unset($process[$key][$k]);
 if (is_array($v))
 {
 $process[$key][stripslashes($k)] = $v;
 $process[] = &$process[$key][stripslashes($k)];
 }
 else
 {
 $process[$key][stripslashes($k)] = stripslashes($v);
 }
 }
 }
 unset($process);
}
try
{
 $sql = "SELECT * FROM practiceTBL WHERE power = '" . $q . "'";
 $result = $pdo->query($sql);
}
catch (PDOException $e)
{
 echo 'Error fetching data: ' . $e->getMessage();
 exit();
} echo "<table border='1'>
<tr>
<th>Table ID</th>
<th>Power</th>
<th>Vehicle</th>
<th>URL</th>
</tr>";
while ($row = $result->fetch())
{
 echo "<tr>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['power'] . "</td>";
 echo "<td>" . $row['vehicle'] . "</td>";
 echo "<td><a href='" . $row['url'] . "'>learn more</a></td>";
 echo "</tr>";
 }
echo "</table>";