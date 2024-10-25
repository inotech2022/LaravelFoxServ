<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected function setUp(): void
{
    parent::setUp();

    // Força o teste a usar HTTP, caso HTTPS seja obrigatório
    $this->withoutMiddleware(\Illuminate\Routing\Middleware\RequireHttps::class);
}
}
