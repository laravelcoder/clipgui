<?php

use Illuminate\Database\Seeder;

class RoleSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'permission' => [1, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 2, 3, 4, 5, 6, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 23, 24, 25, 26, 27, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79],
            ],
            2 => [
                'permission' => [17, 2, 3, 4, 5, 33, 34, 35, 36, 37, 38, 39, 40, 42, 43, 44, 45, 47, 48, 49, 50, 52, 53, 54, 55, 57, 58, 59, 60, 23, 24, 25, 26, 73, 74, 75, 76, 77, 78],
            ],

        ];

        foreach ($items as $id => $item) {
            $role = \App\Role::find($id);

            foreach ($item as $key => $ids) {
                $role->{$key}()->sync($ids);
            }
        }
    }
}
