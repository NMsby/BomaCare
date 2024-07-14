<?php

namespace App\Imports;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Spatie\Permission\Models\Permission;

class PermissionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Permission([
            'name' => $row[0],
            'group_name' => $row[1],
            'guard_name' => 'web',
        ]);
    }
}
