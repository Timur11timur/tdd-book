<?php

namespace App;

class Dollar extends Money
{
    public function times(int $multiplier): Money
    {
      return new Dollar($this->amount * $multiplier, $this->currency);
    }
}
