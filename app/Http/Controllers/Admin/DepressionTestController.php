<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\depression_test\Update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DepressionTest ;
use App\Traits\Report;


class DepressionTestController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $depressiontests = DepressionTest::search(request()->searchArray)->paginate(30);
            $html = view('admin.depressiontests.table' ,compact('depressiontests'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.depressiontests.index');
    }



    public function edit($id)
    {
        $depressiontest = DepressionTest::findOrFail($id);
        return view('admin.depressiontests.edit' , ['depressiontest' => $depressiontest]);
    }

    public function update(Update $request, $id)
    {
        $depressiontest = DepressionTest::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل اسئله واجوبه مقياس بيك للاكتئاب') ;
        return response()->json(['url' => route('admin.depressiontests.index')]);
    }

    public function show($id)
    {
        $depressiontest = DepressionTest::findOrFail($id);

        return view('admin.depressiontests.show' , ['depressiontest' => $depressiontest]);
    }
    public function destroy($id)
    {
        $depressiontest = DepressionTest::findOrFail($id)->delete();

        Report::addToLog('  حذف اسئله واجوبه مقياس بيك للاكتئاب') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (DepressionTest::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من ????? ?????? ????? ??? ????????') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
