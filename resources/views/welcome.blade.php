<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body>
    <div>
        <div
             class="max-w-fit m-4 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 justify-center">
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Laravel
                        Integrations</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">This project aims to provide integrations
                    for popular apis.</p>

            </div>
        </div>

        <div class="flex flex-row flex-wrap justify-center">

            <x-cards title="Mailchimp" image="img/mailchimp.jpg" desc="Mailchimp integration details." url="/mailchimp"/>
            <x-cards title="Click Funnels" image="img/clickfunnels.png" desc="Click Funnels integration details." url="" />
            <x-cards title="Instagram" image="img/instagram.jpg" desc="Instragram integration details." url="" />
            <x-cards title="Twilio" image="img/twilio.png" desc="Twilio integration details." url="" />
            <x-cards title="Slack" image="img/slack.svg" desc="Slack integration details." url="" />
            <x-cards title="Facebook" image="img/facebook.svg" desc="Facebook integration details." url="" />
            <x-cards title="Zapier" image="img/zapier.png" desc="Zapier integration details." url="" />
            <x-cards title="Drip" image="img/drip.svg" desc="Drip integration details." url="" />
            <x-cards title="ConvertKit" image="img/convertkit.png" desc="ConvertKit integration details." url="" />
            <x-cards title="SendGrid" image="img/sendgrid.png" desc="SendGrid integration details." url="" />
            <x-cards title="AWeber" image="img/aweber.png" desc="AWeber integration details." url="" />
            <x-cards title="Active Campaign" image="img/activecampaign.png"
                     desc="ActiveCampaign integration details." url="" />
            <x-cards title="Infusionsoft" image="img/infusionsoft.png" desc="Infusionsoft integration details." url="" />
            <x-cards title="Klaviyo" image="img/klaviyo.png" desc="Klaviyo integration details." url="" />

        </div>
    </div>

</body>

</html>
