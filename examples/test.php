<?php declare(strict_types=1);

require(__DIR__.'/../vendor/autoload.php');

$duration = \HumanUnit\Duration::seconds(86462);
echo $duration->format(), "\n";

$distance = \HumanUnit\Distance::nano_meters(intval(2 + 1e9 + 1e12));
echo $distance->format(), "\n";

$distance1 = \HumanUnit\Distance::from_human('1km');
$distance2 = \HumanUnit\Distance::from_human('1000m');
$distance3 = \HumanUnit\Distance::from_human('500m');

assert($distance1 == $distance2);
assert($distance1 > $distance3);

try {
    \HumanUnit\Distance::from_human('1 2 3m');
}
catch(\InvalidArgumentException $e) {
    echo $e->getMessage(), "\n";
}

try {
    \HumanUnit\Distance::from_human('1stahp');
}
catch(\InvalidArgumentException $e) {
    echo $e->getMessage(), "\n";
}

$duration = \HumanUnit\Duration::nano_seconds(intval(1e30));
echo $duration->format(), "\n";