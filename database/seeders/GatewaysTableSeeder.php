<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gateway;

class GatewaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $gateways = [
            [
                'id' => '1',
                'name' => 'paypal',
                'logo' => '/demo/paypal.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Paypal',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '0',
                'data' => '{"client_id":"","client_secret":""}', 
                'currency' => 'usd',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'name' => 'stripe',
                'logo' => '/demo/stripe.png',
                'min_amount' => 1,
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Stripe',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '0',
                'data' => '{"publishable_key":"","secret_key":""}', 
                'currency' => 'usd', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'name' => 'mollie',
                'logo' => '/demo/mollie.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Mollie',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '1',
                'phone_required' => '0',
                'data' => '{"api_key":"test_WqUGsP9qywy3eRVvWMRayxmVB5dx2r"}', 
                'currency' => 'usd', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'name' => 'paystack',
                'logo' => '/demo/paystack.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Paystack',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '0',
                'data' => '{"public_key":"","secret_key":""}', 
                'currency' => null, 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '5',
                'name' => 'razorpay',
                'logo' => '/demo/rajorpay.png',
                'min_amount' => 1, 
                'max_amount' => 10000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Razorpay',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '0',
                'data' => '{"key_id":"","key_secret":""}',
                'currency' => 'inr', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '6',
                'name' => 'instamojo',
                'logo' => '/demo/instamojo.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Instamojo',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '1',
                'data' => '{"x_api_key":"","x_auth_token":""}', 
                'currency' => 'inr', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '7',
                'name' => 'toyyibpay',
                'logo' => '/demo/toyybipay.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Toyyibpay',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '1',
                'data' => '{"user_secret_key":"","cateogry_code":""}',
                'currency' => 'rm',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '8',
                'name' => 'flutterwave',
                'logo' => '/demo/flutterwave.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Flutterwave',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '1',
                'data' => '{"public_key":"","secret_key":"","encryption_key":"","payment_options":"card"}', 
                'currency' => null, 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '9',
                'name' => 'payu',
                'logo' => '/demo/payu.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '2',
                'namespace' => 'App\\Gateway\\Payu',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '1',
                'data' => '{"merchant_key":"","merchant_salt":"","auth_header":""}',
                'currency'=>null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '10',
                'name' => 'thawani',
                'logo' => '/demo/uhawan.png',
                'min_amount' => 1, 
                'max_amount' => 1000,
                'charge' => '1',
                'namespace' => 'App\\Gateway\\Thawani',
                'is_auto' => '1',
                'image_accept' => '0',
                'test_mode' => '1',
                'status' => '0',
                'phone_required' => '1',
                'data' => '{"secret_key":"","publishable_key":""}',
                'currency'=> null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Gateway::insert($gateways);
    }
}
