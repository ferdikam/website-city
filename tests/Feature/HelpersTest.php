<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelpersTest extends TestCase
{
    /** @test */
    public function set_active_route_should_return_class()
    {
    	$this->get(route('home'));
    	$this->assertEquals('active', set_active_route('home'));
    	$this->assertEquals('', set_active_route('page.index'));

    	$this->get(route('page.index'));
    	$this->assertEquals('active', set_active_route('page.index'));
    	$this->assertEquals('', set_active_route('home'));
    }
}
