<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function write(Request $request)
    {
        // POSTデータ取得
        $houjin = $request->input('houjin');
        $tanto = $request->input('tanto');
        $com_email = $request->input('com_email');
        $com_tel = $request->input('com_tel');
        $types = $request->input('types');
        $zipcode = $request->input('zipcode');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $address3 = $request->input('address3');
        $pass = $request->input('pass');
        $confirm_pass = $request->input('confirm_pass'); // 追加

        $pass = Hash::make($pass); // パスワードのハッシュ化

        // Check if record exists
        $exists = DB::table('bizdiverse_company')
            ->where('com_email', $com_email)
            ->orWhere('com_tel', $com_tel)
            ->first();

        if ($exists) {
            // Record exists, update it
            DB::table('bizdiverse_company')
                ->where('company_id', $exists->company_id)
                ->update([
                    'houjin' => $houjin,
                    'tanto' => $tanto,
                    'com_email' => $com_email,
                    'com_tel' => $com_tel,
                    'types' => $types,
                    'zipcode' => $zipcode,
                    'address1' => $address1,
                    'address2' => $address2,
                    'address3' => $address3,
                    'pass' => $pass,
                ]);
        } else {
            // Record does not exist, insert new one
            DB::table('bizdiverse_company')->insert([
                'houjin' => $houjin,
                'tanto' => $tanto,
                'com_email' => $com_email,
                'com_tel' => $com_tel,
                'types' => $types,
                'zipcode' => $zipcode,
                'address1' => $address1,
                'address2' => $address2,
                'address3' => $address3,
                'pass' => $pass,
            ]);
        }

        // Redirect to login.blade.php
        return redirect()->route('company.login');
    }

    public function login(Request $request)
    {
        $com_email = $request->input('com_email');
        $pass = $request->input('pass');

        // DBからメールアドレスに一致するユーザーを取得
        $user = DB::table('bizdiverse_company')
            ->where('com_email', $com_email)
            ->first();

        // ユーザーの存在を確認
        if ($user) {
            // パスワードの一致を確認
            if (Hash::check($pass, $user->pass)) {
                // ユーザーをログイン状態にする
                Session::put('com_email', $user->com_email);
                return redirect()->route('dashboard'); // ダッシュボードまたはホームページにリダイレクト
            } else {
                $msg = 'Eメールまたはパスワードが間違っています。';
            }
        } else {
            $msg = 'ユーザーが見つかりません。';
        }

        // エラーメッセージをセッションに保存
        $request->session()->flash('msg', $msg);
        return redirect()->back(); // ログインページにリダイレクト
    }

    public function dashboard()
    {
        $total_counts = DB::table('messages')
            ->where('company_send_id', 3)
            ->select(DB::raw('COUNT(DISTINCT user_send_id) as total_unique_user_count, COUNT(*) as total_message_count'))
            ->first();

        $counts = DB::table('messages')
            ->where('company_send_id', 3)
            ->select('user_send_id', DB::raw('COUNT(*) as count'))
            ->groupBy('user_send_id')
            ->get();

        return view('company.dashboard', ['counts' => $counts, 'total_counts' => $total_counts]);

    }
}
