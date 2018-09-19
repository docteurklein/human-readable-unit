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

### Cardinality

```php
$quantity = \HumanUnit\Cardinality::kilo(1002);
echo $quantity->humanize(); // '1M 2k'
```

### Bit

```php
$memory_size = \HumanUnit\Bit::bytes(1024);
echo $memory_size->humanize(); // '1kB 24B'
```

## From human representation

```php
$distance = \HumanUnit\Distance::from_human('1km 1m 2nm');
echo $distance->humanize(); // '1km 1m 2nm'
```

### Comparisons

```php
$_1km = \HumanUnit\Distance::from_human('1km');
$_1000m = \HumanUnit\Distance::from_human('1000m');
$_500m = \HumanUnit\Distance::from_human('500m');
assert($_1km == $_1000m);
assert($_1km > $_500m);
```
