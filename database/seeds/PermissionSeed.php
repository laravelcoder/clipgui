<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'clip_managment_access',],
            ['id' => 23, 'title' => 'clip_access',],
            ['id' => 24, 'title' => 'clip_create',],
            ['id' => 25, 'title' => 'clip_edit',],
            ['id' => 26, 'title' => 'clip_view',],
            ['id' => 27, 'title' => 'clip_delete',],
            ['id' => 33, 'title' => 'gallery_access',],
            ['id' => 34, 'title' => 'detection_access',],
            ['id' => 35, 'title' => 'single_channel_access',],
            ['id' => 36, 'title' => 'multi_channel_access',],
            ['id' => 37, 'title' => 'clip_filter_access',],
            ['id' => 38, 'title' => 'clip_filter_create',],
            ['id' => 39, 'title' => 'clip_filter_edit',],
            ['id' => 40, 'title' => 'clip_filter_view',],
            ['id' => 41, 'title' => 'clip_filter_delete',],
            ['id' => 42, 'title' => 'state_access',],
            ['id' => 43, 'title' => 'state_create',],
            ['id' => 44, 'title' => 'state_edit',],
            ['id' => 45, 'title' => 'state_view',],
            ['id' => 46, 'title' => 'state_delete',],
            ['id' => 47, 'title' => 'brand_access',],
            ['id' => 48, 'title' => 'brand_create',],
            ['id' => 49, 'title' => 'brand_edit',],
            ['id' => 50, 'title' => 'brand_view',],
            ['id' => 51, 'title' => 'brand_delete',],
            ['id' => 52, 'title' => 'product_access',],
            ['id' => 53, 'title' => 'product_create',],
            ['id' => 54, 'title' => 'product_edit',],
            ['id' => 55, 'title' => 'product_view',],
            ['id' => 56, 'title' => 'product_delete',],
            ['id' => 57, 'title' => 'industry_access',],
            ['id' => 58, 'title' => 'industry_create',],
            ['id' => 59, 'title' => 'industry_edit',],
            ['id' => 60, 'title' => 'industry_view',],
            ['id' => 61, 'title' => 'industry_delete',],
            ['id' => 62, 'title' => 'default_access',],
            ['id' => 63, 'title' => 'nuts_bolt_access',],
            ['id' => 64, 'title' => 'dyna_video_cut_access',],
            ['id' => 65, 'title' => 'google_cloud_vision_access',],
            ['id' => 66, 'title' => 'image_magic_access',],
            ['id' => 67, 'title' => 'tocai_server_access',],
            ['id' => 68, 'title' => 'interactivity_access',],
            ['id' => 69, 'title' => 'register_new_clip_access',],
            ['id' => 70, 'title' => 'dedup_access',],
            ['id' => 71, 'title' => 'redistribution_access',],
            ['id' => 72, 'title' => 'auto_group_detection_access',],
            ['id' => 73, 'title' => 'all_channel_access',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
