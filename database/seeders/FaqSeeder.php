<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What services does Adsaro Nepal offer?',
                'answer' => 'Adsaro Nepal offers full IT services in Nepal under one place. We provide UI/UX design, web development, app development, SEO services, graphic design, digital marketing, and more.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Do you build mobile-friendly websites?',
                'answer' => 'Yes! Our web development team creates fast, secure, and mobile-friendly websites that look great on any device.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Can you build mobile apps for Android and iOS?',
                'answer' => 'Absolutely. We build custom mobile apps for both Android and iOS, helping your business connect with users on the go.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'What is UI/UX design and do you offer it?',
                'answer' => 'Yes, we offer UI/UX design services. UI and UX make your website or app easy, attractive, and user-friendly.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide digital marketing services?',
                'answer' => 'Yes. Our services include SEO, Google Ads, social media marketing, and content promotion to grow your online presence.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'Which is the best IT company in Nepal?',
                'answer' => 'Adsaro Nepal is one of the best IT companies in Nepal offering all services under one roof.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'Can I promote my business on Google and social media?',
                'answer' => 'Yes! We offer Google Ads, Facebook/Instagram Ads, and content promotion to help reach your audience online.',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Is Adsaro Nepal good for beginners and small businesses?',
                'answer' => 'Yes. We provide clear communication and affordable packages for startups and small businesses.',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'question' => 'How do I rank my website on Google from Nepal?',
                'answer' => 'Use our expert SEO services! We provide backlinks, on-page optimization, local SEO, and technical improvements to boost your ranking.',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'question' => 'How can I contact Adsaro Nepal?',
                'answer' => "📞 Call Us: 9818439664\n📧 Email: info@Adsaro.com\n📍 Visit Us: Trade Tower, 5th Floor, Kathmandu",
                'order' => 10,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
