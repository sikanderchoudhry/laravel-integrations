<?php

namespace App\Http\Controllers;

use Throwable;
use App\Helper;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;
use Illuminate\Support\Facades\Session;

class IntegrationsController extends Controller
{

    public $mailchimp;

    public function __construct()
    {

        $this->mailchimp = new ApiClient();

        if (!is_null(env('MAILCHIMP_API'))) {
            $this->mailchimp->setConfig([
                'apiKey' => env('MAILCHIMP_API'),
                'server' => env('MAILCHIMP_SERVER_PREFIX'),
            ]);
        }
    }

    public function config_mailchimp(Request $request)
    {

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
        Session::flash('success', 'Configuration Saved Successfully.');

        return view('admin.mailchimp');
    }


    public function test_mailchimp()
    {

        try {

            $ping = $this->mailchimp->ping->get();
            Session::flush();
            Session::flash('ping', $ping->health_status);

            return view('admin.mailchimp');
        } catch (Throwable $e) {

            Session::flush();
            Session::flash('error', $e->getMessage());

            return view('admin.mailchimp');
        }
    }

    public function create_audience()
    {
        try {
            $response = $this->mailchimp->lists->createList([
                "name" => "Laravel Integrations",
                "permission_reminder" => "permission_reminder",
                "email_type_option" => false,
                "contact" => [
                    "company" => "XLMINDS",
                    "address1" => "Deira Sikander Shahzad",
                    "city" => "Rahim Yar Khan",
                    "state" => "None",
                    "zip" => "64200",
                    "country" => "Pakistan",
                ],
                "campaign_defaults" => [
                    "from_name" => "Testing Integrations",
                    "from_email" => "sikander.choudhry@xlminds.pk",
                    "subject" => "Laravel Integrations Packages",
                    "language" => "EN_US",
                ],
            ]);

            print_r($response);
        } catch (ApiException $e) {
            print_r($e->getMessage());
        }
    }

    public function get_audiences() {

        $response = $this->mailchimp->lists->getAlllists();
        print_r($response);
    }
}
