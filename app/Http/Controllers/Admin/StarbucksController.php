<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Starbucks;

class StarbucksController extends Controller
{
  public function home()
  {
      return view('admin.starbucks.home');
  }
  public function review()
  {
      return view('admin.starbucks.review');
  }

  public function create(Request $request)
  {
      // Validationを行う
      $this->validate($request, Starbucks::$rules);
      $starbucks = new Starbucks();
      $form = $request->all();
     

      // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $starbucks->image_path = basename($path);
      } else {
          $starbucks->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $starbucks->fill($form);
      $starbucks->save();

      return redirect('admin/starbucks/home');
  }

  // 以下を追記
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
      return view('admin.starbucks.index',[ 'posts' => $posts, 'cond_title' => $cond_title]);
  }
  public function edit(Request $request)
  {
      // Starbucks Modelからデータを取得する
      $starbucks = Starbucks::find($request->id);
      
      if (empty($starbucks)) {
        abort(404);    
      }
      return view('admin.starbucks.edit', ['starbucks_form' => $starbucks]);
  }


public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Starbucks::$rules);
      // News Modelからデータを取得する
      $starbucks = Starbucks::find($request->id);
      // 送信されてきたフォームデータを格納する
      $starbucks_form = $request->all();
      if ($request->remove == 'true') {
          $starbucks_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $starbucks_form['image_path'] = basename($path);
      } else {
          $starbucks_form['image_path'] = $starbucks->image_path;
      }

      unset($starbucks_form['image']);
      unset($starbucks_form['remove']);
      unset($starbucks_form['_token']);
      // 該当するデータを上書きして保存する
      $starbucks->fill($starbucks_form)->save();
      return redirect('admin/starbucks');
  } 
public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $starbucks = Starbucks::find($request->id);
      // 削除する
      $starbucks->delete();
      return redirect('admin/starbucks/');
  }
}

