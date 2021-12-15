<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Starbucks;
use App\Starbucksdrink;

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

  public function index(Request $request)
  {
    $posts = Starbucks::all();
    
    return view('admin.starbucks.index',[ 'posts' => $posts]);
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

      return redirect('admin.starbucks.index');
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
      return redirect('starbucks');
  } 
public function delete(Request $request)
  {
      // 該当するStarbucks Modelを取得
      $starbucks = Starbucks::find($request->id);
      // 削除する
      $starbucks->delete();
      return redirect('admin/starbucks/');
  }
public function reviewdrink()
{
    return view('admin/starbucks/reviewdrink');
}
 public function indexdrink(Request $request)
  {
    $posts = Starbucksdrink::all();
    
    return view('admin.starbucks.indexdrink',[ 'posts' => $posts]);
  }
public function createdrink(Request $request)
  {
      // Validationを行う
      $this->validate($request, Starbucksdrink::$rules);
      $starbucksdrink = new Starbucksdrink();
      $form = $request->all();
     

      // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $starbucksdrink->image_path = basename($path);
      } else {
          $starbucksdrink->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $starbucksdrink->fill($form);
      $starbucksdrink->save();

      return redirect('starbucksdrink');
  }
public function editdrink(Request $request)
  {
      // Starbucksdrink Modelからデータを取得する
      $starbucksdrink = Starbucksdrink::find($request->id);
      
      if (empty($starbucksdrink)) {
        abort(404);    
      }
      return view('admin.starbucks.editdrink', ['starbucksdrink_form' => $starbucksdrink]);
  }
public function updatedrink(Request $request)
{
     $this->validate($request, Starbucks::$rules);
      // Starbucksdrink Modelからデータを取得する
      $starbucksdrink = Starbucksdrink::find($request->id);
      // 送信されてきたフォームデータを格納する
      $starbucksdrink_form = $request->all();
      if ($request->remove == 'true') {
          $starbucksdrink_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $starbucksdrink_form['image_path'] = basename($path);
      } else {
          $starbucksdrink_form['image_path'] = $starbucksdrink->image_path;
      }

      unset($starbucksdrink_form['image']);
      unset($starbucksdrink_form['remove']);
      unset($starbucksdrink_form['_token']);
      // 該当するデータを上書きして保存する
      $starbucksdrink->fill($starbucksdrink_form)->save();
      return redirect('starbucksdrink');
}
public function deletedrink(Request $request)
{
   $starbucksdrink = Starbucksdrink::find($request->id);
      // 削除する
      $starbucksdrink->delete();
      return redirect('starbucksdrink'); 
}
}

