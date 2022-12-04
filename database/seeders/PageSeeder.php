<?php

namespace Database\Seeders;

use App\Models\Page;
use DB;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();

        $about = [
            'breadcrumb_title' => 'About Us',
            'section_title' => 'About us',
            'section_span' => 'best',
            'section_big_title' => 'Explore Us, Know About Us',
            'content' => 'Sit amet consectetur adipisicing elit. Doloremque, similique! Magni ullam quas deleniti et fugit cumque animi praesentium. Eum eos alias facere recusandae, quidem culpa magni officiis. Nisi, ullam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum voluptate',
            'cover_image' => 'cover_img.png',
            'main_content' => 'Voluptatum cupiditate amet ratione numquam accusamus assumenda, reprehenderit illum voluptatem sapiente vitae debitis reiciendis nesciunt qui! Maxime, nobis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi aperiam animi placeat eaque cum optio ullam? Dolore, eveniet doloribus numquam molestias, distinctio natus culpa, quia quam in cumque voluptates sapiente! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, itaque corporis ipsa non, veritatis vel aliquam libero ratione nulla enim voluptates culpa mollitia dolores molestias rem. Necessitatibus quo id nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veritatis possimus natus dignissimos doloribus? Maxime consequuntur optio obcaecati praesentium ad minus, deleniti nemo? Iure, itaque vitae ratione neque veritatis necessitatibus.',

            'testimonial_title' => 'What our client says',
            'testimonial_span' => 'new',
            'testimonial_big_title' => 'Player Words',

            'testimonial_1' => "Got a best place to play with dream from them, it's amazing fast and get what I expect. Highly Recomended!!",
            'testimonial_1_image' => 'avatar.png',
            'testimonial_1_profile_name' => 'avatar.png',


            'testimonial_2' => "Got a best place to play with dream from them, it's amazing fast and get what I expect. Highly Recomended!!",
            'testimonial_2_image' => 'avatar.png',
            'testimonial_2_profile_name' => 'avatar.png',

            'testimonial_3' => "Got a best place to play with dream from them, it's amazing fast and get what I expect. Highly Recomended!!",
            'testimonial_3_image' => 'avatar.png',
            'testimonial_3_profile_name' => 'avatar.png',
        ];

        $contact = [
            'breadcrumb_title' => 'Message Us',
            'section_title' => 'Any query?',
            'section_span' => 'NEW',
        ];

        $privacyPolicy = [
            'breadcrumb_title' => 'Privacy Policy',
            'section_title' => 'Rules & Policy',
            'section_span' => 'NEW',
            'main_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque perferendis autem placeat magnam voluptas, aliquid eius distinctio nulla fuga at dolor dolorum rem corrupti assumenda repellat commodi voluptatem modi omnis? Tristique tristique, odio ullamcorper aspernatur praesent, vestibulum egestas vestibulum enim blandit non, placerat pellentesque dolor ut. Conntum blandit. Velit erat sit, consectetuer tincidunt, dictum fermentum eu a lacinia. Mauris suscipit sit hymenaeos cras molestie purus, integer pede est ac, ultricies euismod habitasse lorem lorem ut. Ante sollicitudin nec et donec. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad explicabo vero ipsa placeat, quo in consequatur et, quae distinctio, sequi expedita dolores libero accusamus delectus itaque debitis quas excepturi voluptatum!',
        ];

        $affiliate = [
            'breadcrumb_title' => 'Join Affiliate Program',
            'section_title' => 'Any query?',
            'section_span' => 'NEW',
            'section_big_title' => 'How Affiliate Works',

            'step_icon_1' => 'flaticon-007-user',
            'step_title_1' => 'Signin Account',
            'step_content_1' => 'Nobis, quasi porro eligendi eos inventore dignissimos, velit necessitatibus quaerat',

            'step_icon_2' => 'flaticon-038-agreement',
            'step_title_2' => 'Refer Friend',
            'step_content_2' => 'Nobis, quasi porro eligendi eos inventore dignissimos, velit necessitatibus quaerat',

            'step_icon_3' => 'flaticon-034-bank',
            'step_title_3' => 'Earn Instantly',
            'step_content_3' => 'Nobis, quasi porro eligendi eos inventore dignissimos, velit necessitatibus quaerat',
        ];

        $faq = [
            'breadcrumb_title' => 'Find Questions',
            'section_title' => 'Any asking?',
            'section_span' => 'NEW',
            'button-text' => 'STILL ASKING?'
        ];


        $data = [
            [
                'label' => 'About',
                'url' => '/page/about',
                'component' => json_encode($about),
                'type' => 'static',
            ],
            [
                'label' => 'Contact',
                'url' => '/page/contact',
                'component' => json_encode($contact),
                'type' => 'static',
            ],

            [
                'label' => 'Affiliate',
                'url' => '/page/affiliate',
                'component' => json_encode($affiliate),
                'type' => 'static',
            ],

            [
                'label' => 'Privacy Policy',
                'url' => '/page/privacy-policy',
                'component' => json_encode($privacyPolicy),
                'type' => 'static',
            ],

            [
                'label' => 'FAQ',
                'url' => '/page/faq',
                'component' => json_encode($faq),
                'type' => 'static',
            ],
        ];

        DB::table('pages')->insert($data);
    }
}
