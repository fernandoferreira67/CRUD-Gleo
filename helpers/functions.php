<?php

function formatPriceToDatabase($price)
{
    return str_replace(['R$','.',','], ['','','.'], $price);
}