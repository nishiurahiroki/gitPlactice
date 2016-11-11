<?php

namespace App\Http\Controllers;

use Request;

use Validator;
use DB;
 
class itemController extends Controller
{
    public function itemGet()
    {

        return view('item');
    }

/*
    // バリデーションのエラーメッセージ
    public function messages()
    {
        return [
            'code.required' => '商品コードが必要です。',
            'name.required' => '商品名が必要です。',
        ];
    }
*/
    
    public function itemPost(Request $request)
    {

        // バリデーションのルール
        $rules = [    // ②
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date',
        ];
        $this->validate($request, $rules);  // ③
 
        Article::create($request->all());
 
        return redirect('articles');
    }


/*

        $validator = Validator::make($request, array(
            'code' => 'required',
            'name' => 'required',
            'suu' => 'numeric'
        ));

        if ($validator->fails())
        {
            $messages = $validator->messages();
            $name = $messages->first('name');
            
            return $name;

/*
            $code = $messages->first('code');

            return view('item_complete', compact('code'));
*/
        }

    if(isset($_POST['add'])) {

/*
        return view('sample', compact('name'));
*/
        $code  = Request::input('code');
        $name  = Request::input('name');
        $kin   = Request::input('kin');
        $suu   = Request::input('suu');
        $isPRr = Request::input('isPR');

        $isPR = 0;
        if($isPRr = true) {
            $isPR = 1;
        }

        DB::table('item_tbl')->insert([
                'itemcd'  =>$code,
                'itemname'=>$name,
                'kin'     =>$kin,
                'suu'     =>$suu,
                'isPR'    =>$isPR
            ]);
            
        $code = Request::input('code');
        return view('item_complete', compact('code'));

        }
    else if(isset($_POST['del'])) {

        DB::delete('delete from item_tbl');

        return "商品を削除しました。";
        }
    }

}


?>

