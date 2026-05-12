<?php declare(strict_types=1);

namespace App\task222\Entity;

final readonly class Phone
{
    public function __construct(
        private KeypadMapper $keypadMapper,
        /** @var Button[] */
        private array $buttonsPressed,
    )
    {
    }

    public function getTextMessage(): string
    {
        $message = '';

        foreach ($this->buttonsPressed as $button) {
            $message .= $this->keypadMapper->getCharacter($button);
        }

        return $message;
    }
}