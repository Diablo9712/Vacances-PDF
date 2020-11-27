<?php

namespace App\Http\VMs;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class tarifVM
{
    public int $id_tarif1;
    public int $id_tarif2;
    public string $ville;
    public int $id_v;
    public float $mhs;
    public float $mbs;
}
