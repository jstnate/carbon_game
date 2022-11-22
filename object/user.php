<?php

class User
{
//    public string $id;

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $function,
    )
    {
    }
    public function verifyInput(): bool
    {
        $isValid = true;

        if ($this->email === '' || $this->name === '' || $this->password === '') {
            $isValid = false;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
        }

        return $isValid;
    }
}