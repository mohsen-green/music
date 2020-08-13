<?php

use Illuminate\Database\Seeder;
use App\User;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
class UsersuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "superadmin";
        $user->email = "superadmin@gmail.com";
        $user->password = bcrypt("jaaaana1000");
        $user->save();
        $user_id = $user->where("email", "superadmin@gmail.com")->first();
        // ساخت نقش
        $role = Role::create(['name' => 'superadmin']);
        $permission = Permission::create(['name' => 'everything']);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
        $user_id->givePermissionTo('everything');
        $user_id->assignRole("superadmin");


    }
}
