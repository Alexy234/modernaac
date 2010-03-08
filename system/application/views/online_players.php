<?php
require_once("system/application/config/create_character.php");
echo form_open("character/online", array('method'=>'get'));
if(count($config['worlds']) >1) {
	echo "<label>World</label><select name='world'>";
	echo "<option value=''>All</optino>";
	foreach($config['worlds'] as $key=>$value) {
		echo "<option value='$key'>$value</optino>";
	}
	echo "</select><br>";
	
}
echo "<label>Sort by</label><select name='sort'>";
echo "<option value=''>None</option>";
echo "<option value='level'>Level</option>";
echo "<option value='Vocation'>Profession</option>";
echo "<option value='name'>Name</option>";
echo "</select>";
echo "<br><label></label><input type='submit' value='Order'>";
echo "</form>";

echo "</form>";
if(count($players) > 0) {
	echo "<table width='100%'>";
	echo "<tr><td><center><b>Name</b></center></td><td><center><b>Level</b></center></td><td><center><b>Vocation</b></center></td><td><center><b>World</b></center></td></tr>";
	foreach($players as $row) {
		if(in_array(strtolower($row->name), $config['restricted_names'])) continue;
		echo "<tr><td><center><a href='../character/view/".$row->name."'>".$row->name."</a></center></td><td><center>".$row->level."</center></td><td><center>".$config['vocations'][$row->vocation]."</center></td><td><center>".$config['worlds'][$row->world_id]."</center></td></tr>";
	}
	echo "</table>";
}
else
	alert("There is no players online.");
?>
