<?php

require_once("vendor/autoload.php");

$config  = json_decode(file_get_contents("data/config.json"), true);

/*
  Meal Planner strategy
   Planner\Strategy\BestQuality - Favour restaurant rating when planning meals
 */

$strategy = sprintf('Meals\Strategy\%s', $config['strategy']);


/*
  load restaurant data
 */

$restaurants = [];
foreach(glob('data/restaurants/*') as $restaurant) {
    $restaurants[] = Meals\RestaurantFactory::createFromJson(file_get_contents($restaurant));
}

/*
   load the meal planner with a strategy
 */

$planner = new Meals\Planner($config['requirements'], $restaurants, new $strategy);


/*
   output
 */

foreach ($planner->getPlan() as $restaurant => $order_lines) {

    echo $restaurant . ":\n";
    foreach ($order_lines as $cuisine => $amount_required) {
        echo ' ' . $cuisine . ': ' . $amount_required . "\n";   

    }
}
