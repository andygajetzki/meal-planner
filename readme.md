# meal planner

plans meal orders

## installation

Clone and run composer install

## configuration

Configuration is done via JSON stored in files in the data directory. Each file in data/restaurants/ is used in the selection process, and the structure is as follows:

```
{
  "name": "Restaurant A",
  "rating": 2,
  "capacity": 40,
  "cuisines": [
	{
	  "type": "regular",
	  "capacity": 40
	}, {
	  "type": "vegetarian",
	  "capacity": 4
	}]
}
```

Requirements are defined in data/config.json:

```{
    "strategy": "BestQuality",
    "requirements" :
  	     {
 	        "regular": 24,
		    "gluten-free": 4,
            "vegetarian": 5
         }
   }
```


A strategy can be chosen that will optimize deliverables according to a desired outcome. Only 'BestQuality' is currently implemented. Examples of other strategies include 'Convenience'  and 'LowestCost'.

## Testing

Uses phpunit

