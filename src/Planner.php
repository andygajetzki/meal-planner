<?php
namespace Meals;
class Planner
{
    private $strategy;

    public function __construct(array $requirements, array $restaurants, Strategy\StrategyInterface $strategy)
    {
        $strategy->setRequirements($requirements);
        $strategy->setRestaurants($restaurants);
        $this->strategy = $strategy;
    }

    public function getPlan()
    {
        return $this->strategy->getPlan();
    }
}
