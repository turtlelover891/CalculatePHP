<?php
    function calculateTuition($credits, $residency){
        $rate = 0;
        if ($residency == "IC"){
            $rate = 164.03;
        }
        if ($residency == "OC"){
            $rate = 189.21;
        }
        if ($residency == "OS"){
            $rate = 340.78;
        }
        if ($credits < 13){
            return $rate * $credits;
        }
        if ($credits >= 13 && $credits < 19){
            return $rate * 13;
        }
        if ($credits >= 19){
            return $rate * ($credits - 5);
        }
    }

    function validate($credits, $residency){
        $valid = true;
        if ($credits == ""){
            $valid = false;
            print("<p>No value for Credits</p>");
        }
        else if (!is_numeric($credits)){
            $valid = false;
            print("<p>Credits must be a number</p>");
        }
        if ($residency == ""){
            $valid = false;
            print("<p>No value for residency</p>");
        }
        return $valid;
    }

?>