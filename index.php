<?php 
if(isset($_GET['f'])){
	$s=file_get_contents($_GET['f']);
	echo nl2br($s);
}else{
/*
<tr>
	<td>Attack Editor</td>
	<td>xxx</td>
</tr>
*/
$dir=".";
$sList='';
	if (is_dir($dir)){
	  if ($dh = opendir($dir)){
		while (($file = readdir($dh)) !== false){
			$file2=str_replace(".md","", $file);
			$ext= substr($file,-3);
			if($file2!=$file){
				echo "<br/><a href='?f=" . $file . "'>$file2 </a>";
			}
			
			if($ext=='.md'){
				$sFile = file_get_contents($file);
				$ar = explode("\n", $sFile);
				$title = trim(str_replace("# ","", $ar[0]));
				$sList.="
<tr>
	<td><a href='{$file}'>$title</a></td>
	<td>$ar[1]</td>
</tr>";
			}
				
		}
		closedir($dh);
	  }
	}
	
	echo nl2br(htmlentities($sList));
}