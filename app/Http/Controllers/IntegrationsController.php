<?php

namespace App\Http\Controllers;

use Throwable;
use App\Helper;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Session;

class IntegrationsController extends Controller
{

    public function config_mailchimp(Request $request) {

        $request->validate([
            'api_key' => 'required',
            'server_prefix' => 'required',
        ]);

        $api_key =  'MAILCHIMP_API';
        $api_value = $request->api_key;

        Helper::envUpdate($api_key, $api_value);

        $serverprefix_key =   'MAILCHIMP_SERVER_PREFIX';
        $serverprefix_value = $request->server_prefix;

        Helper::envUpdate($serverprefix_key, $serverprefix_value);

        Session::flush();
        Session::flash('success','Configuration Saved Successfully.');

        return view ('admin.mailchimp');

    }


    public function test_mailchimp() {

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => env('MAILCHIMP_API'),
            'server' => env('MAILCHIMP_SERVER_PREFIX'),
        ]);

        try {

        $ping = $mailchimp->ping->get();
        Session::flush();
        Session::flash('error', $ping->health_status);

        return view ('admin.mailchimp');


        } catch (Throwable $e) {

            Session::flash('error', 'Error');
            return view ('admin.mailchimp');
        }



    }
}
