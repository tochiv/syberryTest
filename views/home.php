<?php

foreach ($data as $el) {

    echo date("|l|", strtotime($el[0]['date']));
    foreach ($el as $item) {
         echo $item['name'] . "(" . $item['hours'] . "); ";
    }
    echo "\n </br>";
}