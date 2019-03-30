<?php

namespace App;

trait ContactInfo
{
    public function details()
    {
        return $this->toJson();
    }
}
