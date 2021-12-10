<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Starbucks;
use App\Starbucksdrink;

class StarbucksController extends Controller
{
    //
    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Starbucks::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Starbucks::all();
      }
      return view('general.starbucks.index',[ 'posts' => $posts, 'cond_title' => $cond_title]);
    }
    public function indexdrink(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Starbucksdrink::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Starbucksdrink::all();
      }
      return view('general.starbucks.indexdrink',[ 'posts' => $posts, 'cond_title' => $cond_title]);
    }
}
