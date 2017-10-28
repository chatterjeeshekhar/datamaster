<?php

// Create an object to convert Australian Dollars to Euros.
    require 'fx.php';
    $fx = new ForeignExchange('INR', 'USD');

// This function formats a value with 2 decimal places.
    function fmtMoney($amount)
    {
        return sprintf('.%.2f', $amount);
    }

    $auPrice = 600;

    echo '<p>Your price is INR '. fmtMoney($auPrice)
        .' which is approximately &euro;'. fmtMoney($fx->toForeign($auPrice)) .'</p>';
?>