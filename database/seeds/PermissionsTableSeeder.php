<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Cashier']);
        $role3 = Role::create(['name' => 'Client']);

        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);
        $admin_user->profile()->create([
            'first_name' => $admin_user->name,
        ]);
        $admin_user->assignRole($role1);


        $cashier_user = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@gmail.com',
            'password' => '$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);
        $cashier_user->profile()->create([
            'first_name' => $cashier_user->name,
        ]);
        $cashier_user->assignRole($role2);

        $client_user = User::create([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => '$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);
        $client_user->profile()->create([
            'first_name' => $client_user->name,
        ]);
        $client_user->assignRole($role3);
    }
}