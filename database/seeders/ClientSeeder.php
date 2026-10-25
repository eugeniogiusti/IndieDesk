<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'name'                   => 'Bright Studio',
                'email'                  => 'hello@brightstudio.com',
                'status'                 => 'active',
                'vat_number'             => 'IT01234567890',
                'phone_prefix'           => '+39',
                'phone'                  => '3401234567',
                'pec'                    => 'brightstudio@pec.it',
                'billing_address'        => 'Via Roma 42',
                'billing_city'           => 'Milano',
                'billing_zip'            => '20121',
                'billing_province'       => 'MI',
                'billing_country'        => 'IT',
                'billing_recipient_code' => 'ABC1234',
                'website'                => 'https://brightstudio.com',
                'linkedin'               => 'https://linkedin.com/company/brightstudio',
                'notes'                  => 'Design agency. Main contact: Marco Rossi.',
            ],
            [
                'name'                   => 'NordTech GmbH',
                'email'                  => 'info@nordtech.de',
                'status'                 => 'active',
                'vat_number'             => 'DE987654321',
                'phone_prefix'           => '+49',
                'phone'                  => '1761234567',
                'billing_address'        => 'Friedrichstraße 112',
                'billing_city'           => 'Berlin',
                'billing_zip'            => '10117',
                'billing_province'       => 'BE',
                'billing_country'        => 'DE',
                'website'                => 'https://nordtech.de',
                'linkedin'               => 'https://linkedin.com/company/nordtech',
                'notes'                  => 'German startup. Pays on time. Prefers English communication.',
            ],
            [
                'name'                   => 'Olivia Chen',
                'email'                  => 'olivia@oliviachen.co',
                'status'                 => 'active',
                'phone_prefix'           => '+44',
                'phone'                  => '7911123456',
                'billing_address'        => '15 Shoreditch High St',
                'billing_city'           => 'London',
                'billing_zip'            => 'E1 6JE',
                'billing_country'        => 'GB',
                'website'                => 'https://oliviachen.co',
                'linkedin'               => 'https://linkedin.com/in/oliviachen',
                'notes'                  => 'Freelance product manager. Referred by Bright Studio.',
            ],
            [
                'name'                   => 'Caffè Digitale SRL',
                'email'                  => 'admin@caffedigitale.it',
                'status'                 => 'active',
                'vat_number'             => 'IT09876543210',
                'phone_prefix'           => '+39',
                'phone'                  => '3289876543',
                'pec'                    => 'caffedigitale@pec.it',
                'billing_address'        => 'Corso Vittorio Emanuele 78',
                'billing_city'           => 'Torino',
                'billing_zip'            => '10121',
                'billing_province'       => 'TO',
                'billing_country'        => 'IT',
                'billing_recipient_code' => 'XYZ7890',
                'website'                => 'https://caffedigitale.it',
                'notes'                  => 'E-commerce for specialty coffee. Interested in a custom Shopify integration.',
            ],
            [
                'name'                   => 'Sunset Ventures LLC',
                'email'                  => 'contact@sunsetventures.io',
                'status'                 => 'archived',
                'phone_prefix'           => '+1',
                'phone'                  => '4155551234',
                'billing_address'        => '450 Mission St, Suite 300',
                'billing_city'           => 'San Francisco',
                'billing_zip'            => '94105',
                'billing_province'       => 'CA',
                'billing_country'        => 'US',
                'website'                => 'https://sunsetventures.io',
                'linkedin'               => 'https://linkedin.com/company/sunsetventures',
                'notes'                  => 'Project completed in 2025. Good relationship, may return for v2.',
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
