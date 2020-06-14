<?php 
require_once("../config.php");
$mysqli = new mysqli("localhost", "root", "", "rental_baru") ;
if (mysqli_connect_errno())
{
   printf("Connect failed: %s", mysqli_connect_error());
   exit();
}
 // Introduction information
$return='';
$return .= "--\n";
$return .= "-- A Mysql Backup System \n";
$return .= "--\n";
$return .= '-- Export created: ' . date("Y/m/d") . ' on ' . date("h:i") . "\n\n\n";
$return = "--\n";
$return .= "-- Database : " . "rental_baru" . "\n";
$return .= "--\n";
$return .= "-- --------------------------------------------------\n";
$return .= "-- ---------------------------------------------------\n";
$return .= 'SET AUTOCOMMIT = 0 ;' ."\n" ;
$return .= 'SET FOREIGN_KEY_CHECKS=0 ;' ."\n" ;
$tables = array() ; 
// Exploring what tables this database has
$result = $mysqli->query('SHOW TABLES' ) ; 
// Cycle through "$result" and put content into an array
while ($row = $result->fetch_row()) 
{
    $tables[] = $row[0] ;
}
// Cycle through each  table
foreach($tables as $table)
{ 
    // Get content of each table
    $result = $mysqli->query('SELECT * FROM '. $table) ; 
    // Get number of fields (columns) of each table
    $num_fields = $mysqli->field_count  ;
    // Add table information
    $return .= "--\n" ;
    $return .= '-- Tabel structure for table `' . $table . '`' . "\n" ;
    $return .= "--\n" ;
    $return.= 'DROP TABLE  IF EXISTS `'.$table.'`;' . "\n" ; 
    // Get the table-shema
    $shema = $mysqli->query('SHOW CREATE TABLE '.$table) ;
    // Extract table shema 
    $tableshema = $shema->fetch_row() ; 
    // Append table-shema into code
    $return.= $tableshema[1].";" . "\n\n" ; 
    // Cycle through each table-row
    while($rowdata = $result->fetch_row()) 
    { 
        // Prepare code that will insert data into table 
        $return .= 'INSERT INTO `'.$table .'`  VALUES ( '  ;
        // Extract data of each row 
        for($i=0; $i<$num_fields; $i++)
        {   
        $return .= '"'.$mysqli->real_escape_string($rowdata[$i]) . "\"," ;
        }
        // Let's remove the last comma 
        $return = substr("$return", 0, -1) ; 
        $return .= ");" ."\n" ;
    } 
 $return .= "\n\n" ; 
}
// Close the connection
$mysqli->close() ;
$return .= 'SET FOREIGN_KEY_CHECKS = 1 ; '  . "\n" ; 
$return .= 'COMMIT ; '  . "\n" ;
$return .= 'SET AUTOCOMMIT = 1 ; ' . "\n"  ; 
//$file = file_put_contents($fileName , $return) ; 

$file = "backup/backup_" . date("Y-m-d H-i-s") . ".sql";
$handle = fopen($file, 'w+');
fwrite($handle, $return);
fclose($handle);
header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='.basename($file));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: private');
  header('Pragma: private');
  header('Content-Length: ' . filesize($file));
  ob_clean();
  flush();
  readfile($file);
  exit;
?>