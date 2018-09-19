# human units

## what?

A php library to format units.


## how?

### Duration

```php
$duration = \HumanUnit\Duration::seconds(86462);
echo $duration->humanize(); // '1d 1m 2s'
```

### Distance

```php
$distance = \HumanUnit\Distance::nano_meters(intval(2 + 1e9 + 1e12));
echo $distance->humanize(); // '1km 1m 2nm'
```

### From human representation

```php
$distance = \HumanUnit\Distance::from_human('1km 1m 2nm');
echo $distance->humanize(); // '1km 1m 2nm'
```

### Comparisons

```php
$distance1 = \HumanUnit\Distance::from_human('1km');
$distance2 = \HumanUnit\Distance::from_human('1000m');
assert($distance1 == $distance2);
```
