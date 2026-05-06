<?php declare(strict_types=1);

//https://www.codewars.com/kata/5899a4b1a6648906fe000113/train/php

/**
 * @param array<int, array<int, string>> $routes
 * @return string
 */

function find_routes(array $routes): string
{
    $startingRouteIndex = getStartingRoute($routes);

    $routesAsString = implode(', ', $routes[$startingRouteIndex]);

    $nextCountry = $routes[$startingRouteIndex][1];

    unset($routes[$startingRouteIndex]);

    return trim(getRoutesRecursive($routes, $routesAsString, $nextCountry));
}

/**
 * @param array<int, array<int, string>> $routes
 * @return int
 */
function getStartingRoute(array $routes): int
{
    $firstTrip = 0;

    $startingPoints = array_column($routes, 0);
    $endingPoints = array_column($routes, 1);

    foreach ($startingPoints as $key => $route) {
        if (!in_array($route, $endingPoints)) {
            $firstTrip = $key;
        }
    }

    return $firstTrip;
}

/**
 * @param array<int, array<int, string>> $routes
 * @param string $routesAsString
 * @param string $nextCountry
 * @return string
 */
function getRoutesRecursive(array $routes, string $routesAsString, string $nextCountry): string
{
    $nextCountryArray = array_filter(
        $routes,
        static function (array $countryPair) use ($nextCountry): bool {
            return $nextCountry === $countryPair[0];
        }
    );

    if ([] === $nextCountryArray) {
        return $routesAsString;
    }

    $nextCountry = $routes[array_key_first($nextCountryArray)][1];
    $routesAsString .= ', ' . $nextCountry;

    unset($routes[array_key_first($nextCountryArray)]);

    return getRoutesRecursive($routes, $routesAsString, $nextCountry);
}
