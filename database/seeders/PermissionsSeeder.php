<?php

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['user', 'mod', 'author', 'dev', 'owner'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Permissions
        $permissionsWithRole = [
            'view any post' => [
                'mod',
                'author',
                'dev',
                'owner'
            ],
            'view post'=>['user', 'mod', 'author', 'dev', 'owner'],
            'create post'=>['mod', 'author', 'dev', 'owner'],
            'update post'=>['mod', 'author', 'dev', 'owner'],
            'update any post'=>['mod', 'owner'],
            'delete post'=>['mod', 'author', 'dev', 'owner'],
            'delete any post'=>['mod', 'owner'],
            'comment'=>['user', 'mod', 'author', 'dev', 'owner'],
            'delete comment'=>['user', 'mod', 'author', 'dev', 'owner'],
            'delete any comment'=>['mod', 'owner'],
        ];










        foreach ($permissionsWithRole as $permission => $roles_permission) {
            $createdPermission = Permission::create(['name' => $permission]);

            foreach ($roles_permission as $roleName) {
                $role = Role::findByName($roleName);
        
                if ($role) {
                    $role->givePermissionTo($createdPermission);
                }
            }
        }
    }
}

