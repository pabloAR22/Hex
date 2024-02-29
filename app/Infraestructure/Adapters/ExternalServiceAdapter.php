<?php

namespace App\Infraestructure\Adapters;

use App\Infraestructure\Services\ExternalService;

class ExternalServiceAdapter {
    
    public function __construct(private ExternalService $externalService)
    {
        
    }
}