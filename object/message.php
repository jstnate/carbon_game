<?php

class Message
{
    public function __construct(
        public string $last_name,
        public string $first_name,
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

        if ($this->last_name === '' || $this->first_name == '' || $this->email === '' || $this->society === '' || $this->subject === '' || $this->description === '') {
            $isValid = false;
        }

        return $isValid;
    }
}