<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    //
    public function index(){
    	$user = Session::get('logged');
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
    	return view('landing.index', ['user'=>$user,'posts'=>$posts]);
    }

    public function about(){
    	$user = Session::get('logged');
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
    	return view('landing.about', ['user'=>$user,'posts'=>$posts]);
    }

    public function services(){
    	$user = Session::get('logged');
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
    	return view('landing.services', ['user'=>$user,'posts'=>$posts]);
    }

    public function works(){
    	$user = Session::get('logged');
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
    	return view('landing.works', ['user'=>$user,'posts'=>$posts]);
    }

    public function contact(){
    	$user = Session::get('logged');
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
    	return view('landing.contact', ['user'=>$user,'posts'=>$posts]);
    }

    public function faqs(){
    	$user = Session::get('logged');
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
    	return view('landing.faqs', ['user'=>$user,'posts'=>$posts]);
    }

    public function blog(){
    	$user = Session::get('logged');
        $news = DB::table('blog')->orderBy('id', 'desc')->paginate(9);
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
    	return view('landing.blog', ['user'=>$user,'news'=>$news,'posts'=>$posts]);
    }

    public function read(){

        if(Input::get('post') !== ''){

            $view = Input::get('post');

            $user = Session::get('logged');
            $news = DB::table('blog')->where('id',$view)->first();
            $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(3);
            return view('landing.read', ['user'=>$user,'news'=>$news,'posts'=>$posts]);

        }else {

            return redirect('/blog');

        }
    }
}
