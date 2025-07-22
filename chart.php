<!doctype HTML>

<?php include "functions.php" ?>

<html>
    <head>
        <title>Lab 9</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include "header.php";
            include "navigation.php";
        ?>

        <?php
            print("<table>");
            print("<tr>");
            print("<th>Credit Hours</th>");
            print("<th>In County</th>");
            print("<th>Out of County</th>");
            print("<th>Out of State</th>");
            print("</tr>");
            for ($i = 1; $i <= 22; $i++){
                $IC = calculateTuition($i, "IC");
                $OC = calculateTuition($i, "OC");
                $OS = calculateTuition($i, "OS");
                print("<tr>");
                print("<td>$i</td>");
                print("<td>$IC</td>");
                print("<td>$OC</td>");
                print("<td>$OS</td>");
                print("</tr>");
            }
            print("</table>");
        ?>

        <?php
            include "footer.php";
        ?>
    </body>
</html>