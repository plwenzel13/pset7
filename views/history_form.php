<table class="table table-striped">

    <thead>
        <tr>
            <td><strong>Transaction</strong></td>
            <td><strong>Date/Time</strong></td>
            <td><strong>Symbol</strong></td>
            <td><strong>Shares</strong></td>
            <td><strong>Price Per Share</strong></td>
            <td><strong>Deposit</strong></td>
            <td><strong>Withdrawl</strong></td>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($table as $row): ?>	
   
            <?= "<tr>" ?>
            <?= "<td>" . $row["transaction"] . "</td>" ?>
            <?= "<td>" . $row["datetime"] . "</td>" ?>
            <?= "<td>" . $row["symbol"] . "</td>" ?>
            <?= "<td>" . $row["shares"] . "</td>" ?>
            <?= "<td>" . "$" . number_format($row["price"], 2) . "</td>" ?>
            <?= "<td>" . "$" . number_format($row["deposit"], 2) . "</td>" ?>
            <?= "<td>" . "$" . number_format($row["withdrawl"], 2) . "</td>" ?>
            <?= "</tr>" ?>
    <?php endforeach ?>

    <tr>
        <td colspan="6">CASH</td>
        <td>$<?=number_format($cash[0]["cash"], 2)?></td>
    </tr>

    </tbody>

</table>