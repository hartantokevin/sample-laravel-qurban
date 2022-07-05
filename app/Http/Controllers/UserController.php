<?php

namespace App\Http\Controllers;

use App\Models\feedbackModel;
use App\Models\menuModel;
use App\Models\transactionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = DB::table('transaction')
            ->leftJoin('users', 'transaction.email', 'users.email')
            ->select('transaction.email', 'name', 'order', 'fare', 'instalment', 'status')
            ->where('transaction.email', Auth::user()->email)
            ->get();

        $menu = DB::table('menu')->get();
        $feedback = DB::table('feedback')
            ->leftJoin('users', 'feedback.email', 'users.email')
            ->get();
        return view('user', ['transaction' => $transaction, 'menu' => $menu, 'feedback' => $feedback]);
    }

    public function order($menu_code) {
        $menuModel = menuModel::where('menu_code', $menu_code);
        $harga = $menuModel->value('price');
        for($i=1; $i<11; $i++)
            transactionModel::insert(
                [
                    'email' => 'user1@example.com',
                    'order' => $menu_code,
                    'instalment' => $i,
                    'fare' => $harga/10,
                    'status' => '0'
                ]
            );
        
        return redirect('user')->with('statusOrder', 'Order Successfully!');
    }

    public function comment(Request $request) {
        feedbackModel::create($request->all());
        return redirect('user');
    }
}
