<?php

namespace Database\Seeders;

use App\Models\Home;
use DB;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Home::truncate();

        $bannerSection = [
            'spam' => 'NEW',
            'spam_title' => 'Make payment and deposit online',
            'title' => 'THE LOWEST 1.55% FEE WALLET',
            'line' => [
                'Cupiditate error, ipsa quos quis nam',
                'Cupiditate error, ipsa quos quis nam',
                'Cupiditate error, ipsa quos quis nam',
                'Cupiditate error, ipsa quos quis nam',
            ],
            'button_text' => 'Account',
            'button_link' => '#',
            'background_image' => 'front-assets/images/images/banner/11.jpg',
            'foreground _image' => 'front-assets/images/images/banner/11.jpg'
        ];
        $locationMap = [
            'image' => 'front-assets/images/world-map-3.png'
        ];
        $specialSection = [
            'spam' => 'NEW',
            'spam_title' => 'Why Choose us',
            'title' => "We're Special",

        ];
        $aboutSection = [
            'spam' => 'NEW',
            'spam_title' => 'What we do?',
            'title' => "There Is What We Do",

            'image' => 'front-assets/images/about.jpg',
            'video_link' => 'https://www.youtube.com/watch?v=DJyxwIGdl8Y',

            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, veniam. Quisquam dicta, atque nemo error impedit necessitatibus, incidunt rem architecto optio facilis aut illo labore numquam et soluta quo. Ratione! Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem aliquam amet nulla eius voluptates rem numquam ipsa, dolores ratione soluta quo tempora, quis sit. Amet fugit autem nobis officiis eius.',
            'paragraph_title_1' => 'Mission',
            'paragraph_content_1' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni, velit. Facere pariatur iste cupiditate ea, animi nihil dolor iusto amet error libero aut deleniti quas laboriosam accusamus, unde quisquam dolorem. Lorem ipsum, dolor sit amet consectetur adipisicing elit',

            'paragraph_title_2' => 'Vission',
            'paragraph_content_2' => 'Inventore? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, inventore quae laudantium accusamus adipisci sequi veritatis saepe aspernatur libero fuga illo voluptas nihil. Sequi, quis aspernatur! Deserunt pariatur quas reiciendis!',
            'button_text' => 'CONTINUE READING',
            'button_link' => '#'

        ];
        $solution = [
            'spam' => 'NEW',
            'spam_title' => 'Anyone can use',
            'title' => "Solutions For",

        ];
        $steps = [
            'spam' => 'NEW',
            'spam_title' => "What we're doing?",
            'title' => "Follow This Stepts",
        ];
        $bestUsers = [
            'spam' => 'NEW',
            'spam_title' => "Top Users",
            'title' => "Best Users",
            'button_text' => 'SIGNUP NOW',
            'button_link' => '#'
        ];
        $referralCommission = [
            'title' => 'Get the bonus up to',
            'up_bonus' => '$199',
            'button_text' => 'SIGNUP NOW',
            'button_link' => '#',
            'title_2' => 'Lastest bonus winners',

        ];
        $testimonial = [
            'spam' => 'NEW',
            'spam_title' => "What users say about us",
            'title' => "You Will Get Confident To Start Using Us",


        ];
        $mobileFeature = [
            'spam' => 'NEW',
            'spam_title' => "Mobile app",
            'title' => "Get Your Mobile Now",

            'image' => 'front-assets/images/mobile.png',
            'image_2' => 'front-assets/images/mobile-2.png',
            'image_3' => 'front-assets/images/mobile-3.png',
            'image_4' => 'front-assets/images/mobile-4.png',
            'image_5' => 'front-assets/images/mobile-5.png'

        ];
        $team = [
            'spam' => 'NEW',
            'spam_title' => "Team",
            'title' => "Our Team",
        ];
        $blog = [
            'spam' => 'NEW',
            'spam_title' => "Blog section",
            'title' => "Latest News",
        ];
        $paymentGateway = [

            [
                'image' => 'front-assets/images/payments/1.png',
                'link' => '#'
            ],

            [
                'image' => 'front-assets/images/payments/2.png',
                'link' => '#'
            ],

            [
                'image' => 'front-assets/images/payments/3.png',
                'link' => '#'
            ],

            [
                'image' => 'front-assets/images/payments/4.png',
                'link' => '#'
            ],

            [
                'image' => 'front-assets/images/payments/5.png',
                'link' => '#'
            ],

            [
                'image' => 'front-assets/images/payments/1.png',
                'link' => '#'
            ],

            [
                'image' => 'front-assets/images/payments/1.png',
                'link' => '#'
            ],

            [
                'image' => 'front-assets/images/payments/6.png',
                'link' => '#'
            ],
        ];
        $subscribe = [
            'spam' => 'TOP',
            'spam_title' => "Stay updated",
            'button_text' => "SUBSCRIBE",
        ];

        $data = [
            [
                'name' => 'banner_section',
                'sort' => 1,
                'background_color' => 'blue-bg',
                'status' => 1,
                'content' => json_encode($bannerSection),
                'blade' => '__hero_area'
            ],
            [
                'sort' => 2,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'location_map',
                'content' => json_encode($locationMap),
                'blade' => '__map'
            ],
            [
                'sort' => 3,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'special_section',
                'content' => json_encode($specialSection),
                'blade' => '__why_choose_us'
            ],
            [
                'sort' => 4,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'about_section',
                'content' => json_encode($aboutSection),
                'blade' => '__about_area'
            ],
            [
                'sort' => 5,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'solution',
                'content' => json_encode($solution),
                'blade' => '__solution_section'
            ],
            [
                'sort' => 6,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'steps',
                'content' => json_encode($steps),
                'blade' => '__what_we_do'
            ],
            [
                'sort' => 7,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'referral_commission',
                'content' => json_encode($referralCommission),
                'blade' => '__call_to_action'
            ],
            [
                'sort' => 8,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'best_user',
                'content' => json_encode($bestUsers),
                'blade' => '__new_user_area'
            ],
            [
                'sort' => 9,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'counter',
                'content' => '',
                'blade' => '__counter_area'
            ],
            [
                'sort' => 10,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'testimonial',
                'content' => json_encode($testimonial),
                'blade' => '__testimonials'
            ],
            [
                'sort' => 11,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'mobile_feature',
                'content' => json_encode($mobileFeature),
                'blade' => '__mobile_app'
            ],
            [
                'sort' => 12,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'team',
                'content' => json_encode($team),
                'blade' => '__team_section'
            ],
            [
                'sort' => 13,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'blog',
                'content' => json_encode($blog),
                'blade' => '__blog_section'
            ],
            [
                'sort' => 14,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'payment_gateway',
                'content' => json_encode($paymentGateway),
                'blade' => '__payment_area'
            ],
            [
                'sort' => 15,
                'background_color' => 'blue-bg',
                'status' => 1,
                'name' => 'subscribe',
                'content' => json_encode($subscribe),
                'blade' => '__newsletter'
            ],

        ];

        DB::table('homes')->insert($data);
    }
}


