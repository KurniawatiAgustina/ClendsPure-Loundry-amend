<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     UserSeeder::class,
        //     CitySeeder::class,
        //     SubdistrictSeeder::class,
        //     VillageSeeder::class,
        //     AreaCoverageSeeder::class,
        //     ServiceSeeder::class,
        //     ServiceDetailSeeder::class,
        //     PaymentMethodSeeder::class,
        //     CustomerSeeder::class,
        //     ArticleSeeder::class,
        //     OrderSeeder::class,
        //     OrderDetailSeeder::class,
        // ]);

        // Branches
        DB::table('branches')->insert([
            ['name' => 'Branch A', 'address' => 'Address A', 'phone' => '1234567890', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Branch B', 'address' => 'Address B', 'phone' => '0987654321', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Users
        DB::table('users')->insert([
            ['name' => 'Owner User', 'email' => 'owner@example.com', 'password' => Hash::make('password'), 'role' => 'Owner', 'branch_id' => 1, 'phone' => '111222333', 'address' => 'Address A', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'role' => 'Admin', 'branch_id' => 1, 'phone' => '111222333', 'address' => 'Address A', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cashier User', 'email' => 'cashier@example.com', 'password' => Hash::make('password'), 'role' => 'Cashier', 'branch_id' => 2, 'phone' => '111222333', 'address' => 'Address A', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Customers
        DB::table('customers')->insert([
            ['name' => 'Customer A', 'phone' => '111222333', 'address' => 'Address A', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Customer B', 'phone' => '444555666', 'address' => 'Address B', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Services
        DB::table('services')->insert([
            ['branch_id' => 1, 'name' => 'Service A', 'description' => 'Description A', 'price' => 10000, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['branch_id' => 2, 'name' => 'Service B', 'description' => 'Description B', 'price' => 20000, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Service Promotions
        DB::table('service_promotions')->insert([
            ['branch_id' => 1, 'name' => 'Promo A', 'service_id' => 1, 'discount_percentage' => 10, 'min_quantity' => 2, 'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addDays(7), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Payment Methods
        DB::table('payment_methods')->insert([
            ['branch_id' => 1, 'bank_name' => 'Bank A', 'account_name' => 'Account A', 'account_number' => '123456789', 'bank_type' => 'Bank', 'created_at' => now(), 'updated_at' => now()],
            ['branch_id' => 2, 'bank_name' => 'E-Wallet B', 'account_name' => 'Account B', 'account_number' => '987654321', 'bank_type' => 'E-Wallet', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Articles
        DB::table('articles')->insert([
            ['title' => 'Article A', 'thumbnail_img' => 'https://via.placeholder.com/150', 'content' => 'Content A', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Article B', 'thumbnail_img' => 'https://via.placeholder.com/150', 'content' => 'Content B', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Orders
        DB::table('orders')->insert([
            [
                'customer_id' => 1,
                'branch_id' => 1,
                'total_price' => 50000,
                'status' => 'New',
                'category' => 'AntarJemput',
                'payment_method' => 'Cash',
                'payment_method_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_id' => 2,
                'branch_id' => 2,
                'total_price' => 75000,
                'status' => 'Processing',
                'category' => 'Mandiri',
                'payment_method' => 'Transfer',
                'payment_method_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Order Details
        DB::table('order_details')->insert([
            [
                'order_id' => 1,
                'service_id' => 1,
                'service_promotions_id' => null,
                'is_promo' => false,
                'quantity' => 2,
                'subtotal' => 20000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'order_id' => 2,
                'service_id' => 2,
                'service_promotions_id' => 1,
                'is_promo' => true,
                'quantity' => 3,
                'subtotal' => 45000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
