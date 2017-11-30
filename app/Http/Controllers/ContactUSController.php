<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Mail;

// use App\Mail\ContactUs;

class ContactUSController extends Controller {
	public function contactUS() {
		return view('contactus');
	}
	/** * Show the application dashboard. * * @return \Illuminate\Http\Response */
	public function contactUSPost(Request $request) {
		$this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required']);
		ContactUS::create($request->all());

		Mail::send('email',
			array(
				'name' => $request->get('name'),
				'email' => $request->get('email'),
				'user_message' => $request->get('message'),
			), function ($message) {
				$message->from('no-reply@youngmentorship.com');
				$message->to('contacto@youngmentorship.com', 'Contacto')->subject('Contacto - Young mentorship');
			});

		return view("emails/contactus");
	}
}
