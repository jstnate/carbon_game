<?php

class Message
{
    public function __construct(
        public string $family_name,
        public string $name,
        public string $email,
        public string $society,
        public string $subject,
        public string $description
    )
    {
    }

    public function verifyMessage(): bool
    {
        $isValid = true;

        if ($this->family_name === '' || $this->name == '' || $this->email === '' || $this->society === '' || $this->subject === '' || $this->description === '') {
            $isValid = false;
        }

        return $isValid;
    }
}