<?php

function presentPrice($price)
{
    return '$'.$price / 100;
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}