<?php
//close the connection
mysql_close($dbhandle);
echo "<!--Disconnected from MySQL database " . $db_name . "-->";
?>