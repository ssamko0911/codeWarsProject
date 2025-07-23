<?php declare(strict_types=1);

namespace App\task200\entity;

final class AtbashCipher
{
    private bool $isUpperCaseAlphabet = false;

    public function __construct(
        private string $alphabet,
    ) {
    }

    public function isUpperCaseAlphabet(): bool
    {
        return $this->isUpperCaseAlphabet;
    }

    public function setIsUpperCaseAlphabet(bool $isUpperCaseAlphabet): void
    {
        $this->isUpperCaseAlphabet = $isUpperCaseAlphabet;
    }

    public function getAlphabet(): string
    {
        return $this->alphabet;
    }

    public function encode(string $str): string
    {
        if (ctype_upper($this->alphabet)) {
            $this->setIsUpperCaseAlphabet(true);
        }

        return $this->transform($str);
    }

    public function decode(string $str): string
    {
        return $this->transform($str);
    }

    private function transform(string $str): string
    {
        $transformed = '';

        for ($i = 0; $i < strlen($str); $i++) {
            if (($this->isUpperCaseAlphabet() ? ctype_lower($str[$i]) : ctype_upper($str[$i])) || is_numeric($str[$i])) {
                $transformed .= $str[$i];
                continue;
            }

            $position = strpos($this->getAlphabet(), $str[$i]);

            if ($position !== false) {
                $transformed .= $this->getAlphabet()[strlen($this->getAlphabet()) - $position - 1];
            }
        }

        return $transformed;
    }
}
