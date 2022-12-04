<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });

        //general Setting
        Setting::create([
            'key' => 'site_title',
            'value' => 'Site Title'
        ]);
        Setting::create([
            'key' => 'site_copyright',
            'value' => 'Copyright © 2022. All Rights Reserved.'
        ]);
        Setting::create([
            'key' => 'logo',
            'value' => 'logo.png'
        ]);
        Setting::create([
            'key' => 'favicon',
            'value' => 'favicon.png'
        ]);
        Setting::create([
            'key' => 'site_color_scheme',
            'value' => 'green'
        ]);
        Setting::create([
            'key' => 'currency',
            'value' => 'usd'
        ]);
        Setting::create([
            'key' => 'user_registration',
            'value' => 1
        ]);
        Setting::create([
            'key' => 'email_verification',
            'value' => 0
        ]);
        Setting::create([
            'key' => 'send_money_fee',
            'value' => 2
        ]);

        Setting::create([
            'key' => 'referral',
            'value' => json_encode([
                'percentage' => 0,
                'commission' => 10,
                'wallet' => 'US Dollar',
            ])
        ]);

        //social Link

        Setting::create([
            'key' => 'facebook_link',
            'value' => '#'
        ]);
        Setting::create([
            'key' => 'instagram_link',
            'value' => '#'
        ]);

        Setting::create([
            'key' => 'twitter_link',
            'value' => '#'
        ]);

        Setting::create([
            'key' => 'pinterest_link',
            'value' => '#'
        ]);


        //GDPR
        Setting::create([
            'key' => 'gdpr_cookie',
            'value' => json_encode([
                'status' => 1,
                'description' => 'test description',
                'url' => 'test description',
                'url_level' => 'test description',
            ])
        ]);

        //Home
        Setting::create([
            'key' => 'home_page',
            'value' => 1
        ]);


        //Plugins

        Setting::create([
            'key' => 'tawk_chat',
            'value' => json_encode([
                'status' => 1,
                'description' => 'test description'
            ])
        ]);

        Setting::create([
            'key' => 'google_recaptcha',
            'value' => json_encode([
                'status' => 1,
                'description' => 'test description'
            ])
        ]);
        Setting::create([
            'key' => 'google_analytics',
            'value' => json_encode([
                'status' => 1,
                'description' => 'test description'
            ])
        ]);
        Setting::create([
            'key' => 'facebook_analytics',
            'value' => json_encode([
                'status' => 1,
                'description' => 'test description'
            ])
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
