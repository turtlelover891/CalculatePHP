<!doctype HTML>
<?php include "functions.php" ?>
<html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include "header.php";
            include "navigation.php";
        ?>

        <?php
            $credits = $_POST["credits"];
            $residency = $_POST["residency"];
            $valid=validate($credits, $residency);
            
            if ($valid){
                $tuition = calculateTuition($credits, $residency);
                print("<table><tr><td>Resicency Status </td>");
                if ($residency == "IC"){
                    print("<td>In County</td></tr>");
                }
                if ($residency == "OC"){
                    print("<td>Out of County</td></tr>");
                }
                if ($residency == "OS"){
                    print("<td>Out of State</td></tr>");
                }
                print("<tr><td>Credit Hours </td><td>$credits</td></tr>");
                print("<tr><td>Tuition </td><td>$$tuition</td></tr></table>");
            }
        
        
        ?>

        <?php
            include "footer.php";
        ?>
    </body>
</html>