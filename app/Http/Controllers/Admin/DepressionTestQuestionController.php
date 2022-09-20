<?php

namespace App\Http\Controllers\Admin;

use App\Models\DepressionTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\depressiontestquestions\Store;
use App\Http\Requests\Admin\depressiontestquestions\Update;
use App\Models\DepressionTestQuestion;
use App\Traits\Report;


class DepressionTestQuestionController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $depressiontestquestions = DepressionTestQuestion::search(request()->searchArray)->paginate(30);
            $html = view('admin.depressiontestquestions.table', compact('depressiontestquestions'))->render();
            return response()->json(['html' => $html]);
        }
        return view('admin.depressiontestquestions.index');
    }

    public function create()
    {
        return view('admin.depressiontestquestions.create');
    }


    public function store(Store $request)
    {
        DepressionTestQuestion::create($request->validated());
        Report::addToLog('  اضافه اسئله واجوبه مقياس بيك للاكتئاب');
        return response()->json(['url' => route('admin.depressiontestquestions.index')]);
    }

    public function edit($id)
    {
        $depressiontestquestion = DepressionTestQuestion::findOrFail($id);
        return view('admin.depressiontestquestions.edit', compact('depressiontestquestion'));
    }

    public function update(Update $request, $id)
    {
        $depressiontestquestion = DepressionTestQuestion::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل اسئله واجوبه مقياس بيك للاكتئاب');
        return response()->json(['url' => route('admin.depressiontestquestions.index')]);
    }

    public function show($id)
    {
        $depressiontestquestion = DepressionTestQuestion::findOrFail($id);
        return view('admin.depressiontestquestions.show', ['depressiontestquestion' => $depressiontestquestion]);
    }

    public function destroy($id)
    {
        $depressiontestquestion = DepressionTestQuestion::findOrFail($id)->delete();
        Report::addToLog('  حذف اسئله واجوبه مقياس بيك للاكتئاب');
        return response()->json(['id' => $id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);

        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (DepressionTestQuestion::WhereIn('id', $ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من ????? ?????? ????? ??? ????????');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
