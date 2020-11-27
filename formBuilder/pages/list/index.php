<div class="row">
	<div class="container">
		<form method="get" action="">
			<input type="hidden" name="page" value="table">
			Select a table to start
			<select name="formTable" onchange="form.submit()" class="form-control" required="required">
				<option value="">Please select</option>
			<?php
			$query="SHOW TABLES FROM formBuilder";
			$result = mysqli_query($con, $query);
			while($row = mysqli_fetch_array($result)){ ?>
				<?php if($row[0]<>"db_forms"&&$row[0]<>"db_forms_selects"&&$row[0]<>"admin"&&$row[0]<>"db_tables"){ ?>
					<option value="<?=$row[0]?>"><?=$row[0]?></option>
				<?php } ?>
			<?php } ?>
			</select>
		</form>
	</div>
</div>