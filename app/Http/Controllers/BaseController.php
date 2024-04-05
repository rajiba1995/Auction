<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class BaseController extends Controller
{
    
    protected function setPageTitle($title, $subTitle){
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }
}
