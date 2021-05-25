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

/*//storeを修正するようバックアップ    
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'date' =>'required',
            'title' =>'required|max:255',
            'content'=>'required|max:255',
            'image' =>'required|image',
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
*///

    
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
        }
        
        //トップページへリダイレクトさせる
        return redirect('/');
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
        return back();
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'date' =>'required',
            'title' =>'required|max:255',
            'content'=>'required|max:255',
            'image' =>'required|image',
        ]);

/*        
        //認証済みユーザの投稿として作成(リクエストされた値をもとに作成)
        $request->user()->logs()->create([
            'date' => $request->date,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);
*/        
        $date = $request->date;
        $title = $request->title;
        $content = $request->content;
        
        //拡張子付きでファイル名を取得
        $imageName = $request->file('image')->getClientOriginalName();
        
        //拡張子のみ
        $extension = $request->file('image')->getClientOriginalExtension();
        
        //新しいファイル名を生成(形式：元のファイル名_ランダムの英数字.拡張子）
        $newImageName = pathinfo($imageName,PATHINFO_FILENAME) . "_" . uniqid() . "$extension";
    
        //tmpフォルダに移動
        $request->file('image')->move(public_path() . "/img/tmp", $newImageName);
        $image = "/img/tmp/" . $newImageName;

        
        return view('logs.confirm',[
            'date' => $date,
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'newImageName' => $newImageName,
        ]);
    }
   
    public function complete(Request $request)
    {
        $log = new Log();
        $log ->user_id = \Auth::user()->id;
        $log ->date = $request->date;
        $log ->title = $request->title;
        $log->content = $request->content;
        $log->image = $request->image;
        $log->save();
        
        //レコードを挿入したときのIDを取得
        $lastInsertedId = $log->id;
        
        //ディレクトリを作成
        if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
            mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
        }
        
        
        //一時保存から本番の格納場所へ移動
        rename(public_path(). "/img/tmp/" . $request->image, public_path() . "/img/" . $lastInsertedId . "/" . $request->image);
        
        //一時保存の画像を削除
        \File::cleanDirectory(public_path()."/img/tmp");
        
        return redirect('/');
    }
}
