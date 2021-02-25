<?php

function formatPriceToDatabase($price)
{
    if($price == 'R$'){
        return $price = null;
    }
    return str_replace(['.',','], ['','.'], $price);
}