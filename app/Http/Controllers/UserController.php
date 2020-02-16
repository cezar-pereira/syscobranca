<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\PaymentSlip;
use App\Models\Sms;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    private $itemsPerPage = 10;

    public function index()
    {
        $users = User::paginate($this->itemsPerPage);
        return view('user.listAllUsers', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.createUser');
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $regexPhone = '/^[1-9]{2}[9]{1}[1-9]{8}$/';

        if (!preg_match($regexPhone, $request->phone))
            return Redirect::back()->withInput()->withErrors('Número de contato inválido');

        $user = new User();
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show(User $user)
    {
        $smss = Sms::where('user_id', $user->id)->paginate($this->itemsPerPage);
        $paymentSlips = PaymentSlip::where('user_id', $user->id)->paginate($this->itemsPerPage);
        return view('user.showUser', [
            'user' => $user,
            'smss' => $smss,
            'paymentSlips' => $paymentSlips,
        ]);
    }

    public function edit(User $user)
    {
        return view('user.editUser', [
            'user' => $user
        ]);
    }

    public function update(StoreUpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->update();
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    public function sms(User $user)
    {
        if ($data = $user->sms()->paginate($this->itemsPerPage))
            return view('listAllSms', ['smss' => $data]);
    }

    public function paymentSlip(User $user)
    {
        if ($data = $user->paymentSlip()->paginate($this->itemsPerPage))
            return view('paymentSlip.listAllPaymentSlip', ['paymentSlips' => $data]);
    }
}
