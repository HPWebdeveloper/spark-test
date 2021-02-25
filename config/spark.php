<?php

use App\Models\Team;
use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Spark Path
    |--------------------------------------------------------------------------
    |
    | This configuration option determines the URI at which the Spark billing
    | portal is available. You are free to change this URI to a value that
    | you prefer. You shall link to this location from your application.
    |
    */

    'path' => 'billing',

    /*
    |--------------------------------------------------------------------------
    | Spark Middleware
    |--------------------------------------------------------------------------
    |
    | These are the middleware that requests to the Spark billing portal must
    | pass through before being accepted. Typically, the default list that
    | is defined below should be suitable for most Laravel applications.
    |
    */

    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | These configuration values allow you to customize the branding of the
    | billing portal, including the primary color and the logo that will
    | be displayed within the billing portal. This logo value must be
    | the absolute path to an SVG logo within the local filesystem.
    |
    */

    // 'brand' =>  [
    //     'logo' => realpath(__DIR__.'/../public/svg/billing-logo.svg'),
    //     'color' => 'bg-gray-800',
    // ],

    /*
    |--------------------------------------------------------------------------
    | Proration Behavior
    |--------------------------------------------------------------------------
    |
    | This value determines if charges are prorated when making adjustments
    | to a plan such as incrementing or decrementing the quantity of the
    | plan. This also determines proration behavior if changing plans.
    |
    */

    'prorates' => false,

    /*
    |--------------------------------------------------------------------------
    | European VAT Collection
    |--------------------------------------------------------------------------
    |
    | If you are a EU based company that needs to charge the appropriate VAT
    | for all customers, you may define your home country's two-character
    | country code below. Spark will calculate the correct VAT for you.
    |
    */

    'collects_eu_vat' => 'BE',

    /*
    |--------------------------------------------------------------------------
    | Receipt Configuration
    |--------------------------------------------------------------------------
    |
    | The following configuration options allow you to configure exactly how
    | you would prefer to deliver your customer's receipts. You can state
    | whether they will be emailed as well as your company information.
    |
    */

    'sends_receipt_emails' => true,

    'sends_payment_notification_emails' => true,

    'receipt_data' => [
        'vendor' => 'Your Product',
        'product' => 'Your Product',
        'street' => '111 Example St.',
        'location' => 'Los Angeles, CA',
        'phone' => '555-555-5555',
    ],

    /*
    |--------------------------------------------------------------------------
    | Spark Billable
    |--------------------------------------------------------------------------
    |
    | Below you may define billable entities supported by your Spark driven
    | application. The Stripe edition of Spark currently only supports a
    | single billable model entity (team, user, etc.) per application.
    |
    | In addition to defining your billable entity, you may also define its
    | plans and the plan's features, including a short description of it
    | as well as a "bullet point" listing of its distinctive features.
    |
    */

    'billables' => [

        'team' => [
            'model' => Team::class,

            'plans' => [
                [
                    'name' => 'Mini',
                    'short_description' => 'Uptime, broken links, mixed content and scheduled jobs monitoring, and status pages',
                    'monthly_id' => env('SPARK_PLAN_MONTHLY_ID'),
                    'yearly_id' => env('SPARK_PLAN_YEARLY_ID'),
                    'yearly_incentive' => 'Save 10%',
                    'features' => [
                        '2 sites',
                    ],
                ],
            ]
        ]
    ]
];
