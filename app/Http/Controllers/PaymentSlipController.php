<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePaymentSlipRequest;
use App\Models\PaymentSlip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PaymentSlipController extends Controller
{
    private $itemsPerPage = 10;

    public function index()
    {
        $paymentSlips = PaymentSlip::paginate($this->itemsPerPage);
        return view('paymentSlip.listAllPaymentSlip', ['paymentSlips' => $paymentSlips]);
    }

    public function create()
    {
        return view('paymentSlip.createPaymentSlip');
    }

    public function store(StoreUpdatePaymentSlipRequest $request)
    {
        $regexPhone = '/^[1-9]{2}[9]{1}[1-9]{8}$/';

        if ($request->optionCpfPhone === 'Telefone') {
            if (!preg_match($regexPhone, $request->cpf_phone))
                return Redirect::back()->withInput()->withErrors('Número de contato inválido');
            $user = User::where('phone', $request->cpf_phone)->first();
        } else
            $user = User::where('cpf', $request->cpf_phone)->first();

        if (!$user)
            return Redirect::back()->withInput()->withErrors('Destinatário não encontrado');

        $paymentSlip = new PaymentSlip();
        $paymentSlip->user_id = $user->id;
        $paymentSlip->dueDate = new Carbon();
        $paymentSlip->details = $request->details;
        $paymentSlip->grossIncome = $request->grossIncome;
        $paymentSlip->netIncome = $request->grossIncome;
        $paymentSlip->save();

        return redirect()->route('paymentslip.create')->with('success', 'Boleto cadastrado com sucesso!');
    }

    public function edit(PaymentSlip $paymentslip)
    {
        return view('paymentSlip.editPaymentSlip', ['paymentSlip' => $paymentslip]);
    }

    public function update(StoreUpdatePaymentSlipRequest $request, PaymentSlip $paymentslip)
    {
        $paymentslip->dueDate = $request->dueDate;
        $paymentslip->grossIncome = $request->grossIncome;
        $paymentslip->netIncome = $request->grossIncome;
        $paymentslip->details = $request->details;
        $paymentslip->update();

        return redirect()->route('paymentslip.index');
    }

    public function destroy(PaymentSlip $paymentslip)
    {
        $paymentslip->delete();
        return redirect()->route('paymentslip.index');
    }
}
