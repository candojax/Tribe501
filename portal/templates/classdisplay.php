<?php
echo "<div class='span8'>";
while ($r=$stmt->fetch_assoc()) {
echo "<div class='row well'>";
echo "<div class='span5'>";
echo "<h4>" .$r['clss-name']. " - Level " .$r['clss-lvl'];
echo "</h4>";
echo "<p>Dates: " .date("F d, Y", strtotime($r['clss-begin'])). " - " .date("F d, Y", strtotime($r['clss-over'])). "</p>";
echo "<p>Time: " .date("h:m A", strtotime($r['clss-stime'])). " - " .date("h:m A", strtotime($r['clss-ftime'])). "</p>";
echo "<p>Instructor: " .$r['clss-inst']. "</p>";
echo "<p>Program: " .$r['clss-prgm']. "</p>";
echo "<p>Age Group: " .$r['clss-age']. "</p>";
echo "<p>Seats Available: " .$r['clss-seats']. "</p>";
echo "<p><a class='btn' href='?action=classdetails&class=" .$r['clss-id']. "'>View details &raquo;</a></p>";
echo "</div><div class='span2'><p>"; ?>

				<form method="post" action="?action=checkout" class="jcart">
					<fieldset>
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
						<input type="hidden" name="my-item-id" value="<?php echo $r['clss-id']; ?>" />
						<input type="hidden" name="my-item-name" value="<?php echo $r['clss-name']. " - Lv. " .$r['clss-lvl']; ?>" />
						<input type="hidden" name="my-item-price" value="<?php echo $r['clss-price']; ?>" />
						<input type="hidden" name="my-item-url" value="?action=classdetails&class=<?php echo $r['clss-id']; ?>" />

						<ul class="unstyled">
							<li><strong><?php //echo $r['clss-name']. " - Lv. " .$r['clss-lvl']; ?></strong></li>
							<li>Price: $<?php echo $r['clss-price']; ?></li>
							<li>
								<label>Qty: <input type="text" name="my-item-qty" value="1" class="input-mini" /></label>
							</li>
						</ul>

						<input type="submit" class="btn" name="my-add-button" value="add to cart"/>
					</fieldset>
				</form>

<?php
//<img class='pull-right' src='" .$r["clss-img"]. "'>
echo "</p></div></div>";
}
echo "</div>";
?>
