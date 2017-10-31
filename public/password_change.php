<?php
    // configuration
    require("../includes/config.php"); 
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["old_password"]))
        {
            apologize("You must provide your old password.");
        }
        else if (empty($_POST["new_password"]))
        {
            apologize("You must provide a password.");
        }
        else if($_POST["confirmation"] != $_POST["new_password"])
        {
            apologize("New Passwords do not match");
        }
        
        // set transaction type
        $transaction = "PW UPDATED";
        
        $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
            // compare hash of user's input against hash that's in database
            if (crypt($_POST["old_password"], $row["hash"]) == $row["hash"])
            {
               // Now change the password
               $change = CS50::query("UPDATE users SET hash=?",crypt($_POST["new_password"]));
               render("password_display.php",["title" => "Sucess!!"]);
               
            }
            else
            {
                apologize("Wrong Old Password provided");
            }
        }
        // update history
        CS50::query("INSERT INTO history (user_id, transaction) VALUES (?, ?)", $_SESSION["id"], $transaction);
    }
    
    else
    {
        // else render form
        render("password_change_form.php", ["title" => "Change Password"]);
    }
    
?>