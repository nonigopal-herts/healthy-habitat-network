<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $londonCouncils = [
            // Inner London
            ['name' => 'City of London Corporation', 'email' => 'enquiries@cityoflondon.gov.uk'],
            ['name' => 'Westminster City Council', 'email' => 'contact@westminster.gov.uk'],
            ['name' => 'Kensington and Chelsea Council', 'email' => 'info@rbkc.gov.uk'],
            ['name' => 'Hammersmith and Fulham Council', 'email' => 'enquiries@lbhf.gov.uk'],
            ['name' => 'Wandsworth Council', 'email' => 'contactus@wandsworth.gov.uk'],
            ['name' => 'Lambeth Council', 'email' => 'lambeth@lambeth.gov.uk'],
            ['name' => 'Southwark Council', 'email' => 'contactus@southwark.gov.uk'],
            ['name' => 'Tower Hamlets Council', 'email' => 'info@towerhamlets.gov.uk'],
            ['name' => 'Hackney Council', 'email' => 'contact@hackney.gov.uk'],
            ['name' => 'Islington Council', 'email' => 'enquiries@islington.gov.uk'],
            ['name' => 'Camden Council', 'email' => 'contact@camden.gov.uk'],

            // Outer London
            ['name' => 'Brent Council', 'email' => 'info@brent.gov.uk'],
            ['name' => 'Ealing Council', 'email' => 'contactus@ealing.gov.uk'],
            ['name' => 'Hounslow Council', 'email' => 'info@hounslow.gov.uk'],
            ['name' => 'Richmond upon Thames Council', 'email' => 'contact@richmond.gov.uk'],
            ['name' => 'Kingston upon Thames Council', 'email' => 'contactus@kingston.gov.uk'],
            ['name' => 'Merton Council', 'email' => 'contact@merton.gov.uk'],
            ['name' => 'Sutton Council', 'email' => 'contactus@sutton.gov.uk'],
            ['name' => 'Croydon Council', 'email' => 'contactus@croydon.gov.uk'],
            ['name' => 'Bromley Council', 'email' => 'contact@bromley.gov.uk'],
            ['name' => 'Lewisham Council', 'email' => 'contactus@lewisham.gov.uk'],
            ['name' => 'Greenwich Council', 'email' => 'contactus@royalgreenwich.gov.uk'],
            ['name' => 'Bexley Council', 'email' => 'contact.us@bexley.gov.uk'],
            ['name' => 'Havering Council', 'email' => 'contactus@havering.gov.uk'],
            ['name' => 'Barking and Dagenham Council', 'email' => 'contactus@lbbd.gov.uk'],
            ['name' => 'Redbridge Council', 'email' => 'customer.services@redbridge.gov.uk'],
            ['name' => 'Newham Council', 'email' => 'info@newham.gov.uk'],
            ['name' => 'Waltham Forest Council', 'email' => 'contactus@walthamforest.gov.uk'],
            ['name' => 'Haringey Council', 'email' => 'contactus@haringey.gov.uk'],
            ['name' => 'Enfield Council', 'email' => 'contactus@enfield.gov.uk'],
            ['name' => 'Barnet Council', 'email' => 'contactus@barnet.gov.uk'],
            ['name' => 'Harrow Council', 'email' => 'contactus@harrow.gov.uk'],
            ['name' => 'Hillingdon Council', 'email' => 'contactus@hillingdon.gov.uk'],

            // Greater London Authority
            ['name' => 'Greater London Authority', 'email' => 'mayor@london.gov.uk'],
            ['name' => 'London Assembly', 'email' => 'assembly@london.gov.uk'],
        ];

        foreach ($londonCouncils as $council) {
            Area::create([
                'name' => $council['name'],
                'email' => $council['email'],
            ]);
        }
    }
}
