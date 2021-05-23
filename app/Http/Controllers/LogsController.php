<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogsController extends Controller
{
    public function index()
    {
        $data = [];
        if(\Auth::check()){ //認証済みの場合
            //認証済みユーザを取得
            $user = \Auth::user();
            //ユーザの投稿の一覧を登山日の降順で取得
            $logs = $user->logs()->orderBy('date', 'desc')->paginate(5);
        
            $data = [
                'user' => $user,
                'logs' => $logs,
            ];
        }
    
        //welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'title' =>'required|max:255',
            'content'=>'required|max:255',
        ]);
        
        //認証済みユーザの投稿として作成(リクエストされた値をもとに作成)
        $request->user()->logs()->create([
            'date' => $request->date,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);
        
        //前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        //idの値で投稿を検索して取得
        $log = Log::findOrFail($id);
        
        //認証済みユーザがその投稿の所有者である場合は、投稿を削除
        if(\Auth::id() === $log->user_id){
            $log->delete();
        }
        
        //前のURLへリダイレクトさせる
        return back();
    }
    
    public function show($id)
    {
        //idの値で投稿を検索して取得
        $log = Log::findOrFail($id);
        
        if(\Auth::check()){ //認証済みの場合
            //投稿詳細ビューでそれを表示
            return view('logs.show',[
                'log' => $log,
            ]);
            
            dd($log);
        }
        
        //トップページへリダイレクトさせる
        return view(welcome);
    }
    
    public function create()
    {
        $log = new Log;
        if(\Auth::check()){ //認証済みの場合
            //ログ作成ビューを表示
            return view('logs.create',[
                'log' => $log,
            ]);
        }
        //前のURLへリダイレクトさせる
        return redirect('/');
    }
}