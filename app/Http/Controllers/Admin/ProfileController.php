<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;//足りなかった。最初小文字だった。

class ProfileController extends Controller
{
    //
    public function add(){
        return view('admin.profile.create');
    }
    
    public function create(Request $request){
        
        // 以下を追記
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      unset($form['_token']);//追加

      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
     
      return redirect('admin/profile/create');
    }
    
    public function edit(Request $request){
        
        // profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(){
        
    
      return redirect('admin/profile/');
  }  
    

}
