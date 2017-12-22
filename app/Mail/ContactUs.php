<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */

	public function build() {

		$address = 'contacto@youngmentorship.com';

		$name = 'YoungMéxico';

		$subject = 'Contacto';

		return $this->view('emails.contactus')

			->from($address, $name)

			->subject($subject);

	}

}
