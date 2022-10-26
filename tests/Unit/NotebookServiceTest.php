<?php

namespace Tests\Unit;

use App\Models\Notebook;
use App\Service\Notebook\Service;
use Tests\TestCase;

class NotebookServiceTest extends TestCase
{

    public function test_isExist()
    {
        $notebook = Notebook::factory()->create();
        $service = new Service;
        $this->assertTrue($service->isExist($notebook->id));
        $this->assertFalse($service->isExist(0));
    }
}
