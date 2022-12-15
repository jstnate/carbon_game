<?php

class Partner
{
    public function __construct(
        public string $partner_name,
        public string $partner_mail,
        public string $logo,
    )
    {
    }
    public function verifyInput(): bool
    {
        $isValid = true;

        if ($this->partner_name === ''|| $this->partner_mail === '') {
            $isValid = false;
        }
        return $isValid;
    }
}

?>