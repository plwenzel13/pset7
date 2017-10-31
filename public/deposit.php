<?php
    // configuration
    require("../includes/config.php"); 
    // if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // if deposit amount is invalid (not a whole positive integer)
        if (preg_match("/^\d+$/", $_POST["deposit"]) == false)
        {
            // apologize
            apologize("You must enter a whole, positive integer.");
        }
        
        // set transaction type
        $transaction = "DEPOSIT";
        
        // update user's cash
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["deposit"], $_SESSION["id"]);
        
        // update history
        CS50::query("INSERT INTO history (user_id, transaction, deposit) VALUES (?, ?, ?)", $_SESSION["id"], $transaction, $_POST["deposit"]);
        
        // redirect to portfolio 
        redirect("/");
    }
    
    // if form hasn't been submitted
    else
    {
        // render portfolio (pass in new portfolio table and cash)
        render("deposit_form.php", ["title" => "Deposit Form"]);
    }
?>