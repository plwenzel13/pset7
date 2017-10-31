<form action="sell.php" method="post">
    <fieldset>
        You have:
        <div class="form-group">
            <select name="symbol" class="form-control" onchange="(this.form)">
                <?php foreach($positions as $position): ?>
                
                <option value="<?= $position['symbol']  ?>"><?=$position['name'] . " | " . strtoupper($position['symbol']) . " | Qty of Shares: " . $position["shares"] ?></option>
                
                <?php endforeach ?>
                
              <!--?
            //     foreach($positions as $position)
            //     {
            //         echo ('<option value="'.$position['shares'] . $position['symbol'] . '">' . $position['shares'] . ' shares of: ' . $position['name'] . '</option>');
            //         // echo ('<option value="'. $position['symbol'] . '">' . $position['name'] . '</option>');
            //         // echo ('<option value="'.$position['shares'] . $position['symbol'] . '">' . $position['shares'] . " shares of: " . $position['name'] . '</option>');
            //     }
            //   -->
            </select>
            
<!--        </div>-->
<!--<div class="id">-->
        <!--You have <strong>$position["shares"]?></strong> shares of <strong>$position['name']</strong> stock.-->
<!--        </div>-->

        <div>
        <br>
        How many would you like to sell?
        </div>
        <div class="form-group">
                <input autocomplete="off" autofocus class="form-control" name="shares" placeholder="# of shares to sell" type="text"/>
            </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">SELL</button>
        </div>
    </fieldset>
</form>

<!--echo ('<option value="' .$position['shares'] . $position['symbol'] . '">' . $position['shares'] "of" . $position['name'] . '</option>');-->
                    <!--echo ('<option value="' . $position['symbol'] . '">' . $position['name'] . '</option>');-->
