<?php

namespace App\Http\Controllers;

use App\Models\BitCell;
use App\Models\ChartCollect;
use App\Models\ChartValue;
use App\Models\vString;
use App\Models\vWord;
use App\Tool\ResponseService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function vChart(Request $request): \Illuminate\Http\JsonResponse
    {
        $ResponseService = new ResponseService();

        $ChartCollect = new ChartCollect;
        $vChartValue = $ChartCollect::all()->map(function ($v, $k) {
            $TmpValueIndex = 1;

            $ChartValue = new ChartValue;
            $TmpChartValue = $ChartValue::where([['ChartCollectsGuid', '=', $v['Guid']]])
                ->get()
                ->sortByDesc('TimeStamp')
                ->take($TmpValueIndex);

            $TmpArray = [];
            foreach (explode(',', $v['Address']) as $value) $TmpArray[$value] = collect();
            foreach ($TmpChartValue as $key => $value) {
                foreach ($value['Collect'] as $key1 => $value1) {
                    $TmpArray[$value1['Address']]->push([
                        'TimeStamp' => $value['TimeStamp'],
                        'Value' => $value1['Value']
                    ]);
                }
            }

            return [
                'Remark' => $v['Remark'],
                'Data' => $TmpArray
            ];
        });
        return $ResponseService->JSON_HTTP_OK($vChartValue);
    }

    public function vStringByAll(Request $request): \Illuminate\Http\JsonResponse
    {
        $ResponseService = new ResponseService();
        $vString = new vString;
        $vStrings = $vString::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                // 'PicType' => $v['PicType'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue'],
            ];
        })->sortBy('Index')->values();
        return $ResponseService->JSON_HTTP_OK($vStrings);
    }

    public function vWordByAll(Request $request): \Illuminate\Http\JsonResponse
    {
        $ResponseService = new ResponseService();
        $vWord = new vWord;
        $vWords = $vWord::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue'],
            ];
        })->sortBy('Index')->values();
        return $ResponseService->JSON_HTTP_OK($vWords);
    }

    public function BitCellByAll(Request $request): \Illuminate\Http\JsonResponse
    {
        $ResponseService = new ResponseService();
        $BitCell = new BitCell;
        $BitCells = $BitCell::all()->sortBy('Address')->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue'],
            ];
        })->sortBy('Index')->values();
        return $ResponseService->JSON_HTTP_OK($BitCells);
    }

    public function Api(Request $request): \Illuminate\Http\JsonResponse
    {
        $ResponseService = new ResponseService;
        $TmpGuid = $request['Guid'];
        $TmpType = $request['Type'];
        $TmpHandTriggerValue = $request['HandTriggerValue'];

        $BitCell = new BitCell;
        $vWord = new vWord;
        $vString = new vString;

        if ($TmpType === 'BitCell') {
            $Tmp_Find = $BitCell::find($TmpGuid);
        } elseif ($TmpType === 'vString') {
            $Tmp_Find = $vString::find($TmpGuid);
        } else {
            $Tmp_Find = $vWord::find($TmpGuid);
        }

        $Tmp_Find['HandTrigger'] = 1;
        $Tmp_Find['HandTriggerValue'] = $TmpHandTriggerValue;
        $Tmp_Find->update();

        return $ResponseService->JSON_HTTP_OK([
            'Name' => $Tmp_Find['Name'],
        ]);
    }

    public function Index()
    {
        $TmpBitCell = new BitCell;
        $TmpWord = new vWord;
        $TmpString = new vString;
        $TmpChartCollect = new ChartCollect;

        $BitCells = $TmpBitCell::all()->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue']
            ];
        });
        $vWord = $TmpWord::all()->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue']
            ];
        });
        $vString = $TmpString::all()->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue']
            ];
        });
        $vChartValue = $TmpChartCollect::all()->map(function ($v, $k) {
            $TmpValueIndex = 1;

            $ChartValue = new ChartValue;
            $TmpChartValue = $ChartValue::where([['ChartCollectsGuid', '=', $v['Guid']]])
                ->get()
                ->sortByDesc('TimeStamp')
                ->take($TmpValueIndex);

            $TmpArray = [];
            foreach (explode(',', $v['Address']) as $value) $TmpArray[$value] = collect();
            foreach ($TmpChartValue as $key => $value) {
                foreach ($value['Collect'] as $key1 => $value1) $TmpArray[$value1['Address']]->push([
                    'TimeStamp' => $value['TimeStamp'] * 1000,
                    'Value' => $value1['Value']
                ]);
            }

            return [
                'Remark' => $v['Remark'],
                'Data' => $TmpArray
            ];
        });

        return view('DashBoard.WebIndex', compact('BitCells', 'vWord', 'vString', 'vChartValue'));
    }

    public function mb_Index()
    {
        $TmpBitCell = new BitCell;
        $TmpWord = new vWord;
        $TmpString = new vString;
        $TmpChartCollect = new ChartCollect;

        $BitCells = $TmpBitCell::all()->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue']
            ];
        });
        $vWord = $TmpWord::all()->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue']
            ];
        });
        $vString = $TmpString::all()->map(function ($v, $k) {
            return [
                'Index' => $k,
                'Guid' => $v['Guid'],
                'Name' => $v['Name'],
                'Address' => $v['Address'],
                'NowValue' => $v['NowValue'],
                'HandTrigger' => $v['HandTrigger'],
                'HandTriggerValue' => $v['HandTriggerValue']
            ];
        });
        $vChartValue = $TmpChartCollect::all()->map(function ($v, $k) {
            $TmpValueIndex = 1;

            $ChartValue = new ChartValue;
            $TmpChartValue = $ChartValue::where([['ChartCollectsGuid', '=', $v['Guid']]])
                ->get()
                ->sortByDesc('TimeStamp')
                ->take($TmpValueIndex);

            $TmpArray = [];
            foreach (explode(',', $v['Address']) as $value) $TmpArray[$value] = collect();
            foreach ($TmpChartValue as $key => $value) {
                foreach ($value['Collect'] as $key1 => $value1) $TmpArray[$value1['Address']]->push([
                    'TimeStamp' => $value['TimeStamp'] * 1000,
                    'Value' => $value1['Value']
                ]);
            }

            return [
                'Remark' => $v['Remark'],
                'Data' => $TmpArray
            ];
        });

        return view('DashBoard.MobileIndex', compact('BitCells', 'vWord', 'vString', 'vChartValue'));
    }

}
