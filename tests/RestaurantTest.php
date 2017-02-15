<?php

class RestaurantTest extends PHPUnit_Framework_TestCase
{
    protected $restaurant;

    protected function setUp()
    {
        $this->restaurant = new Meals\Restaurant;
    }

    public function testNameValue()
    {
        $this->restaurant->setName('TEST');
        $this->assertEquals($this->restaurant->getName(), 'TEST');
    }

    public function testCapacityValue()
    {
        $this->restaurant->setCapacity(50);
        $this->assertEquals($this->restaurant->getCapacity(), 50);
    }

    public function testRatingValue()
    {
        $this->restaurant->setRating(5);
        $this->assertEquals($this->restaurant->getRating(), 5);
    }

    public function testCuisineTypeValue()
    {
        $this->restaurant->addCuisineType('vegetarian', 50);
        $this->assertEquals($this->restaurant->getCuisineType('vegetarian'), 50);
    }
}
