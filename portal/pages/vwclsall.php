<?php
echo "<div class='span9'>";
$stmt=$mysqli->query("SELECT * FROM classes WHERE clss-inst = '".$q."'");
while ($r=$stmt->fetch_assoc()) {
echo "<div class='row well'>";
echo "<div class='span6'>";
echo "<h4>" .$r['clss-name']. " - Level " .$r['clss-lvl'];
echo "</h4><p>";
echo "Instructor: " .$r['clss-inst']. "</p>";
echo "<p>Program: " .$r['clss-prgm']. "</p>";
echo "<p>Age Group: " .$r['clss-age']. "</p>";
echo "<p>Seats Available: " .$r['clss-seats']. "</p>";
echo "<p><a class='btn' href='?action=classdetails&class=" .$r['clss-id']. "'>View details &raquo;</a></p>";
echo "</div><div class='span2'><p>"; ?>

				<form method="post" action="" class="jcart">
					<fieldset>
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
						<input type="hidden" name="my-item-id" value="ABC-123" />
						<input type="hidden" name="my-item-name" value="Soccer Ball" />
						<input type="hidden" name="my-item-price" value="25.00" />
						<input type="hidden" name="my-item-url" value="" />

						<ul>
							<li><strong>Soccer Ball</strong></li>
							<li>Price: $25.00</li>
							<li>
								<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
							</li>
						</ul>

						<input type="submit" name="my-add-button" value="add to cart" class="button" />
					</fieldset>
				</form>

<?php
//<img class='pull-right' src='" .$r["clss-img"]. "'>
echo "</p></div></div>";
}
echo "</div>";
?>
