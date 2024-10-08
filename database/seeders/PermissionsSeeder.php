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
        $roles = ['user', 'mod', 'author', 'dev', 'admin'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Permissions
        $permissionsWithRole = [
            'view any post' => [
                'mod',
                'author',
                'dev',
                'admin'
            ],
            'view post'=>['user', 'mod', 'author', 'dev', 'admin'],
            'create post'=>['mod', 'author', 'dev', 'admin'],
            'update post'=>['mod', 'author', 'dev', 'admin'],
            'update any post'=>['mod', 'admin'],
            'delete post'=>['mod', 'author', 'dev', 'admin'],
            'delete any post'=>['mod', 'admin'],
            'comment'=>['user', 'mod', 'author', 'dev', 'admin'],
            'delete comment'=>['user', 'mod', 'author', 'dev', 'admin'],
            'delete any comment'=>['mod', 'admin'],
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

