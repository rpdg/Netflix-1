<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
?>
<?php 
$nome = $_POST['nomeanime'];
?>

<?Php
if(empty($nome)){
	echo "";
}else{?>
<?php
$animels2 = DBRead( 'series', "WHERE name LIKE '%$nome%' ORDER BY id DESC LIMIT 15" );
 if (!$animels2)
	echo "";
else 
	foreach ($animels2 as $animel):
 ?>
 <?php
 $videoid = $animel['id'];
$videols2 = DBRead( 'videos', "WHERE id and idserie = '". $videoid ."' ORDER BY id DESC LIMIT 1" );
 if (!$videols2)
	echo "";
else 
	foreach ($videols2 as $videol):
 ?>
 
 <a class="eoq" href='/watch.php?id=<?php echo $videol['id']; ?>'><li class='buscaright'><img src='<?php echo $animel['foto']; ?>' class='avatar6'/><div class='name'><?php echo $animel['name']; ?></div></li></a>
 
 <?php endforeach; endforeach;?>
<?php }?>