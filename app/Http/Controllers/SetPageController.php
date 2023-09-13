<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Tool\ResponseService;
use Illuminate\Http\Request;

class SetPageController extends Controller
{
    public  function LineAPI(Request $request)
    {
        $TmpResponseService = new ResponseService;

        $TmpLineGuid = $request['LineGuid'];
        $TmpLineToken = $request['LineToken'];

        $Setting = new Setting;
        $TmpSetting  = $Setting::where([
            ['Guid', '=', $TmpLineGuid]
        ])->get()->first();

        $TmpGroup = [
            'Group' => [
                ['Token' => $TmpLineToken]
            ]
        ];

        $TmpSetting['CollectData'] = $TmpGroup;
        $TmpSetting->update();

        return $TmpResponseService->JSON_HTTP_OK([
            'Status' => true
        ]);
    }

    public  function EmailAPI(Request $request)
    {
        $TmpResponseService = new ResponseService;
        $TmpEmailGuid = $request['EmailGuid'];
        $TmpEmailOwn= $request['EmailOwn'];
        $TmpEmailPwd = $request['EmailPwd'];
        $TmpToEmail = $request['ToEmail'];
        $Setting = new Setting;
        $EmailSetting  = $Setting::where([
            ['Guid', '=', $TmpEmailGuid]
        ])->get()->first();

        $TmpGroup = [
            'OwnEmail' => $TmpEmailOwn,
            'OwnPassword' => $TmpEmailPwd,
            'Group' => [
                ['ToEmail' => $TmpToEmail]
            ]
        ];

        $EmailSetting['CollectData'] = $TmpGroup;
        $EmailSetting->update();

        return $TmpResponseService->JSON_HTTP_OK([
            'Status' => true
        ]);
    }

    public  function SMSAPI(Request $request)
    {
        $TmpResponseService = new ResponseService;
        $TmpSmsGuid = $request['SmsGuid'];
        $TmpSmsOwn= $request['SmsOwn'];
        $TmpSmsPwd = $request['SmsPwd'];
        $TmpToSms = $request['ToSms'];
        $Setting = new Setting;
        $SmsSetting  = $Setting::where([
            ['Guid', '=', $TmpSmsGuid]
        ])->get()->first();

        $TmpGroup = [
            'OwnPhone' => $TmpSmsOwn,
            'OwnPassword' => $TmpSmsPwd,
            'Group' => [
                ['Phone' => $TmpToSms]
            ]
        ];

        $SmsSetting['CollectData'] = $TmpGroup;
        $SmsSetting->update();

        return $TmpResponseService->JSON_HTTP_OK([
            'Status' => true
        ]);
    }
    public function Index()
    {
        $Setting = new Setting;
        //----------------------------------------------------Email
        $LineGuid = '4650c0d7-ae99-40f0-9572-a3375c03e68d';
        $TmpSetting = $Setting::where([
            ['Guid', '=', $LineGuid]
        ])->get()->first();
        $LineToken = $TmpSetting['CollectData']['Group'][0]['Token'];
        //----------------------------------------------------LINE
        $EmailGuid = 'e972137f-347a-41c7-b662-9a378de35211';
        $EmailSetting = $Setting::where([
            ['Guid', '=', $EmailGuid]
        ])->get()->first();
        $TmpCollect = $EmailSetting['CollectData'];

        $ToEmails = '';
        foreach ($TmpCollect['Group'] as $Key => $value) {
            $ToEmails .= $value['ToEmail'] . ',';
        }
        $ToEmails = substr($ToEmails, 0, -1);

        $TmpEmail = [
            'EmailGuid' => $EmailGuid,
            'OwnEmail' => $TmpCollect['OwnEmail'],
            'OwnPassword' => $TmpCollect['OwnPassword'],
            'ToEmail' => $ToEmails,
        ];
        //----------------------------------------------------SMS
        $SMSGuid = '4605e414-192f-4667-82d1-fcbd2766255f';
        $SMSSetting = $Setting::where([
            ['Guid', '=', $SMSGuid]
        ])->get()->first();
        $TmpCollect = $SMSSetting['CollectData'];

        $ToSMS = '';
        foreach ($TmpCollect['Group'] as $Key => $value) {
            $ToSMS .= $value['Phone'] . ',';
        }
        $ToSMS = substr($ToSMS, 0, -1);

        $TmpSMS = [
            'SMSGuid' => $SMSGuid,
            'OwnPhone' => $TmpCollect['OwnPhone'],
            'OwnPassword' => $TmpCollect['OwnPassword'],
            'ToSMS' => $ToSMS,
        ];


        return view('SetPage.WebIndex', compact('LineToken', 'LineGuid', 'TmpEmail', 'TmpSMS'));
    }


//    public function Index()
//    {
//        return view('SetPage.WebIndex');
//    }

    public function mb_Index()
    {
        return view('SetPage.MobileIndex');
    }
}
