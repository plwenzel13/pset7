<div id="middle">
<?php
    $symbol = $_POST["symbol"];
    $lookup_results = lookup($symbol);
    $name = $lookup_results["name"];
    $price = $lookup_results["price"];
    // var_dump($name);
?>

   A share of <?=$name?> (<?=$_POST["symbol"]?>) costs <strong>$<?=number_format($price, 2)?></strong>
</div>