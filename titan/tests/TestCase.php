<?php

namespace Titan\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Titan\Character;
use Titan\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        $this->followingRedirects();

        parent::setUp(); // TODO: Change the autogenerated stub


        $this->artisan('db:seed', ['--class'=>'AreaSeeder']);
        $this->artisan('db:seed', ['--class'=>'MenuSeeder']);
        $this->artisan('db:seed', ['--class'=>'StatSeeder']);
        $this->artisan('db:seed', ['--class'=>'PermissionSeeder']);

    }

    protected function seedUser() {
        $user = factory(User::class)->create();

        $character = new Character();
        $character->user_id = $user->id;
        $character->display_name = 'Demo';
        $character->save();

        $character->seedStats();

        $user->last_character_played = $character->id;
        $user->save();

        return [$user, $character];
    }
}
