<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Spatie\Permission\Models\Permission;

class PermissionsExport implements FromCollection
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Permission::select('name', 'group_name')->get();
    }
}
