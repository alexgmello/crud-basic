<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php
$dbname = 'php_02';
$dbuser = 'root';
$dbpass = 'root';
$dbhost = 'localhost';
$link = mysqli_connect("localhost", "root", "root") or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($link, $test_query);
$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
$tblCnt++;
#echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
echo "There are no tables<br />\n";
} else {
echo "There are $tblCnt tables<br />\n";
}
?>
