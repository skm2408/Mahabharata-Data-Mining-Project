<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM samvad WHERE word like '" . $_POST["keyword"] . "%'";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["word"]; ?>');"><?php echo $country["word"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>