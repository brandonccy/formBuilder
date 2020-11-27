<?php if($cate==""){ ?>
	<?php 
	$cateURL = "pages/".$page."/includes/main.php";
	include($cateURL);
	?>
<?php }else{ ?>
	<?php
	$cateURL="pages/".$page."/includes/{$cate}.php";
	if(file_exists($cateURL)){
		include($cateURL);	
	}else{
		echo '<div class="alert alert-danger">Module file not found!</div>';
	}
	?>
<?php } ?>