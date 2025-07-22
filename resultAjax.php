<?php
    include "functions.php";
    $credits = $_REQUEST["credits"];
    $residency = $_REQUEST["residency"];
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