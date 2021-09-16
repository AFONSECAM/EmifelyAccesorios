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
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Cashier']);
        $role = Role::create(['name' => 'Client']);

        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);
        $admin_user->profile()->create();
        $admin_user->assignRole('Admin');

        $cashier_user = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@gmail.com',
            'password' => '$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);
        $cashier_user->profile()->create();

        $cashier_user->assignRole('Cashier');

        $client_user = User::create([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => '$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);
        $client_user->profile()->create();

        $client_user->assignRole('Client');
    }
}