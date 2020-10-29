<?php

namespace App\Breadcrumbs;

use Illuminate\Http\Request;
use App\Breadcrumbs\Segment;

class Breadcrumbs
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function segments()
    {
        return collect($this->request->segments())->map(function ($segment){
            return new Segment($this->request, $segment);
        })->toArray();
    }

}
