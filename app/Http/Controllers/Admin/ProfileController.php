<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function add(){
        return view('admin.profile.create');
    }
    public function create(){
        
        // 以下を追記
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

    
    if (isset($form['image'])) {
       $path = Storage::disk('s3')->putFile('/',$news_form['image'],'public');
       $news->image_path = Storage::disk('s3')->url($path);
    } else {
        $news->image_path = null;
    }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
     
        return redirect('admin/profile/create');
    }
    public function edit(){
        return view('admin.profile.edit');
    }
    public function update(){
        return redirect('admin/profile/edit');
    }
    

}
