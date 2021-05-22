<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        //ユーザ一覧をidの降順で取得
        $users = User::orderBy('id','desc')->paginate(10);
        
        //ユーザ一覧ビューでそれを表示
        return view('users.index',[
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        //idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザの投稿一覧を登山日(date)の降順で取得
        $logs = $user->logs()->orderBy('date','desc')->paginate(5);
        
        //ユーザ詳細ビューでそれを表示
        return view('users.show',[
            'user' => $user,
            'logs' => $logs,
        ]);
    }
}
