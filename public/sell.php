<?php
   // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Display the user's stock
        $rows = CS50::query("SELECT * FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
        // else render form
        $positions = [];
        
        
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "symbol" => $row["symbol"],
                    "shares" => $row["shares"]
                ];
            }
        }
        
        
        render("sell_form.php", ["positions" => $positions,"title" => "Sell",]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // set transaction type
        $transaction = "SOLD";
        
        // How many shares
        $share_rows = CS50::query("SELECT shares FROM portfolio WHERE user_id = ? AND symbol = ?",$_SESSION["id"],$_POST["symbol"]);
        $number_of_shares = $share_rows[0]["shares"];
         
        // How much money
        $stock= lookup($_POST["symbol"]);
        
            // Shares to sell
            // If the share are incorrect
            if ($number_of_shares < $_POST["shares"])
            {
                apologize("Enter a correct number of shares.");
            }
        
            else if (!preg_match("/^\d+$/", $_POST["shares"]))
            {
                if($_POST["shares"] != "ALL")
                    apologize("Enter a correct number of shares.");
            } 
            
            
            // When you sell somehting correct
            if ($number_of_shares > $_POST["shares"])
            {
                // calculate total cost (stock's price * shares)
                $cost = $_POST["shares"] * $stock["price"];
                // add total cost to cash
                CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $cost, $_SESSION["id"]);
                
                // remove stock from portfoli0
                CS50::query("UPDATE portfolio SET shares = shares - ? WHERE user_id = ? AND symbol = ?",  $_POST["shares"], $_SESSION["id"], $_POST["symbol"]);
                
                //update history
                CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price, deposit) VALUES (?, ?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $_POST["shares"], $stock["price"], $cost);
            }
            else if ($number_of_shares == $_POST["shares"] || $_POST["shares"] == "ALL" )
            {
                // calculate total cost (stock's price * shares)
                $cost = $share_rows[0]["shares"] * $stock["price"];
                
                // add total cost to cash
                CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $cost, $_SESSION["id"]);
                
                //Remove stock from portfolio
                $rows = CS50::query("DELETE FROM portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"],$_POST["symbol"]);
                
                //update history
                CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price, deposit) VALUES (?, ?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $_POST["shares"], $stock["price"], $cost);

            }
         
            
        
        
            redirect("/");
    }
    
    
?>