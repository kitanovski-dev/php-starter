<?php

namespace App\Src\Actions\User;

use App\Core\Request;

class IndexUserAction
{
    protected $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    
    public function __invoke()
    {
        return json_encode([
            'data'  => 'User Page',
            'id'    => $this->request->getData()
        ]);
    }
}
