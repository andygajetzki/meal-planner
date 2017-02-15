<?php
namespace Meals;
class RestaurantFactory
{
    static public function createFromJson(string $json)
    {
        $data       = json_decode($json, true);
        $restaurant = new Restaurant;
        $restaurant->setRating($data['rating']);
        $restaurant->setName($data['name']);
        $restaurant->setCapacity($data['capacity']);
        foreach ($data['cuisines'] as $cuisine) {
            $restaurant->addCuisineType($cuisine['type'], $cuisine['capacity']);
        }

        return $restaurant;
    }
}
