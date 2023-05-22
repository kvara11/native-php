
            <div class="CheckoutCart">
                <ul class="Products">
<?php
foreach ($products as $i => $product) {
?>
                    <li><?php echo $product['quantity']; ?> x <?php echo $product['name']; ?></li>
<?php
}
?>
                </ul>
<?php
if ($url_parts[1] == 'shipping' || !isset($order)) {
?>
                <div class="Total">
                    <table>
                        <tr>
                            <td class="Label">Loading...</td>
                            <td class="Value"></td>
                        </tr>
                    </table>
                </div>
<?php
} else {
?>
                <div class="Totals">
                    <table>
<?php
    $ot_total = array();
    for ($x = 0; $x < count($order->totals); $x++) {
        if ($order->totals[$x]['code'] == 'ot_total') {
            $ot_total = $order->totals[$x];
            continue;
        }
?>
                        <tr>
                            <td class="Label"><?php echo $order->totals[$x]['title']; ?></td>
                            <td class="Value"><?php echo $order->totals[$x]['text']; ?></td>
                        </tr>
<?php
    }
?>
                    </table>
                </div>
                <div class="Total">
                    <table>
                        <tr>
                            <td class="Label">Total</td>
                            <td class="Value"><?php echo $ot_total['text']; ?></td>
                        </tr>
                    </table>
                </div>
<?php
}
?>
            </div>
