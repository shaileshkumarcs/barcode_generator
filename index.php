<?php 
include('include/header.php');
?>
<title>Barcode Generator in PHP</title>
<style>
div.barcodebox {
    border: 1px solid #ccc;
    padding: 20px 10px;
    border-radius: 5px;
    width: 200px;
    text-align: center;
}
img.barcode{
	max-width: 95%;
}
.item-text{
	text-align: center;
	line-height: 0px;
}

</style>
<?php include('include/container.php');?>
<div class="container">
	<h2>Barcode Generator in PHP</h2>	
	<br>
	<br>
	<div class="row">	
		<div class="col-md-4">
			<form method="post">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Product Name or Number</label>
							<input type="text" name="barcodeText" class="form-control" value="<?php echo @$_POST['barcodeText'];?>">
						</div>
					</div>		
				</div>	
				<div class="row">
				   <div class="col-md-6">
						<div class="form-group">
							<label>Barcode Type</label>
							<select name="barcodeType" id="barcodeType" class="form-control">
								<option value="codabar" <?php echo (@$_POST['barcodeType'] == 'codabar' ? 'selected="selected"' : ''); ?>>Codabar</option>
								<option value="code128" <?php echo (@$_POST['barcodeType'] == 'code128' ? 'selected="selected"' : ''); ?>>Code128</option>
								<option value="code39" <?php echo (@$_POST['barcodeType'] == 'code39' ? 'selected="selected"' : ''); ?>>Code39</option>
							</select> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						 <div class="form-group">
							 <label>Barcode Display</label>
							 <select name="barcodeDisplay" class="form-control" required>
								<option value="horizontal" <?php echo (@$_POST['barcodeDisplay'] == 'horizontal' ? 'selected="selected"' : ''); ?>>Horizontal</option>
								<option value="vertical" <?php echo (@$_POST['barcodeDisplay'] == 'vertical' ? 'selected="selected"' : ''); ?>>Vertical</option>
							 </select>
						 </div>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-7">
						<input type="hidden" name="barcodeSize" id="barcodeSize" value="20">
						<input type="hidden" name="printText" id="printText" value="true">
						<input type="submit" name="generateBarcode" class="btn btn-success form-control" value="Generate Barcode">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4">
		 <?php
		 for($i= 0; $i < 5; $i++){
			if(isset($_POST['generateBarcode'])) {
				$barcodeText = trim($_POST['barcodeText']);
				$barcodeType=$_POST['barcodeType'];
				$barcodeDisplay=$_POST['barcodeDisplay'];
				$barcodeSize=$_POST['barcodeSize'];
				$printText=$_POST['printText'];
				if($barcodeText != '') {
					echo '<h4>Barcode:</h4>';
					echo '<div class="barcodebox"><p class="item-text">Hello</p><img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/></div>';
				} else {
					echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
				}
			}
		}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

		?>
		</div>
	</div>		
	
</div>
<?php include('include/footer.php');?>
