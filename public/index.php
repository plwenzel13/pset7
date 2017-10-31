<?php

    // configuration
    require("../includes/config.php"); 

    // query user's portfolio
    $id = $_SESSION["id"];
    $rows =	CS50::query("SELECT symbol,shares FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
    $bal = CS50::query("SELECT cash FROM users WHERE id = ?",$_SESSION["id"]);
    $_SESSION["balance"] = $bal[0]["cash"];
    
	// create new array to store all info for portfolio table
	$positions = [];
// 	var_dump($rows);
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "cash" => $row["shares"] * $stock["price"]
            ];
        }
    }
    
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio" ]);
?>