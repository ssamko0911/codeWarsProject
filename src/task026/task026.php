<?php

declare(strict_types=1);

//https://www.codewars.com/kata/597770e98b4b340e5b000071/train/php

//TODO: rewrite into readable version;

function extractFileName(string $dirtyFileName): string {

    $fileNameData = explode('.', $dirtyFileName);

    return sprintf('%s.%s', getFileName($fileNameData), getFileExtension($fileNameData));
}

function getFileName(array $data): string
{
    $nameSeparator = '_';
    $offset = strpos($data[0], $nameSeparator) + 1;

    return substr($data[0], $offset);
}

/**
 * @param array $data
 * @return string
 */
function getFileExtension(array $data): string
{
    return $data[1];
}
