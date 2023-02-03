<?php

namespace Allekslar\MonofonyDemoBackendBundle\Tests;

use Allekslar\MonofonyDemoBackendBundle\MonofonyDemoBackendBundle;
use PHPUnit\Framework\TestCase;

class MonofonyDemoBackendBundleTest extends TestCase
{
    public function testGetPath(): void
    {
        $this->assertSame(\dirname(__DIR__), (new MonofonyDemoBackendBundle())->getPath());
    }
}
