<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller {
	public function contact() {
		return view('/contact');
	}

	public function send(Request $request) {
		$rules = [
			'name' => ['required', 'max:32'],
			'email' => ['required', 'max:32', 'email'],
			'subject' => ['required', 'max:50'],
			'mail_message' => ['required', 'max:2000'],
		];

		$this->validate($request, $rules);

		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'subject' => $request->subject,
			'mail_message' => $request->mail_message,
		];
		Mail::send('emails.send', $data, function ($message) {
			$message->to('contacto@youngmentorship.com', 'Contacto')->subject('Contacto - YoungMéxico');
		});

		notify()->flash('Tu mensaje se ha enviado con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'En breve nos comunicaremos contigo.',
		]);

		return redirect('/contact');
	}
}
