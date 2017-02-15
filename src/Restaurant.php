<?php
namespace Meals;
class Restaurant
{
    protected $name;
    protected $rating;
    protected $capacity;
    protected $cuisines;

    public function setName(string $name = '')
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity)
    {
        $this->capacity = $capacity;
    }

    public function getRating(): int
    {
        return (int)$this->rating;
    }

    public function setRating(int $rating)
    {
        if ($rating > 5 || $rating < 1) {
            throw new Exception('rating must be between 1 and 5');
        }
        $this->rating = $rating;
    }

    public function addCuisineType(string $type, int $capacity = 0)
    {
        $this->cuisines[$type] = $capacity;
    }

    public function getCuisineType(string $type): int
    {
        if (array_key_exists($type, $this->cuisines)) {
            return $this->cuisines[$type];
        } else {
            return 0;
        }
    }
}
