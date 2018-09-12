<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Phillip Madsen', 'email' => 'wecodelaravel@gmail.com', 'password' => '$2y$10$zZwj7EO4UbrLWqFy9I3eIeGv3bb5kU7yvjTz6Sq7Gi1hJDETM01Ue', 'remember_token' => '',],
            ['id' => 2, 'name' => 'Mark Hurst', 'email' => 'mark.hurst@sling.com', 'password' => '$2y$10$aur9euAu40kCCdsZIPBYW.b89kAfJHxCrFYf.Z//IatJi6N1.6aIO', 'remember_token' => null,],
            ['id' => 3, 'name' => 'Drew Major', 'email' => 'drew.major@sling.com', 'password' => '$2y$10$SS2DhlxjAQY/AYlJX9Yn1..P1f3unsXfx1dQeqv7y2zI4vpdnajLm', 'remember_token' => null,],
            ['id' => 4, 'name' => 'Jorg Nonnenmacher', 'email' => 'jorg.nonnenmacher@sling.com', 'password' => '$2y$10$gv/xBC3VHpK6eWt0mIPEc.lzoa3zLQOOn0kAlaCde8QFbo4W.6EMy', 'remember_token' => null,],
            ['id' => 5, 'name' => 'Adam Harral', 'email' => 'adam.harral@sling.com', 'password' => '$2y$10$zm.IiF.3Yf3mQzkBHTzfkeBb8N2JC5oxfF4EHW0pK6jJ7fR6wsSGC', 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
