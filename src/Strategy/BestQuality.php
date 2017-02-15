<?php
namespace Meals\Strategy;
class BestQuality implements StrategyInterface
{
    private $restaurants;
    private $requirements;

    public function setRestaurants($restaurants)
    {
        $this->restaurants = $restaurants;
    }

    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    private function sortRestaurantsByRating()
    {
        usort($this->restaurants,
            function ($a, $b) {
                return $a->getRating() < $b->getRating();
            });
    }

    public function getPlan()
    {
        $this->sortRestaurantsByRating();
        $plan                  = [];
        $restaurant_capacities = [];
        foreach ($this->restaurants as $restaurant) {
            $plan[$restaurant->getName()]                  = [];
            $restaurant_capacities[$restaurant->getName()] = $restaurant->getCapacity();
        }
        foreach ($this->requirements as $type => $amount_required) {
            $qty_allocated = 0;
            foreach ($this->restaurants as $restaurant) {
                $cuisine_capacity = $restaurant->getCuisineType($type);
                while ($qty_allocated < $amount_required) {
                    if ($cuisine_capacity > 0 && $restaurant_capacities[$restaurant->getName()] > 0) {
                        if (!array_key_exists($type, $plan[$restaurant->getName()])) {
                            $plan[$restaurant->getName()][$type] = 0;
                        }
                        $plan[$restaurant->getName()][$type]++;
                        $qty_allocated++;
                        $cuisine_capacity--;
                        $restaurant_capacities[$restaurant->getName()]--;
                    } else {
                        continue 2;
                    }
                }
            }
        }

        return array_filter($plan);
    }
}



