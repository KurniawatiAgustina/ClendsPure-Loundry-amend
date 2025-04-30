<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $branches = [];
        for ($i = 0; $i < 5; $i++) {
            $branches[] = [
                'name'       => 'Branch ' . ($i + 1),
                'address'    => $faker->address,
                'phone'      => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('branches')->insert($branches);

        $customers = [];
        for ($i = 0; $i < 50; $i++) {
            $customers[] = [
                'name'       => $faker->name,
                'phone'      => $faker->phoneNumber,
                'address'    => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('customers')->insert($customers);

        $defaultUsers = [
            [
                'name'              => 'Owner',
                'email'             => 'owner@owner.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'phone'             => '081234567890',
                'address'           => 'Default Owner Address',
                'role'              => 'Owner',
                'branch_id'         => null,
                'remember_token'    => Str::random(10),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Admin',
                'email'             => 'admin@admin.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'phone'             => '081234567891',
                'address'           => 'Default Admin Address',
                'role'              => 'Admin',
                'branch_id'         => 1,
                'remember_token'    => Str::random(10),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Cashier',
                'email'             => 'cashier@cashier.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'phone'             => '081234567892',
                'address'           => 'Default Cashier Address',
                'role'              => 'Cashier',
                'branch_id'         => 1,
                'remember_token'    => Str::random(10),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ];
        DB::table('users')->insert($defaultUsers);

        // 4. Random Users
        $roles = ['Owner', 'Admin', 'Cashier', 'Customer'];
        $branchIds = DB::table('branches')->pluck('id')->toArray();
        $users = [];
        for ($i = 0; $i < 20; $i++) {
            $role = $faker->randomElement($roles);
            $branchId = in_array($role, ['Admin', 'Cashier'])
                ? $faker->randomElement($branchIds)
                : null;

            $users[] = [
                'name'              => $faker->name,
                'email'             => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'phone'             => $faker->phoneNumber,
                'address'           => $faker->address,
                'role'              => $role,
                'branch_id'         => $branchId,
                'remember_token'    => Str::random(10),
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }
        DB::table('users')->insert($users);

        $serviceNames = [
            'Basic Shoe Cleaning',
            'Deep Cleaning',
            'White Shoe Restoration',
            'Suede & Nubuck Cleaning',
            'Sneaker Brightening',
            'Leather Conditioning',
            'Stain Removal',
            'Antibacterial Treatment',
            'Sole Whitening',
            'Fast Express Service'
        ];
        $services = [];
        foreach ($serviceNames as $name) {
            $services[] = [
                'branch_id'    => $faker->randomElement($branchIds),
                'name'         => $name,
                'description'  => $faker->sentence,
                'price'        => $faker->numberBetween(20000, 100000),
                'is_active'    => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }
        DB::table('services')->insert($services);

        $paymentNames = ['BCA', 'Mandiri', 'BRI', 'GOPAY', 'OVO'];
        $methods = [];
        foreach ($branchIds as $branch) {
            $methods[] = [
                'branch_id'     => $branch,
                'bank_name'     => $faker->randomElement($paymentNames),
                'account_name'  => $faker->name,
                'account_number'=> $faker->numerify('##########'),
                'bank_type'     => $faker->randomElement(['Bank', 'E-Wallet']),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }
        DB::table('payment_methods')->insert($methods);

        $serviceIds = DB::table('services')->pluck('id')->toArray();
        $promoCount = ceil(count($serviceIds) * 0.3);
        $promos = [];
        for ($i = 0; $i < $promoCount; $i++) {
            $sid = $faker->randomElement($serviceIds);
            $promos[] = [
                'branch_id'            => DB::table('services')->where('id', $sid)->value('branch_id'),
                'name'                 => 'Promo ' . $faker->word,
                'service_id'           => $sid,
                'discount_percentage'  => $faker->numberBetween(10, 30),
                'min_quantity'         => $faker->numberBetween(1, 3),
                'start_date'           => Carbon::now()->subMonths(3),
                'end_date'             => Carbon::now()->addMonth(),
                'created_at'           => now(),
                'updated_at'           => now(),
            ];
        }
        DB::table('service_promotions')->insert($promos);

        // $customerIds = DB::table('customers')->pluck('id')->toArray();
        // $paymentIds  = DB::table('payment_methods')->pluck('id')->toArray();

        // for ($i = 0; $i < 200; $i++) {
        //     $created = $faker->dateTimeBetween('-4 months', 'now');
        //     $orderId = DB::table('orders')->insertGetId([
        //         'customer_id'      => $faker->randomElement($customerIds),
        //         'branch_id'        => $faker->randomElement($branchIds),
        //         'total_price'      => 0,
        //         'status'           => $faker->randomElement(['New','Processing','Delivered','Cancelled']),
        //         'category'         => $faker->randomElement(['AntarJemput','AntarSaja','JemputSaja','Mandiri']),
        //         'payment_method'   => $faker->randomElement(['Cash','Transfer']),
        //         'payment_method_id'=> $faker->randomElement($paymentIds),
        //         'created_at'       => $created,
        //         'updated_at'       => Carbon::instance($created)->addHours(rand(1, 72)),
        //     ]);

        //     $detailCount = rand(1, 4);
        //     $total = 0;
        //     for ($d = 0; $d < $detailCount; $d++) {
        //         $sid          = $faker->randomElement($serviceIds);
        //         $isPromo      = $faker->boolean(30);
        //         $promoRecord  = null;
        //         $price        = DB::table('services')->where('id', $sid)->value('price');

        //         if ($isPromo) {
        //             $promoRecord = DB::table('service_promotions')
        //                 ->where('service_id', $sid)
        //                 ->where('start_date', '<=', Carbon::now())
        //                 ->where('end_date', '>=', Carbon::now())
        //                 ->inRandomOrder()
        //                 ->first();
        //         }

        //         $unitPrice = $isPromo && $promoRecord
        //             ? $price * (100 - $promoRecord->discount_percentage) / 100
        //             : $price;
        //         $qty = $faker->numberBetween(1, 5);
        //         $subtotal = $unitPrice * $qty;
        //         $total += $subtotal;

        //         DB::table('order_details')->insert([
        //             'order_id'             => $orderId,
        //             'service_id'           => $sid,
        //             'service_promotions_id'=> $promoRecord->id ?? null,
        //             'is_promo'             => $isPromo,
        //             'quantity'             => $qty,
        //             'subtotal'             => $subtotal,
        //             'created_at'           => now(),
        //             'updated_at'           => now(),
        //         ]);
        //     }
        //     DB::table('orders')->where('id', $orderId)->update(['total_price' => $total]);
        // }
    }
}
