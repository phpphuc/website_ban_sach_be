<?php

namespace App\DataTransferObjects;

interface ModelDTO
{
    public function toArray(): array;
}
