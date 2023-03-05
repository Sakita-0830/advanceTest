<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class ManagementController extends Controller{
    public function management(){
        $data = Inquiry::Paginate(10);
        return view('management', ['data' => $data]);
    }

    public function search(Request $request){
        $Inquiry = Inquiry::all();
        $data = null;
        //dd($request);
        foreach($Inquiry as $Inquiry){
            // 名前のみ入力
            if(isset($request->name) && $request->sex == "全て" && empty($request->created_at_after) && empty($request->created_at_before) && empty($request->email)){
                $data = Inquiry::orWhere('surname', 'LIKE', "%{$request->name}%")
                ->orWhere('name', 'LIKE', "%{$request->name}%")->orWhereRaw('CONCAT(surname, "", name) LIKE ? ', '%' . $request->name . '%')->Paginate(10);;
            } 
            // 性別のみ入力
            elseif(empty($request->name) && $request->sex !== "全て" && empty($request->created_at_after) && empty($request->created_at_before) && empty($request->email)){
                $data = Inquiry::Where('sex', 'LIKE BINARY',"%{$request->sex}%")->Paginate(10);
            }
            // 登録日(after)のみ入力
            elseif(empty($request->name) && $request->sex == "全て" && isset($request->created_at_after) && empty($request->created_at_before) && empty($request->email)){
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $data = Inquiry::whereDate('created_at', '>=', $created_after)->Paginate(10);;
            }
            // 登録日(before)のみ入力
            elseif(empty($request->name) && $request->sex == "全て" && empty($request->created_at_after) && isset($request->created_at_before) && empty($request->email)){
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));
                $data = Inquiry::whereDate('created_at', '<=', $created_before)->Paginate(10);;
            }
            // emailのみ入力
            elseif(empty($request->name) && $request->sex == "全て" && empty($request->created_at_after) && empty($request->created_at_before) && isset($request->email)){
                $data = Inquiry::Where('email', 'LIKE BINARY',"%{$request->email}%")->Paginate(10);;
            }
            // お名前,性別を入力
            elseif(isset($request->name) && $request->sex !== "全て" && empty($request->created_at_after) && empty($request->created_at_before) && empty($request->email)){
                $data = Inquiry::where('sex', 'LIKE BINARY',"%{$request->sex}%")
                ->where(function($sql) use($request){
                $sql->orWhere('surname', 'LIKE', "%{$request->name}%")
                ->orWhere('name', 'LIKE', "%{$request->name}%")->orWhereRaw('CONCAT(surname, "", name) LIKE ? ', '%' . $request->name . '%');
                })
                ->Paginate(10);;
            } 
            // お名前,性別,登録日(after)を入力
            elseif(isset($request->name) && $request->sex !== "全て" && isset($request->created_at_after) && empty($request->created_at_before) && empty($request->email)){
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $data = Inquiry::where('sex', 'LIKE BINARY',"%{$request->sex}%")
                ->where(function($sql) use($request){
                $sql->orWhere('surname', 'LIKE', "%{$request->name}%")
                ->orWhere('name', 'LIKE', "%{$request->name}%")->orWhereRaw('CONCAT(surname, "", name) LIKE ? ', '%' . $request->name . '%');
                })
                ->where(function($sql) use ($created_after){
                    $sql->whereDate('created_at', '>=', $created_after);
                })
                ->Paginate(10);;
            }
            // お名前,性別,登録日(after,before)を入力
            elseif(isset($request->name) && $request->sex !== "全て" && isset($request->created_at_after) && isset($request->created_at_before) && empty($request->email)){
                // 入力した登録日のフォーマット変換
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));

                $data = Inquiry::where('sex', 'LIKE BINARY',"%{$request->sex}%")
                ->where(function($sql) use($request){
                $sql->orWhere('surname', 'LIKE', "%{$request->name}%")
                ->orWhere('name', 'LIKE', "%{$request->name}%")->orWhereRaw('CONCAT(surname, "", name) LIKE ? ', '%' . $request->name . '%');
                })
                ->where(function($sql) use ($created_after){
                    $sql->whereDate('created_at', '>=', $created_after);
                })
                ->where(function($sql) use($created_before){
                    $sql->whereDate('created_at', '<=', $created_before);
                })
                ->Paginate(10);;
            }
            // お名前,性別,登録日(after,before),メールアドレスを入力
            elseif(isset($request->name) && $request->sex !== "全て" && isset($request->created_at_after) && isset($request->created_at_before) && isset($request->email)){
                // 入力した登録日のフォーマット変換
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));

                $data = Inquiry::where('sex', 'LIKE BINARY',"%{$request->sex}%")
                ->where(function($sql) use($request){
                $sql->orWhere('surname', 'LIKE', "%{$request->name}%")
                ->orWhere('name', 'LIKE', "%{$request->name}%")->orWhereRaw('CONCAT(surname, "", name) LIKE ? ', '%' . $request->name . '%');
                })
                ->where(function($sql) use ($created_after){
                    $sql->whereDate('created_at', '>=', $created_after);
                })
                ->where(function($sql) use($created_before){
                    $sql->whereDate('created_at', '<=', $created_before);
                })
                ->where(function($sql) use($request){
                    $sql->Where('email', 'LIKE BINARY',"%{$request->email}%");
                })
                ->Paginate(10);;
            }
            // 性別,登録日(after)を入力
            elseif(empty($request->name) && $request->sex !== "全て" && isset($request->created_at_after) && empty($request->created_at_before) && empty($request->email)){
                // 入力した登録日のフォーマット変換
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));

                $data = Inquiry::where('sex', 'LIKE BINARY',"%{$request->sex}%")
                ->where(function($sql) use ($created_after){
                    $sql->whereDate('created_at', '>=', $created_after);
                })
                ->Paginate(10);;
            }
            // 性別,登録日(after,before)を入力
            elseif(empty($request->name) && $request->sex !== "全て" && isset($request->created_at_after) && isset($request->created_at_before) && empty($request->email)){
                // 入力した登録日のフォーマット変換
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));

                $data = Inquiry::where('sex', 'LIKE BINARY',"%{$request->sex}%")
                ->where(function($sql) use ($created_after){
                    $sql->whereDate('created_at', '>=', $created_after);
                })
                ->where(function($sql) use($created_before){
                    $sql->whereDate('created_at', '<=', $created_before);
                })
                ->Paginate(10);;
            }
            // 性別,登録日(after,before),メールアドレスを入力
            elseif(empty($request->name) && $request->sex !== "全て" && isset($request->created_at_after) && isset($request->created_at_before) && isset($request->email)){
                // 入力した登録日のフォーマット変換
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));

                $data = Inquiry::where('sex', 'LIKE BINARY',"%{$request->sex}%")
                ->where(function($sql) use ($created_after){
                    $sql->whereDate('created_at', '>=', $created_after);
                })
                ->where(function($sql) use($created_before){
                    $sql->whereDate('created_at', '<=', $created_before);
                })
                ->where(function($sql) use($request){
                    $sql->Where('email', 'LIKE BINARY',"%{$request->email}%");
                })
                ->Paginate(10);;
            }
            // 登録日(after,before)を入力
            elseif(empty($request->name) && $request->sex == "全て" && isset($request->created_at_after) && isset($request->created_at_before) && empty($request->email)){
                // 入力した登録日のフォーマット変換
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));

                $data = Inquiry::whereDate('created_at', '>=', $created_after)
                ->where(function($sql) use($created_before){
                    $sql->whereDate('created_at', '<=', $created_before);
                })
                ->Paginate(10);;
            }
            // 登録日(after,before),メールアドレスを入力
            elseif(empty($request->name) && $request->sex == "全て" && isset($request->created_at_after) && isset($request->created_at_before) && isset($request->email)){
                // 入力した登録日のフォーマット変換
                $created_after = date('Y-m-d H:i:s', strtotime($request->created_at_after));
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));

                $data = Inquiry::whereDate('created_at', '>=', $created_after)
                ->where(function($sql) use($created_before){
                    $sql->whereDate('created_at', '<=', $created_before);
                })
                ->where(function($sql) use($request){
                    $sql->Where('email', 'LIKE BINARY',"%{$request->email}%");
                })
                ->Paginate(10);;
            }
            // 登録日(before),メールアドレスを入力
            elseif(empty($request->name) && $request->sex == "全て" && empty($request->created_at_after) && isset($request->created_at_before) && isset($request->email)){
                // 入力した登録日のフォーマット変換
                $created_before = date('Y-m-d H:i:s', strtotime($request->created_at_before));

                $data = Inquiry::whereDate('created_at', '<=', $created_before)
                ->where(function($sql) use($request){
                    $sql->Where('email', 'LIKE BINARY',"%{$request->email}%");
                })
                ->Paginate(10);;
            }
            else{
                $data = Inquiry::Paginate(10);
            }
        }
        return view('management', ['data' => $data]);
    }

    public function delete(Request $request){
        Inquiry::find($request->id)->delete();
        return redirect('/management');
    }

}
