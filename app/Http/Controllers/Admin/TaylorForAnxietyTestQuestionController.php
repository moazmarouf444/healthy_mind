<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\taylorforanxietytestquestions\Store;
use App\Http\Requests\Admin\taylorforanxietytestquestions\Update;
use App\Models\TaylorForAnxietyTestQuestion ;
use App\Traits\Report;


class TaylorForAnxietyTestQuestionController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $taylorforanxietytestquestions = TaylorForAnxietyTestQuestion::search(request()->searchArray)->paginate(30);
            $html = view('admin.taylorforanxietytestquestions.table' ,compact('taylorforanxietytestquestions'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.taylorforanxietytestquestions.index');
    }

    public function create()
    {
        return view('admin.taylorforanxietytestquestions.create');
    }


    public function store(Store $request)
    {
        TaylorForAnxietyTestQuestion::create($request->validated());
        Report::addToLog('  اضافه اسئله واجوبه مقياس تايلور للاختبار') ;
        return response()->json(['url' => route('admin.taylorforanxietytestquestions.index')]);
    }
    public function edit($id)
    {
        $taylorforanxietytestquestion = TaylorForAnxietyTestQuestion::findOrFail($id);
        return view('admin.taylorforanxietytestquestions.edit' , ['taylorforanxietytestquestion' => $taylorforanxietytestquestion]);
    }

    public function update(Update $request, $id)
    {
        $taylorforanxietytestquestion = TaylorForAnxietyTestQuestion::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل اسئله واجوبه مقياس تايلور للاختبار') ;
        return response()->json(['url' => route('admin.taylorforanxietytestquestions.index')]);
    }

    public function show($id)
    {
        $taylorforanxietytestquestion = TaylorForAnxietyTestQuestion::findOrFail($id);
        return view('admin.taylorforanxietytestquestions.show' , ['taylorforanxietytestquestion' => $taylorforanxietytestquestion]);
    }
    public function destroy($id)
    {
        $taylorforanxietytestquestion = TaylorForAnxietyTestQuestion::findOrFail($id)->delete();
        Report::addToLog('  حذف اسئله واجوبه مقياس تايلور للاختبار') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (TaylorForAnxietyTestQuestion::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من اسئله واجوبه مقياس تايلور للاختبار') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
