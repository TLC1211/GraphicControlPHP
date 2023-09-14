<?php

namespace App\Http\Controllers;

use App\Models\BitCell;
use App\Models\vString;
use App\Models\vWord;
use App\Tool\ResponseService;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function Api(Request $request)
    {
        $ResponseService = new ResponseService;
        $TmpGuid = $request['Guid'];
        $TmpType = $request['Type'];
        $TmpUpload = json_decode($request['Upload'], true);

        $BitCell = new BitCell;
        $vWord = new vWord;

        if ($TmpType === 'BitCell') {
            $TmpBitCells = $BitCell::find($TmpGuid);

            $TmpNotifyCollectData = json_decode($TmpBitCells['NotifyCollectData'], true);
            $TmpNotifyCollectData['NotifyType'] = $TmpUpload['NotifyType'];
            $TmpNotifyCollectData['NotifyPlatFrom'] = $TmpUpload['NotifyPlatFrom'];

            $TmpBitCells['NotifyCollectData'] = json_encode($TmpNotifyCollectData, true);
            $TmpBitCells['NotifyStatus'] = $TmpUpload['NotifyStatus'];
            $TmpBitCells->update();
        } else {
            $TmpWord = $vWord::find($TmpGuid);

            $TmpCollectData = $TmpWord['CollectData'];
            $TmpCollectData['WordType'] = $TmpUpload['CollectData']['WordType'];
            $TmpCollectData['SignedType'] = $TmpUpload['CollectData']['SignedType'];
            $TmpCollectData['NumberOfDecimals'] = $TmpUpload['CollectData']['NumberOfDecimals'];
            $TmpCollectData['MaxValue'] = $TmpUpload['CollectData']['MaxValue'];
            $TmpCollectData['MinValue'] = $TmpUpload['CollectData']['MinValue'];
            $TmpCollectData['HLValueConvert'] = $TmpUpload['CollectData']['HLValueConvert'];

            $TmpWord['CollectData'] = $TmpCollectData;
            $TmpWord['NotifyStatus'] = $TmpUpload['NotifyStatus'];

            $TmpNotifyCollectData = $TmpWord['NotifyCollectData'];
            $TmpNotifyCollectData['NotifyPlatFrom'] = $TmpUpload['NotifyCollectData']['NotifyPlatFrom'];
            $TmpWord['NotifyCollectData'] = $TmpNotifyCollectData;

            $TmpWord->update();
        }

        return $ResponseService->JSON_HTTP_OK(['Status' => true]);
    }

    public function Index()
    {
        $BitCell = new BitCell;
        $vWord = new vWord;
        $vString = new vString;

        $TmpBitCells = $BitCell::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Type' => 'BitCells',
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'CollectData' => $v['CollectData'],
                'NotifyStatus' => $v['NotifyStatus'],
                'NotifyCollectData' => $v['NotifyCollectData'],
                'created_at' => $v['created_at'],
            ];
        });

        $TmpWordV = $vWord::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Type' => 'vWord',
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'CollectData' => $v['CollectData'],
                'NotifyStatus' => $v['NotifyStatus'],
                'NotifyCollectData' => $v['NotifyCollectData'],
                'created_at' => $v['created_at'],
            ];
        });

        $TmpStringV = $vString::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Type' => 'vString',
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'CollectData' => $v['CollectData'],
                'NotifyStatus' => $v['NotifyStatus'],
                'NotifyCollectData' => $v['NotifyCollectData'],
                'created_at' => $v['created_at'],
            ];
        });
        return view('Component.WebIndex', compact('TmpBitCells', 'TmpWordV', 'TmpStringV'));
    }

    public function mb_Index()
    {
        $BitCell = new BitCell;
        $vWord = new vWord;
        $vString = new vString;

        $TmpBitCells = $BitCell::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Type' => 'BitCells',
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'CollectData' => $v['CollectData'],
                'NotifyStatus' => $v['NotifyStatus'],
                'NotifyCollectData' => $v['NotifyCollectData'],
                'created_at' => $v['created_at'],
            ];
        });

        $TmpWordV = $vWord::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Type' => 'vWord',
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'CollectData' => $v['CollectData'],
                'NotifyStatus' => $v['NotifyStatus'],
                'NotifyCollectData' => $v['NotifyCollectData'],
                'created_at' => $v['created_at'],
            ];
        });

        $TmpStringV = $vString::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Type' => 'vString',
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'CollectData' => $v['CollectData'],
                'NotifyStatus' => $v['NotifyStatus'],
                'NotifyCollectData' => $v['NotifyCollectData'],
                'created_at' => $v['created_at'],
            ];
        });
        return view('Component.MobileIndex', compact('TmpBitCells', 'TmpWordV', 'TmpStringV'));
    }
}
