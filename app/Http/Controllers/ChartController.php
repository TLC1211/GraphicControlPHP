<?php

namespace App\Http\Controllers;

use App\Models\ChartCollect;
use App\Models\ChartValue;
use App\Tool\ResponseService;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function Api(Request $request)
    {
        $ResponseService = new ResponseService;
        $TmpGuid = $request['Guid'];
        $TmpUpload = json_decode($request['Upload'], true);

        $ChartCollect = new ChartCollect;

        $TmpChartCollect = $ChartCollect::find($TmpGuid);
        $TmpChartCollect['Address'] = $TmpUpload['Address'];
        $TmpChartCollect['Remark'] = $TmpUpload['Remark'];
        $TmpChartCollect->update();

        $ChartValue = new ChartValue;
        $ChartValue::where('ChartCollectsGuid', '=', $TmpGuid)->delete();

        return $ResponseService->JSON_HTTP_OK(['Status' => true]);
    }

    public function Index()
    {
        $ChartCollect = new ChartCollect;
        $TmpChartCollect = $ChartCollect::all()->map(function ($data) {
            return [
                'Guid' => $data['Guid'],
                'Address' => $data['Address'],
                'Remark' => $data['Remark'],
            ];
        });
        return view('CharSet.WebIndex', compact('TmpChartCollect'));
    }

    public function mb_Index()
    {
        $ChartCollect = new ChartCollect;
        $TmpChartCollect = $ChartCollect::all()->map(function ($data) {
            return [
                'Guid' => $data['Guid'],
                'Address' => $data['Address'],
                'Remark' => $data['Remark'],
            ];
        });
        return view('CharSet.MobileIndex', compact('TmpChartCollect'));
    }
}
