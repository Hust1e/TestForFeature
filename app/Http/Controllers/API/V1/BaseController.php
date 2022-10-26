<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Service\Notebook\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
