<?php

namespace Database\Seeders;

use App\Models\CourseRegistration;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        $students = User::where('role', 'student')->get();

        if ($courses->isEmpty() || $students->isEmpty()) {
            $this->command->warn('No courses or students found. Please seed courses and users first.');
            return;
        }

        $registrations = [
            // Confirmed registrations
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(30),
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'stripe',
                'amount_paid' => 1299.00,
                'payment_reference' => 'txn_' . uniqid(),
                'notes' => 'Early bird registration with discount applied',
                'dietary_restrictions' => 'Vegetarian',
                'special_requirements' => null,
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(25),
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'paypal',
                'amount_paid' => 1299.00,
                'payment_reference' => 'pp_' . uniqid(),
                'notes' => 'Standard registration',
                'dietary_restrictions' => null,
                'special_requirements' => 'Wheelchair accessible seating required',
                'accommodation_needed' => true,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(20),
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'bank_transfer',
                'amount_paid' => 1299.00,
                'payment_reference' => 'bt_' . uniqid(),
                'notes' => 'Corporate group registration',
                'dietary_restrictions' => 'Gluten-free',
                'special_requirements' => 'Additional course materials requested',
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(15),
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'stripe',
                'amount_paid' => 1299.00,
                'payment_reference' => 'txn_' . uniqid(),
                'notes' => 'Referred by colleague',
                'dietary_restrictions' => 'Vegan',
                'special_requirements' => null,
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(10),
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => null,
                'amount_paid' => 0.00,
                'payment_reference' => null,
                'notes' => 'Awaiting payment confirmation',
                'dietary_restrictions' => null,
                'special_requirements' => null,
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(8),
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'stripe',
                'amount_paid' => 1299.00,
                'payment_reference' => 'txn_' . uniqid(),
                'notes' => 'Last minute registration',
                'dietary_restrictions' => 'Lactose intolerant',
                'special_requirements' => 'Parking space required',
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(5),
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'paypal',
                'amount_paid' => 1299.00,
                'payment_reference' => 'pp_' . uniqid(),
                'notes' => 'International student registration',
                'dietary_restrictions' => 'Halal',
                'special_requirements' => 'Translation services needed',
                'accommodation_needed' => true,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(3),
                'status' => 'cancelled',
                'payment_status' => 'refunded',
                'payment_method' => 'stripe',
                'amount_paid' => 0.00,
                'payment_reference' => 'txn_' . uniqid(),
                'notes' => 'Cancelled due to scheduling conflict',
                'dietary_restrictions' => null,
                'special_requirements' => null,
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(35),
                'status' => 'completed',
                'payment_status' => 'paid',
                'payment_method' => 'bank_transfer',
                'amount_paid' => 1299.00,
                'payment_reference' => 'bt_' . uniqid(),
                'notes' => 'Course completed successfully',
                'dietary_restrictions' => null,
                'special_requirements' => null,
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(40),
                'status' => 'completed',
                'payment_status' => 'paid',
                'payment_method' => 'stripe',
                'amount_paid' => 1299.00,
                'payment_reference' => 'txn_' . uniqid(),
                'notes' => 'Excellent feedback received',
                'dietary_restrictions' => 'Vegetarian',
                'special_requirements' => 'Additional practice sessions attended',
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(60),
                'status' => 'completed',
                'payment_status' => 'paid',
                'payment_method' => 'paypal',
                'amount_paid' => 1299.00,
                'payment_reference' => 'pp_' . uniqid(),
                'notes' => 'Group registration discount applied',
                'dietary_restrictions' => null,
                'special_requirements' => null,
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(55),
                'status' => 'completed',
                'payment_status' => 'paid',
                'payment_method' => 'bank_transfer',
                'amount_paid' => 1299.00,
                'payment_reference' => 'bt_' . uniqid(),
                'notes' => 'Continuing education credits earned',
                'dietary_restrictions' => 'Gluten-free',
                'special_requirements' => 'Digital certificate requested',
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(45),
                'status' => 'completed',
                'payment_status' => 'paid',
                'payment_method' => 'stripe',
                'amount_paid' => 1299.00,
                'payment_reference' => 'txn_' . uniqid(),
                'notes' => 'Alumni discount applied',
                'dietary_restrictions' => null,
                'special_requirements' => 'Networking session participation',
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
            [
                'user_id' => $students->random()->id,
                'course_id' => $courses->random()->id,
                'registered_at' => now()->subDays(2),
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => null,
                'amount_paid' => 0.00,
                'payment_reference' => null,
                'notes' => 'Recently registered, payment processing',
                'dietary_restrictions' => null,
                'special_requirements' => null,
                'accommodation_needed' => false,
                'registration_number' => 'REG-2025-' . rand(1000, 9999),
            ],
        ];

        foreach ($registrations as $registration) {
            CourseRegistration::create($registration);
        }
    }
}
