<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\BizdiverseCompany;


use Illuminate\Support\Facades\Auth;

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

    public function show()
    {
        $com_email = Auth::user()->com_email;
        $user = BizdiverseCompany::where('com_email', $com_email)->first();

        return view('user', ['userData' => $user]);
    }

    public function update(Request $request)
    {
        $newPass = $request->input('pass');
        $confirmPass = $request->input('confirm_pass');
        $msg = '';

        if ($newPass === $confirmPass) {
            // パスワードをハッシュ化
            $hashedPass = Hash::make($newPass);

            $user = BizdiverseCompany::where('com_email', Auth::user()->com_email)->first();
            $user->fill($request->all());
            $user->pass = $hashedPass;
            $user->save();

            Auth::user()->com_email = $request->input('com_email'); // Update the session email
            $msg = '登録を更新しました。';
        } else {
            $msg = 'パスワードが一致しません。';
        }

        return redirect('/user')->with('msg', $msg);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('dash_com');
    }

    public function showInfo(Request $request)
    {
        $com_email = $request->session()->get('com_email', ''); // セッションからメールアドレスを取得
        $msg = '';

        if ($request->isMethod('post')) {
            // ログアウトが押された場合
            if ($request->has('logout')) {
                return redirect()->route('dashboard');
            }

            if ($request->has('update')) {
                $newHoujin = $request->input('houjin');
                $newTanto = $request->input('tanto');
                $newMail = $request->input('com_email');
                $newTel = $request->input('com_tel');
                $newTypes = $request->input('types');
                $newContent = $request->input('content');
                $newZipcode = $request->input('zipcode');
                $newAddress1 = $request->input('address1');
                $newAddress2 = $request->input('address2');
                $newAddress3 = $request->input('address3');
                $newPass = $request->input('pass');
                $confirmPass = $request->input('confirm_pass');

                if ($newPass === $confirmPass) {
                    // パスワードをハッシュ化
                    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

                    DB::table('bizdiverse_company')
                        ->where('com_email', $com_email)
                        ->update([
                            'houjin' => $newHoujin,
                            'tanto' => $newTanto,
                            'com_email' => $newMail,
                            'com_tel' => $newTel,
                            'types' => $newTypes,
                            'pass' => $hashedPass,
                            'content' => $newContent,
                            'zipcode' => $newZipcode,
                            'address1' => $newAddress1,
                            'address2' => $newAddress2,
                            'address3' => $newAddress3,
                        ]);

                    $request->session()->put('com_email', $newMail); // セッションのメールアドレスを更新
                    $com_email = $newMail; // ローカルのメールアドレス変数を更新
                    $msg = '登録を更新しました。';
                } else {
                    $msg = 'パスワードが一致しません。';
                }
            }
        }

        $userData = DB::table('bizdiverse_company')
            ->where('com_email', $com_email)
            ->first();

        return view('company.info', compact('msg', 'userData'));
    }

    public function update2(Request $request)
    {

        $com_email = Auth::user()->com_email;
        $com_email = $request->session()->get('com_email', ''); // セッションからメールアドレスを取得
        $msg = '';


        $newMail = $request->input('com_email');
        $prefecture = $request->input('prefecture');
        $area = $request->input('area');
        $cities = $request->input('city');

        // Convert cities array to comma-separated string
        $citiesString = is_array($cities) ? implode(",", $cities) : '';

        $user->com_email = $newMail;
        $user->prefecture = $prefecture;
        $user->area = $area;
        $user->city = $citiesString;
        $user->save();

        $msg = '登録を更新しました。';

        return redirect()->back()->with('msg', $msg);
    }

    public function logout2()
    {
        Auth::logout();
        return redirect('login');
    }

    public function ComScoutSet()
{
    
    $com_email = $request->session()->get('com_email', ''); // セッションからメールアドレスを取得
    $com_email = Auth::user()->com_email;
    $user = Auth::user();
    
    if ($user === null) {
        return redirect('login');
    }

    $cities = explode(',', $user->city);
    
    $cityMappings = [
        "chiyoda" => "千代田区",
        "minato" => "港区",
        "hachi" => "八王子",
        "tachi" => "立川市",
        // 他の都市もここに追加
    ];
    
    return view('com_scout_set', ['msg' => '', 'userData' => $user, 'cities' => $cities, 'cityMappings' => $cityMappings]);
}





    
}


