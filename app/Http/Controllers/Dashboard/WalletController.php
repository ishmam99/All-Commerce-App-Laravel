<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Library\Utilities;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    public function showWalletDetails(User $user): View
    {
        Utilities::checkPermissions('wallet.add-money');

        return view('dashboard.wallet.details', compact('user'));
    }

    public function addMoney(Request $request, User $user): RedirectResponse
    {
        Utilities::checkPermissions('wallet.add-money');

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('error', __($validator->errors()->first()));
        }

        $user->balance += $request->input('amount');
        $user->save();
        return back()->with('success', __('Wallet successfully updated.'));
    }
}
