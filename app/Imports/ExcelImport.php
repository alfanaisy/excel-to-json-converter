<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;

class ExcelImport implements ToArray
{
    /**
    * @param Collection $collection
    */
    public function array(array $rows)
    {
        return $rows;
    }
}
