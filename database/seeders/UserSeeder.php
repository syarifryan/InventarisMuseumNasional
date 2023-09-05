<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $superadmin = User::create([
            "id" => 1,
            'name' => 'Ryan',
            'display_name' => 'superadmin display name',
            'email' => 'ryan@mni.id',
            'password' => bcrypt('password'),
            'phone' => '08112233445',
            'address' => 'Jl. Jendral Soedirman',
            "departement" => "Superadmin",
            'status' => 1,
        ]);

        $user = User::create([
            "id" => 2,
            "name" => "Hani",
            "display_name" => "user 1 display name",
            "email" => "hani@mni.id",
            'password' => bcrypt('password'),
            "phone" => "082233335555",
            "address" => "Jalan Mawar No. 4",
            "departement" => "User",
            "status" => 1,
        ]);

        

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames = [
        
        //MASTER
            //kualitas
            'kualitas-index',
            'kualitas-add',
            'kualitas-update',
            'kualitas-delete',
            //sensor
            'sensor-index',
            'sensor-add',
            'sensor-update',
            'sensor-delete',
            //tsukamoto
            'tsukamoto-index',
            'tsukamoto-add',
            'tsukamoto-update',
            'tsukamoto-delete',
            //rules
            'rules-index',
            'rules-add',
            'rules-update',
            'rules-delete',
            //proses
            'proses-index',
            'proses-add',
            'proses-update',
            'proses-delete',
        
        //SETTINGS
            //user
            'user-index',
            'user-add',
            'user-update',
            'user-delete',
            //role
            'role-index',
            'role-add',
            'role-update',
            'role-delete',
            //permission
            'permission-index',
            'permission-add',
            'permission-update',
            'permission-delete',
            //profile
            'profile-index',
            'profile-edit',
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        //ROLE SUPERADMIN
        $role = Role::create(['name' => 'Superadmin'])
            ->givePermissionTo([
         //MASTER
            //kualitas
            'kualitas-index',
            'kualitas-add',
            'kualitas-update',
            'kualitas-delete',
            //sensor
            'sensor-index',
            'sensor-add',
            'sensor-update',
            'sensor-delete',
            //tsukamoto
            'tsukamoto-index',
            'tsukamoto-add',
            'tsukamoto-update',
            'tsukamoto-delete',
            //rules
            'rules-index',
            'rules-add',
            'rules-update',
            'rules-delete',
            //proses
            'proses-index',
            'proses-add',
            'proses-update',
            'proses-delete',
        
        //SETTINGS
            //user
            'user-index',
            'user-add',
            'user-update',
            'user-delete',
            //role
            'role-index',
            'role-add',
            'role-update',
            'role-delete',
            //permission
            'permission-index',
            'permission-add',
            'permission-update',
            'permission-delete',
            //profile
            'profile-index',
            'profile-edit',
            ]);

        $superadmin = $superadmin->fresh();
        $superadmin->syncRoles(['superadmin']);

        
        //ROLE ADMIN
        $role = Role::create(['name' => 'User'])
        ->givePermissionTo([
            //MASTER
                //pameran
                // 'pameran-index',
                // 'pameran-add',
                // 'pameran-update',
                // 'pameran-delete',
                //rules
                'rules-index',
                // 'rules-add',
                // 'rules-update',
                // 'rules-delete',
        
            //SENSOR

            //SETTINGS
                //profile
                'profile-index',
                'profile-edit',
            ]);

            $user = $user->fresh();
            $user->syncRoles(['user']);






    }
}
