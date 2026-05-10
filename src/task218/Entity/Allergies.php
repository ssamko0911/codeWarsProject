<?php declare(strict_types=1);

//https://www.codewars.com/kata/58be35e9e36224a33f000023/train/php

namespace App\task218\Entity;
class Allergies
{
    /** @var int[] */
    private const array ALLERGY_SCORES = [
        'eggs' => 1,
        'peanuts' => 2,
        'shellfish' => 4,
        'strawberries' => 8,
        'tomatoes' => 16,
        'chocolate' => 32,
        'pollen' => 64,
        'cats' => 128,
    ];

    private const int SCORE_THRESHOLD = 256;

    private int $score;

    public function __construct(int $score)
    {
        if (!$this->isValidScore($score)) {
            throw new \Exception("Invalid score");
        }

        $this->score = $score % self::SCORE_THRESHOLD;
    }

    public function isAllergicTo(string $allergen): bool
    {
        $allergies = $this->getAllergies();

        return in_array($allergen, $allergies, true);
    }

    /**
     * @return string[]
     */
    public function getAllergies(): array
    {
        if (0 === $this->score) {
            return [];
        }

        $reducedScore = $this->score;
        $allergies = [];

        foreach (array_reverse(self::ALLERGY_SCORES) as $allergen => $score) {
            if ($reducedScore >= $score) {
                $allergies[] = $allergen;
                $reducedScore -= $score;
            }
        }

        sort($allergies, SORT_STRING);

        return $allergies;
    }

    private function isValidScore(mixed $score): bool
    {
        return is_int($score) && $score >= 0;
    }
}
