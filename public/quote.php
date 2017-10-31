<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Please enter a valid stock symbol");
        }
        
        else if(lookup($_POST["symbol"]) == false)
        {
             apologize("Invalid stock symbol");
        }
        
        else
        {
            // lookup stock info
            $stock = lookup($_POST["symbol"]);
            render("quote_display.php", ["title" => "Quote"]);
        }
    }
    
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }
?>
