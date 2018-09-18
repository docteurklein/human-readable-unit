# human units

## what?

A php library to format durations


## how?

```php
$duration = \HumanUnit\Duration::seconds(86462);

echo $duration->format(); // '1d 1m 2s'
