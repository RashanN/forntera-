<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'name'     => $row[0],
            'email'    => $row[1],
            'phone'    => $row[2],
            // Map other columns as needed
        ]);
    }
}
