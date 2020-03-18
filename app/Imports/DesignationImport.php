<?php

namespace App\Imports;

use App\Department;
use App\Designation;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DesignationImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $department = Department::checkOrCreate($row['department']);
            if (Designation::where(['title' => $row['designation'], 'department_id' => $department])->count() == 0) {
                Designation::create([
                    'title'     => $row['designation'],
                    'department_id' => $department,
                    'status'    => $row['status'] ?: 'Active',
                ]);
            }
        }
    }
}
