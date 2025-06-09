<?php

declare(strict_types = 1);

//https://www.codewars.com/kata/5e67ce1b32b02d0028148094/train/php

function generateTruthTable(callable $booleanFunction): string
{
    $reflection = new ReflectionFunction($booleanFunction);
    $name = getFunctionName($reflection);
    $paramNames = getParamNames($reflection);
    $combinations = getArgumentCombinations(count($paramNames));
    $table = generateTableHeader($paramNames, $name);
    $table .= generateTable($combinations, $booleanFunction);

    return $table;
}

function getFunctionName(ReflectionFunction $reflection): string
{
    return $reflection->isClosure()? 'f' : $reflection->getName();
}

/**
 * @param ReflectionFunction $reflection
 * @return string[]
 */
function getParamNames(ReflectionFunction $reflection): array
{
    $paramNames = [];
    foreach ($reflection->getParameters() as $param) {
        $paramNames[] = $param->getName();
    }

    return $paramNames;
}

/**
 * @param int $paramCount
 * @return array<int, array<int, string>>
 */
function getArgumentCombinations(int $paramCount): array
{
    $totalCombinations = pow(2, $paramCount);

    $combinations = [];
    for ($i = 0; $i < $totalCombinations; $i++) {
        $binaryString = str_pad(decbin($i), $paramCount, '0', STR_PAD_LEFT);
        $combinations[] = str_split($binaryString);
    }

    return $combinations;
}

/**
 * @param string[] $paramNames
 * @param string $functionName
 * @return string
 */
function generateTableHeader(array $paramNames, string $functionName): string
{
    return sprintf("%s\\t\\t%s(%s)\\n\\n",
        implode(" ", $paramNames),
        $functionName,
        implode(",", $paramNames)
    );
}

/**
 * @param array<int, array<int, string>> $combinations
 * @param callable $booleanFunction
 * @return string
 */
function generateTable(array $combinations, callable $booleanFunction): string
{
    $table = '';

    foreach ($combinations as $combination) {
        $table .= generateTableRow($combination, $booleanFunction);
    }

    return $table;
}

/**
 * @param string[] $combination
 * @param callable $booleanFunction
 * @return string
 */
function generateTableRow(array $combination, callable $booleanFunction): string
{
    return sprintf("%s\\t\\t%s\\n",
        implode(" ", $combination),
        call_user_func_array($booleanFunction, $combination) ? '1' : '0'
    );
}
