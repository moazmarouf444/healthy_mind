<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\testresults\Store;
use App\Http\Requests\Admin\testresults\Update;
use App\Models\TestResults ;
use App\Traits\Report;


class TestResultsController extends Controller
{
    public function index($id = null)
    {

        if (request()->ajax()) {
            $testresults = TestResults::search(request()->searchArray)->paginate(30);
            $html = view('admin.testresults.table' ,compact('testresults'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.testresults.index');
    }

    public function create()
    {
        return view('admin.testresults.create');
    }


    public function store(Store $request)
    {
        TestResults::create($request->validated());
        Report::addToLog('  اضافه نتائج الاختبار');
        return response()->json(['url' => route('admin.testresults.index')]);
    }
    public function edit($id)
    {
        $testresults = TestResults::findOrFail($id);
        return view('admin.testresults.edit' , ['testresults' => $testresults]);
    }

    public function update(Update $request, $id)
    {
        $testresults = TestResults::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل نتائج الاختبار') ;
        return response()->json(['url' => route('admin.testresults.index')]);
    }

    public function show($id)
    {
        $testresults = TestResults::findOrFail($id);

        return view('admin.testresults.show' , ['testresults' => $testresults]);
    }
    public function destroy($id)
    {
        $testresults = TestResults::findOrFail($id)->delete();
        Report::addToLog('  حذف نتائج الاختبار') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (TestResults::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من نتائج الاختبار') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
