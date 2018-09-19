# human units

## what?

A php library to format units.


## how?

### Duration

```php
$duration = \HumanUnit\Duration::seconds(86462);
echo $duration->format(); // '1d 1m 2s'
```

### Distance

```php
$distance = \HumanUnit\Distance::nano_meters(intval(2 + 1e9 + 1e12));
echo $duration->format(); // '1km 1m 2nm'
```
