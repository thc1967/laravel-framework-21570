<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected $user;

    protected function signIn()
    {
        $this->user = factory(\App\User::Class)->create();

        $this->actingAs($this->user);

        return $this;
    }
}
