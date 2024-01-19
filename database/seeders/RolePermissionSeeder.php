<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' =>'tambah-user']);
        Permission::create(['name' =>'edit-user']);
        Permission::create (['name' =>'hapus-user']);
        Permission::create(['name' =>'lihat-user']);

        Permission::create(['name' =>'tambah-aset']);
        Permission::create(['name' =>'edit-aset']);
        Permission::create(['name' =>'hapus-aset']);
        Permission::create(['name' =>'lihat-aset']);

        Permission::create(['name' =>'tambah-diklat']);
        Permission::create(['name' =>'edit-diklat']);
        Permission::create(['name' =>'hapus-diklat']);
        Permission::create(['name' =>'lihat-diklat']);

        Permission::create(['name' =>'tambah-api']);
        Permission::create(['name' =>'edit-api']);
        Permission::create(['name' =>'hapus-api']);
        Permission::create(['name' =>'lihat-api']);
        
        Permission::create(['name' =>'tambah-bppl']);
        Permission::create(['name' =>'edit-bppl']);
        Permission::create(['name' =>'hapus-bppl']);
        Permission::create(['name' =>'lihat-bppl']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'aset']);
        Role::create(['name'=>'diklat']);
        Role::create(['name'=>'api']);
        Role::create(['name'=>'bppl']);


        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $roleAset= Role::findByName('aset');
        $roleAset->givePermissionTo('tambah-aset');
        $roleAset->givePermissionTo('edit-aset');
        $roleAset->givePermissionTo('hapus-aset');
        $roleAset->givePermissionTo('lihat-aset');

        $roleDiklat= Role::findByName('diklat');
        $roleDiklat->givePermissionTo('tambah-diklat');
        $roleDiklat->givePermissionTo('edit-diklat');
        $roleDiklat->givePermissionTo('hapus-diklat');
        $roleDiklat->givePermissionTo('lihat-diklat');

        $roleApi= Role::findByName('api');
        $roleApi->givePermissionTo('tambah-api');
        $roleApi->givePermissionTo('edit-api');
        $roleApi->givePermissionTo('hapus-api');
        $roleApi->givePermissionTo('lihat-api');

        $roleBppl= Role::findByName('bppl');
        $roleBppl->givePermissionTo('tambah-bppl');
        $roleBppl->givePermissionTo('edit-bppl');
        $roleBppl->givePermissionTo('hapus-bppl');
        $roleBppl->givePermissionTo('lihat-bppl');
    }
}
