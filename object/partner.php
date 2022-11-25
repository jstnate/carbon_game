<?php

class Partner
{
    public function __construct(
        public string $partner_name,
        public string $logo,
    )
    {
    }
    public function verifyInput(): bool
    {
        $isValid = true;

        if ($this->partner_name === '') {
            $isValid = false;
        }
        return $isValid;
    }
}

?>