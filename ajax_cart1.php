<?php
include('db.php');
session_start();
if (isset($_SESSION['user_ID'])) {
	$sql = "SELECT 
ord_det.*,
prod.prod_Img,
prod.prod_Name,
ord_det.or_Price,
ord_det.or_Qnty,
(ord_det.or_Price * ord_det.or_Qnty) item_x,
ord.or_Date
FROM `order`  ord 
INNER JOIN order_detail ord_det ON ord_det.serial_ID = ord.serial_ID 
INNER JOIN products prod ON prod.prod_ID = ord_det.prod_ID 
WHERE ord.cus_ID = '".$_SESSION['user_ID']."'";
$result = $conn->query($sql);
$_SESSION['item_cart_count'] =  $result->num_rows;
if ($result->num_rows > 0) {
    // output data of each row
    ?>
    <table class="table table-bordered">
		  <thead>
		    <tr>
		      <th>Or Number</th>
		      <th>Name</th>
		      <th>Qty</th>
		      <th>Price</th>
		      <th>Sub-total</th>
		    </tr>
		  </thead>
		  <tbody>
    <?php
    while($row = $result->fetch_assoc()) {
        $serial_ID = $row["serial_ID"];
        ?>
		<tr>
		  <td><?php echo $row["or_ID"]?></td>
		  <td><?php echo $row["prod_Name"]?></td>
		  <td><?php echo $row["or_Qnty"]?></td>
		  <td>₱ <?php echo number_format($row["or_Price"],2)?></td>
		  <td>₱ <?php echo number_format($row["item_x"],2)?></td>
		</tr>
        <?php
        

    }
    $sql = "SELECT sum((or_Qnty * or_Price)) total_sum FROM `order_detail` WHERE serial_ID = $serial_ID";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $total_sum = $row["total_sum"];
	        $_SESSION['item_total_sum'] = $total_sum;
	    }
	} else {
	    echo "0 results";
	}
    ?>
		  </tbody>
		  <tfoot>
		  	<tr>
			  <td></td>
			  <td></td>
			  <td></td>
			  <td><b>Sub-total Sum:<br>Shipping Fee:<br>Total:</b></td>
			  <td><?php 
			  	if (isset($total_sum)) 
			  	{
			  	echo "₱ ".number_format($total_sum,2);
			  	echo "<br>";
			  	echo "₱ 250.00";
			  	echo "<br>";
				echo "₱ ".number_format($total_sum+250.0,2);
				}
				else{
					echo "0.00";
				}
			 ?></td>
		  	</tr>
		  </tfoot>
		</table>
		<?php
		if (isset($total_sum)) {
			?>
		
            <div class="buttons">
              <div class="right">
                <input type="button" class="button" id="button-confirm" value="Confirm Order">
              </div>
            </div>
		<?php
		}
		
} else {
    echo "0 results";
}


$conn->close();



}
else{

	$user_IP =$_SESSION['user_IP'];
	$sql = "SELECT 
	ord_det.*,
	prod.prod_Img,
	prod.prod_Name,
	ord_det.or_Price,
	ord_det.or_Qnty,
	(ord_det.or_Price * ord_det.or_Qnty) item_x,
	ord.or_Date
	FROM `temp_order`  ord 
	INNER JOIN temp_order_detail ord_det ON ord_det.serial_ID = ord.serial_ID 
	INNER JOIN products prod ON prod.prod_ID = ord_det.prod_ID 
	WHERE IP = '$user_IP'";
	$result = $conn->query($sql);
	$_SESSION['item_cart_count'] =  $result->num_rows;
	
	?>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th>Or Number</th>
	      <th>Name</th>
	      <th>Qty</th>
	      <th>Price</th>
	      <th>Sub-total</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	if ($result->num_rows > 0) {
	  		while($row = $result->fetch_assoc()) {
        	$serial_ID = $row["serial_ID"];
	  		 ?>
		  <tr>
	  		<td><?php echo $row["or_ID"]?></td>
			<td><?php echo $row["prod_Name"]?></td>
			<td><?php echo $row["or_Qnty"]?></td>
			<td>₱ <?php echo number_format($row["or_Price"],2)?></td>
			<td>₱ <?php echo number_format($row["item_x"],2)?></td>
	  	</tr>
		  <?php 
		  }
		  	 $serial_ID;
		    $sql = "SELECT sum((or_Qnty * or_Price)) total_sum FROM `temp_order_detail` WHERE serial_ID = '$serial_ID'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        $total_sum = $row["total_sum"];
			        $_SESSION['item_total_sum'] = $total_sum;
			    }
			} else {
			}
		}
		else {
		}
	  	?>
	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td></td>
	  		<td></td>
	  		<td></td>
			<td><b>Total Sum:</b></td>
			<td>₱ <?php 
			if (isset($total_sum)) {
				echo number_format($total_sum,2);
			}
			else{
				echo "0.00";
			}
			
			?></td>
	  	</tr>
	  </tfoot>
	</table>
	<?php 
	if (isset($total_sum)) {
		?>
		
            <div class="buttons">
              <div class="right">
                <input type="button" class="button" id="button-confirm" value="Confirm Order">
              </div>
            </div>
		<?php
	}
}
?>

</div>
