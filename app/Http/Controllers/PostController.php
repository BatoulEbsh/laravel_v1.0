<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Cookie as CookieAlias;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class PostController extends Controller
{
    use  GeneralTrait;
    public  function show (Post $post){
        if (Cookie::get($post->id)!=''){
            Cookie::set('$post->id','1','60');
            $post->incrementReadCount();
        }
        return $this->returnData('read number',compact($post));

    }
}
