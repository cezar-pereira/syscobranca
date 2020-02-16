<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSmsRequest;
use App\Models\Sms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class SmsController extends Controller
{
    private $itemsPerPage = 10;

    public function index()
    {
        $sms = Sms::paginate($this->itemsPerPage);
        return view('sms.listAllSms', ['smss' => $sms]);
    }

    public function create()
    {
        return view('sms.createSms');
    }

    public function store(StoreUpdateSmsRequest $request)
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

        $sms = new Sms();
        $sms->user_id = $user->id;
        $sms->message = $request->message;
        $sms->date = new Carbon();
        $sms->save();

        return redirect()->route('sms.create')->with('success', 'Sms enviado com sucesso!');
    }

    public function createWithUser(User $user)
    {
        return view('sms.createSms', ['user' => $user]);
    }

    public function user($id)
    {
        $sms = Sms::findOrFail($id);

        if ($sms) {
            if (!$data = $sms->user()->first()) {
                $sms = Sms::all();
                return view('sms.listAllSms', ['smss' => $sms]);
            } else
                return view('user.showUser', ['user' => $data]);
        } else {
            $sms = Sms::paginate($this->itemsPerPage);
            return view('sms.listAllSms', ['smss' => $sms]);
        }
    }
}
