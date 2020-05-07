<?php

namespace App\Http\Controllers;

use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\MainMenu;

class UssdController extends Controller
{
    public function index()
    {
    	// Update request params to match your service providers
    	$ussd = Ussd::machine()->set([
		    'phone_number' => request('msisdn'),
		    'network' => request('network'),
		    'session_id' => request('session_id'),
		    'input' => request('msg')
		])
		->setInitialState(MainMenu::class);

		/**
			Note: Override default response and set it to match your service provider

			->setResponse(function(string $message, int $code) {
			    return [
					'USSDResp' => [
					    'action' => $code === 2 ? 'prompt' : 'input',
					    'menus' => '',
					    'title' => $message,
					]
			    ];
			});
		**/

	    return response()->json($ussd->run());
    }
}
