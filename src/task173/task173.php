<?php declare(strict_types=1);

//https://www.codewars.com/kata/59d727d40e8c9dd2dd00009f/train/php

const REPORT_LINE_PATTERN = "/[^a-zA-Z0-9\s.]/";
const FLOAT_AMOUNT_PATTERN = "/\d+(\.\d+)?/";
const REPORT_HEADER = "Original Balance: %.2f\n";
const REPORT_RECORD_TEMPLATE = "%s%s Balance %s\n";
const REPORT_FOOTER = "Total expense  %.2f\nAverage expense  %.2f";
const DECIMAL_NUMBER = 2;
function balance(string $book): string
{
    $totalExpense = 0;

    $bookAsArray = getBookAsArray($book);
    preg_match_all(FLOAT_AMOUNT_PATTERN, $bookAsArray[0], $matches);

    $balance = (float) end($matches[0]);
    $filtered = filterBookRecords($bookAsArray);

    $report = generateReportHeader($balance);

    foreach ($filtered as $record) {
        if (preg_match_all(FLOAT_AMOUNT_PATTERN, $record, $matches)) {
            $expenseAmount = (float) $matches[0][1];
            $totalExpense += $expenseAmount;
            $balance -= $expenseAmount;
            $report .= generateReportRecord($record, $balance);
        }
    }

    $averageExpense = $totalExpense / count($filtered);
    $report .= generateReportFooter($totalExpense, $averageExpense);

    return $report;
}

/**
 * @return string[]
 */
function getBookAsArray(string $book): array
{
    $bookAsArray = explode("\n", trim($book));

    return array_values(
        array_filter($bookAsArray,
            static function (string $item): bool {
                return 1 !== strlen($item);
            }
        )
    );
}

/**
 * @param string[] $book
 * @return string[]
 */
function filterBookRecords(array $book): array
{
    $filtered = [];

    for ($i = 1; $i < count($book); $i++) {
        $cleaned = str_replace(["\r", "\n"], '',  $book[$i]);
        $filtered[] = preg_replace(REPORT_LINE_PATTERN, "", $cleaned);
    }

    return $filtered;
}

function generateReportHeader(float $balance): string
{
    return sprintf(REPORT_HEADER, $balance);
}

function generateReportRecord(string $record, float $balance): string
{
    preg_match_all(FLOAT_AMOUNT_PATTERN, $record, $matches);

    if (empty($matches[0])) {
        return '';
    }

    $amountStr = end($matches[0]);
    $amount = (float) $amountStr;

    $formattedAmount = number_format($amount, DECIMAL_NUMBER, '.', '');
    $formattedBalance = number_format($balance, DECIMAL_NUMBER, '.', '');

    $recordWithoutAmount = preg_replace('/' . preg_quote($amountStr, '/') . '(?!.*' . preg_quote($amountStr, '/') . ')/', '', $record, 1);

    return sprintf(REPORT_RECORD_TEMPLATE, $recordWithoutAmount, $formattedAmount, $formattedBalance);
}

function generateReportFooter(float $balance, float $averageExpense): string
{
    return sprintf(REPORT_FOOTER, $balance, $averageExpense);
}
