<?php

namespace App\Http\Controllers;

use App\Models\BitCell;
use App\Tool\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function XXX()
    {
        return ('Welcome to the Taiwan, Guid:863b45ce-69d2-490d-81c5-a0eaaa8047cf');
    }

    public function GetAll(Request $request)
    {
        $TmpBitCell = new BitCell;
        $BitCell = $TmpBitCell::all()->map(function ($v, $k) {
            return [
                'Guid' => $v['Guid']
                , 'Name' => $v['Name']
                , 'Address' => $v['Address']
                , 'NowValue' => $v['NowValue']
                , 'HandTrigger' => $v['HandTrigger']
                , 'HandTriggerValue' => $v['HandTriggerValue']
                , 'CollectData' => $v['CollectData']
                , 'NotifyStatus' => $v['NotifyStatus']
                , 'NotifyCollectData' => json_decode($v['NotifyCollectData'])
            ];
        });


        $TmpReseponseSerVice = new ResponseService();
        return $TmpReseponseSerVice->JSON_HTTP_OK([
            'result' => $BitCell,
            'length' => $BitCell->count(),
        ]);
    }
    public function GetByAddress(Request $request)
    {
        $TmpReseponseSerVice = new ResponseService();

        $TmpAddress = $request['Address'];
        if ($TmpAddress == '') return $TmpReseponseSerVice->HTTP_BAD_REQUEST([
            'Address' => false
        ]);

        $TmpBitCell = new BitCell;
        $TmpBitCellByWhereByAddress = $TmpBitCell::where([
            ['Address', '=', $TmpAddress]
        ])->get();

        if ($TmpBitCellByWhereByAddress->isEmpty()){
            return $TmpReseponseSerVice->HTTP_BAD_REQUEST([
                'isEmpty' => true
            ]);
        }
        $BitCellByWhereByAddress = $TmpBitCellByWhereByAddress->map(function ($v, $k) {
            return [
                'Guid' => $v['Guid']
                , 'Name' => $v['Name']
                , 'Address' => $v['Address']
                , 'NowValue' => $v['NowValue']
                , 'HandTrigger' => $v['HandTrigger']
                , 'HandTriggerValue' => $v['HandTriggerValue']
                , 'CollectData' => $v['CollectData']
                , 'NotifyStatus' => $v['NotifyStatus']
                , 'NotifyCollectData' => json_decode($v['NotifyCollectData'])
            ];
        });

        return $TmpReseponseSerVice->JSON_HTTP_OK([
            'result' => $BitCellByWhereByAddress,
            'length' => $BitCellByWhereByAddress->count(),
        ]);
    }
    public function in_A(Request $request)
    {
        $TmpReseponseSerVice = new ResponseService();
        $TmpName = $request['Name'];
        $TmpAddress = $request['Address'];

        if ($TmpAddress == '' or $TmpName == '') return $TmpReseponseSerVice->HTTP_BAD_REQUEST([
            'REQUEST' => false
        ]);

        $TmpBitCell = new BitCell;
        $TmpBitCell::create([
            'Guid' => guid()
            , 'Name' => $TmpName
            , 'Address' => $TmpAddress
            , 'NowValue' => 0
            , 'HandTrigger' => 99
            , 'HandTriggerValue' => 99
            , 'CollectData' => json_encode([])
            , 'NotifyStatus' => 0
            , 'NotifyCollectData' => json_encode([
                'NotifyType' => 0,
                'NotifyPlatFrom' => 0,
                'NotifyTimeStamp' => 0,
                'NotifyDateTime' =>0
            ])
        ]);


        return $TmpReseponseSerVice->JSON_HTTP_OK([
            'Success' => true,
        ]);
    }
    public function upd_B(Request $request)
    {
        $TmpReseponseSerVice = new ResponseService();

        $TmpGuid = $request['Guid'];
        $TmpAddress = $request['Address'];

        if ($TmpAddress == '' or $TmpGuid == '') return $TmpReseponseSerVice->HTTP_BAD_REQUEST([
            'REQUEST' => false
        ]);

        $TmpBitCell = new BitCell;
        $TmpBitCellByWhereByGuid = $TmpBitCell::where([
            ['Guid', '=', $TmpGuid]
        ])->get();

        if ($TmpBitCellByWhereByGuid->isEmpty()) {
            return $TmpReseponseSerVice->HTTP_BAD_REQUEST([
                'isEmpty' => true
            ]);
        }

        $TmpByGuid = $TmpBitCellByWhereByGuid->first();
        $TmpByGuid['Address'] = $TmpAddress;
        $TmpByGuid->update();

        return $TmpReseponseSerVice->JSON_HTTP_OK([
            'Success' => true,
        ]);
    }
    public function del_C(Request $request)
    {
        $TmpReseponseSerVice = new ResponseService();

        $TmpGuid = $request['Guid'];

        if ($TmpGuid == '') return $TmpReseponseSerVice->HTTP_BAD_REQUEST([
            'REQUEST' => false
        ]);

        $TmpBitCell = new BitCell;
        $TmpBitCellByWhereByGuid = $TmpBitCell::where([
            ['Guid', '=', $TmpGuid]
        ])->get();

        if ($TmpBitCellByWhereByGuid->isEmpty()) {
            return $TmpReseponseSerVice->HTTP_BAD_REQUEST([
                'isEmpty' => true
            ]);
        }

        $TmpBitCellByWhereByGuid->first()->delete();

        return $TmpReseponseSerVice->JSON_HTTP_OK([
            'Success' => true,
        ]);
    }
    public function js(Request $request)
    {
        return view('TmpJs');
    }
}
