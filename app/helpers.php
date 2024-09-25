<?php


function currency($price)
{
    $fmt = new NumberFormatter( 'en', NumberFormatter::CURRENCY );
        
        return $fmt->formatCurrency($price, config('app.currency'));
}