<?php

namespace App\Http\Controllers;

use App\Models\transactionModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $transaction = DB::table('transaction')
        //     ->leftJoin('users', 'transaction.email', 'users.email')
        //     ->select('transaction.email', 'name', 'order', 'fare', 'instalment', 'status')
        //     ->paginate(10);
        
        $transaction = DB::table('transaction')
            ->leftJoin('users', 'transaction.email', 'users.email')
            ->select('transaction.email', 'name', 'order', 'fare', 'instalment', 'status')
            ->paginate(10);
        
        $user = DB::table('transaction')
            ->leftJoin('users', 'transaction.email', 'users.email')
            ->select('name')
            ->distinct()
            ->get();


        return view('admin', ['transaction' => $transaction, 'user' => $user]);
    }

    public function search(Request $request) {
        
        $search = $request->search;
        $transaction = DB::table('transaction')
            ->leftJoin('users', 'transaction.email', 'users.email')
            ->select('transaction.email', 'name', 'order', 'fare', 'instalment', 'status')
            ->where('users.name', 'like', '%'.$search.'%')
            ->paginate(10);
        
        return view('admin', ['transaction' => $transaction]);
    }

    public function updateStatusPayment($email, $instalment) {
        $cekStatus = DB::table('transaction')
            ->where([['email', $email], ['instalment', $instalment]])
            ->value('status');

        if($cekStatus == 0)
            transactionModel::where([['email', $email], ['instalment', $instalment]])->update(['status' => '1']);
        if($cekStatus == 1)
            transactionModel::where([['email', $email], ['instalment', $instalment]])->update(['status' => '0']);
        return redirect('admin');
    }

}
