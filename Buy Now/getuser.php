<!DOCTYPE html>
<html>
<head>
<style>
table {
          width: 100%;
          border-collapse: collapse;
          background-color:white;
          padding: 20px 20px 20px;
          border-radius: 3px;
          box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
      }
      tr{
          margin-bottom: 40px;
      }
       td {
          font-family:"Trebuchet MS",tahoma; 
          font-size:20px;
          padding: 5px;
          padding-bottom: 30px;
          text-align: center;
      }

      th {text-align: left;}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

include 'dbConnect.php';


$sql="select * from classes where classid = '".$q."'";
$result = $db->query($sql);

echo "<table cellspacing='0' cellpadding='0'>";

if($result)
{
while($row = $result->fetch_array()) {
    echo "<tr>";
    echo "<td colspan='3'><img src='" . $row['product'] . "' width='100%'></td>";
    echo "</tr>";       
    echo "<tr>";
    echo "<td colspan='3'><span style='font-weight:bold'>Welcome Pack:</span>" . $row['buypack'] . "</td>";
    echo "</tr>";            
    echo "<tr>";
    echo "<td colspan='3'></td>";
    echo "</tr>";
}
}
echo "</table>";



?>
</body>
</html>