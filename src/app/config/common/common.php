<?php
/**
 * Common configuration for both web and console.
 */
// Load server specific setting (for db, params).
$serverSpecific = require(__DIR__ . '/../../../serverSpecific/serverSpecific.php');

// Get server specific params.
$serverSpecificParams = isset($serverSpecific['params']) ? $serverSpecific['params'] : [];
// Get common params.
$commonParams = require(__DIR__ . '/params.php');
// Mix common params and server specific params.
$params = array_merge_recursive($commonParams, $serverSpecificParams);

return [
    'basePath' => dirname(__DIR__) . '/..',
    'bootstrap' => ['log'],
    'language' => 'ja-JP',
    'vendorPath' => dirname(__DIR__) . '/../../yii2/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => $serverSpecific['log'],
        'db' => $serverSpecific['db'],
    ],
	'params' => $params,
];