<?php

class Card
{
    public function __construct(
        public string $card_name,
        public float $carbon,
        public string $description,
        public string $image,
    )
    {
    }
    public function verifyInput(): bool
    {
        $isValid = true;

        if ($this->card_name === '' || $this->carbon == '' || $this->description === '') {
            $isValid = false;
        }

        return $isValid;
    }
}





?>
