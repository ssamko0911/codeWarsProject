<?php declare(strict_types=1);

// https://www.codewars.com/kata/59098c39d8d24d12b6000020

const LINE_SEPARATOR_TPL = '+---';
const LINE_SEPARATOR_END_TPL = '+';
const LINE_DOT_TPL = '| o ';
const LINE_DOT_END_TPL = '|';

function dot(int $width, int $height): string
{
    $dots = generateLine(
        $width,
        LINE_SEPARATOR_TPL,
        LINE_SEPARATOR_END_TPL
    );

    for ($i = 0; $i < $height; $i++) {
        $dots .= generateLine(
            $width,
            LINE_DOT_TPL,
            LINE_DOT_END_TPL
        );

        $dots .= generateLine(
            $width,
            LINE_SEPARATOR_TPL,
            LINE_SEPARATOR_END_TPL
        );
    }

    return trim($dots);
}

function generateLine(int $width, string $template, string $lineEnd): string
{
    $line = '';
    for ($i = 0; $i < $width; $i++) {
        if ($i !== $width - 1) {
            $line .= $template;
        } else {
            $line .= $template . "$lineEnd\n";
        }
    }

    return $line;
}
