<?php

namespace Database\Seeders;

use App\Models\FeeStructure;
use Illuminate\Database\Seeder;

class FeeStructureSeeder extends Seeder
{
    public function run(): void
    {
        $feeStructures = [
            ['fund_name' => 'Admission Fee', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Re- admission  ( 1st  Time )', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Re- admission  ( 2nd  Time )', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Late admission Fee', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'House Examination Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Medical Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Campus Dev. & Beautification Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Book Replacement Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Furniture Repair & Replacement Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Identity Card', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Duplicate Identity Card', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Magazine Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'NCC Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Student Aid Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Cultural Activity Fund', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Library Security(Refundable)', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Computer & Internet Facility', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Youth Red Cross', 'category' => 'ANNUAL CHARGES', 'amount' => ''],
            ['fund_name' => 'Continuation Fee (For Old Students)', 'category' => 'University Charges', 'amount' => ''],
            ['fund_name' => 'Youth Welfare Fund', 'category' => 'University Charges', 'amount' => ''],
            ['fund_name' => 'University Fund', 'category' => 'University Charges', 'amount' => ''],
            ['fund_name' => 'Holiday Home Fund', 'category' => 'University Charges', 'amount' => ''],
            ['fund_name' => 'PTA FUND', 'category' => 'PTA FUND', 'amount' => '600'],
            ['fund_name' => 'Tution Fee', 'category' => 'Monthly Charges', 'amount' => ''],
            ['fund_name' => 'Amalgamated Fund', 'category' => 'Monthly Charges', 'amount' => ''],
            ['fund_name' => 'Building Fund', 'category' => 'Monthly Charges', 'amount' => ''],
            ['fund_name' => 'Sports Fund (Local)', 'category' => 'Monthly Charges', 'amount' => ''],
            ['fund_name' => 'Rangers & Rover Fund', 'category' => 'Monthly Charges', 'amount' => ''],
            ['fund_name' => 'Chemistry', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Botany', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Zoology', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Physics', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Geography', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Music V/I', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Phy. Education', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Practical Fee for Computer', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Practical Fee Commerce', 'category' => 'Practical Funds', 'amount' => ''],
            ['fund_name' => 'Absence from theory period', 'category' => 'Fine', 'amount' => ''],
            ['fund_name' => 'Absence from practical period', 'category' => 'Fine', 'amount' => ''],
            ['fund_name' => 'Absence from house examination', 'category' => 'Fine', 'amount' => ''],
            ['fund_name' => 'Library Book Fine per Book per Day', 'category' => 'Fine', 'amount' => ''],
            ['fund_name' => 'Special fine during absence in college functions', 'category' => 'Fine', 'amount' => ''],
        ];

        foreach ($feeStructures as $feeStructure) {
            FeeStructure::create($feeStructure);
        }
    }
}
