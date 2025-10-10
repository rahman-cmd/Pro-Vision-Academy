<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Site Information
            [
                'key' => 'site_name',
                'value' => 'Dental Course Academy',
                'type' => 'text',
                'group' => 'site',
                'description' => 'The name of the website',
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Excellence in Dental Education',
                'type' => 'text',
                'group' => 'site',
                'description' => 'Site tagline or slogan',
            ],
            [
                'key' => 'site_description',
                'value' => 'Leading provider of professional dental education courses and certifications for dental professionals worldwide.',
                'type' => 'textarea',
                'group' => 'site',
                'description' => 'Site description for SEO',
            ],
            [
                'key' => 'site_logo',
                'value' => 'images/logo.png',
                'type' => 'file',
                'group' => 'site',
                'description' => 'Site logo image',
            ],
            [
                'key' => 'site_favicon',
                'value' => 'images/favicon.ico',
                'type' => 'file',
                'group' => 'site',
                'description' => 'Site favicon',
            ],
            [
                'key' => 'site_keywords',
                'value' => 'dental courses, dental education, dental training, dental certification, continuing education',
                'type' => 'textarea',
                'group' => 'site',
                'description' => 'Site keywords for SEO',
            ],

            // Contact Information
            [
                'key' => 'contact_email',
                'value' => 'info@dentalcourseacademy.com',
                'type' => 'email',
                'group' => 'contact',
                'description' => 'Main contact email address',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 (555) 123-4567',
                'type' => 'text',
                'group' => 'contact',
                'description' => 'Main contact phone number',
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Dental Education Blvd, Suite 456, Medical City, MC 12345',
                'type' => 'textarea',
                'group' => 'contact',
                'description' => 'Physical address',
            ],
            [
                'key' => 'contact_hours',
                'value' => 'Monday - Friday: 8:00 AM - 6:00 PM EST',
                'type' => 'text',
                'group' => 'contact',
                'description' => 'Business hours',
            ],
            [
                'key' => 'support_email',
                'value' => 'support@dentalcourseacademy.com',
                'type' => 'email',
                'group' => 'contact',
                'description' => 'Support email address',
            ],

            // Social Media
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/dentalcourseacademy',
                'type' => 'url',
                'group' => 'social',
                'description' => 'Facebook page URL',
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com/dentalcourseacad',
                'type' => 'url',
                'group' => 'social',
                'description' => 'Twitter profile URL',
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com/company/dental-course-academy',
                'type' => 'url',
                'group' => 'social',
                'description' => 'LinkedIn company page URL',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/dentalcourseacademy',
                'type' => 'url',
                'group' => 'social',
                'description' => 'Instagram profile URL',
            ],
            [
                'key' => 'youtube_url',
                'value' => 'https://youtube.com/c/dentalcourseacademy',
                'type' => 'url',
                'group' => 'social',
                'description' => 'YouTube channel URL',
            ],

            // Email Settings
            [
                'key' => 'smtp_host',
                'value' => 'smtp.gmail.com',
                'type' => 'text',
                'group' => 'email',
                'description' => 'SMTP server host',
            ],
            [
                'key' => 'smtp_port',
                'value' => '587',
                'type' => 'number',
                'group' => 'email',
                'description' => 'SMTP server port',
            ],
            [
                'key' => 'smtp_username',
                'value' => 'noreply@dentalcourseacademy.com',
                'type' => 'email',
                'group' => 'email',
                'description' => 'SMTP username',
            ],
            [
                'key' => 'smtp_encryption',
                'value' => 'tls',
                'type' => 'select',
                'group' => 'email',
                'description' => 'SMTP encryption type',
            ],
            [
                'key' => 'mail_from_address',
                'value' => 'noreply@dentalcourseacademy.com',
                'type' => 'email',
                'group' => 'email',
                'description' => 'Default from email address',
            ],
            [
                'key' => 'mail_from_name',
                'value' => 'Dental Course Academy',
                'type' => 'text',
                'group' => 'email',
                'description' => 'Default from name',
            ],

            // Payment Settings
            [
                'key' => 'payment_currency',
                'value' => 'USD',
                'type' => 'select',
                'group' => 'payment',
                'description' => 'Default payment currency',
            ],
            [
                'key' => 'stripe_publishable_key',
                'value' => 'pk_test_...',
                'type' => 'text',
                'group' => 'payment',
                'description' => 'Stripe publishable key',
            ],
            [
                'key' => 'paypal_client_id',
                'value' => 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',
                'type' => 'text',
                'group' => 'payment',
                'description' => 'PayPal client ID',
            ],
            [
                'key' => 'payment_methods',
                'value' => 'stripe,paypal,bank_transfer',
                'type' => 'text',
                'group' => 'payment',
                'description' => 'Available payment methods (comma separated)',
            ],

            // Course Settings
            [
                'key' => 'default_course_duration',
                'value' => '8',
                'type' => 'number',
                'group' => 'courses',
                'description' => 'Default course duration in hours',
            ],
            [
                'key' => 'max_students_per_course',
                'value' => '25',
                'type' => 'number',
                'group' => 'courses',
                'description' => 'Maximum students per course',
            ],
            [
                'key' => 'course_cancellation_hours',
                'value' => '48',
                'type' => 'number',
                'group' => 'courses',
                'description' => 'Hours before course start to allow cancellation',
            ],
            [
                'key' => 'certificate_template',
                'value' => 'templates/certificate-default.pdf',
                'type' => 'file',
                'group' => 'courses',
                'description' => 'Default certificate template',
            ],
            [
                'key' => 'auto_approve_registrations',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'courses',
                'description' => 'Automatically approve course registrations',
            ],

            // System Settings
            [
                'key' => 'timezone',
                'value' => 'America/New_York',
                'type' => 'select',
                'group' => 'system',
                'description' => 'Default system timezone',
            ],
            [
                'key' => 'date_format',
                'value' => 'Y-m-d',
                'type' => 'select',
                'group' => 'system',
                'description' => 'Default date format',
            ],
            [
                'key' => 'time_format',
                'value' => 'H:i',
                'type' => 'select',
                'group' => 'system',
                'description' => 'Default time format',
            ],
            [
                'key' => 'items_per_page',
                'value' => '20',
                'type' => 'number',
                'group' => 'system',
                'description' => 'Default items per page for pagination',
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'system',
                'description' => 'Enable maintenance mode',
            ],
            [
                'key' => 'registration_enabled',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'system',
                'description' => 'Allow new user registrations',
            ],

            // SEO Settings
            [
                'key' => 'google_analytics_id',
                'value' => 'GA-XXXXXXXXX-X',
                'type' => 'text',
                'group' => 'seo',
                'description' => 'Google Analytics tracking ID',
            ],
            [
                'key' => 'google_tag_manager_id',
                'value' => 'GTM-XXXXXXX',
                'type' => 'text',
                'group' => 'seo',
                'description' => 'Google Tag Manager ID',
            ],
            [
                'key' => 'meta_robots',
                'value' => 'index,follow',
                'type' => 'text',
                'group' => 'seo',
                'description' => 'Default meta robots tag',
            ],
            [
                'key' => 'sitemap_enabled',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'seo',
                'description' => 'Enable XML sitemap generation',
            ],

            // Notification Settings
            [
                'key' => 'email_notifications',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'notifications',
                'description' => 'Enable email notifications',
            ],
            [
                'key' => 'sms_notifications',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'notifications',
                'description' => 'Enable SMS notifications',
            ],
            [
                'key' => 'admin_notification_email',
                'value' => 'admin@dentalcourseacademy.com',
                'type' => 'email',
                'group' => 'notifications',
                'description' => 'Admin notification email address',
            ],
            [
                'key' => 'notification_frequency',
                'value' => 'immediate',
                'type' => 'select',
                'group' => 'notifications',
                'description' => 'Notification frequency (immediate, daily, weekly)',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
