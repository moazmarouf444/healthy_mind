<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\helps\Store;
use App\Http\Requests\Admin\helps\Update;
use App\Models\Help ;
use App\Traits\Report;


class HelpController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $helps = Help::search(request()->searchArray)->paginate(30);
            $html = view('admin.helps.table' ,compact('helps'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.helps.index');
    }

    public function create()
    {
        return view('admin.helps.create');
    }


    public function store(Store $request)
    {
        Help::create($request->validated());
        Report::addToLog('  اضافه المساعده') ;
        return response()->json(['url' => route('admin.helps.index')]);
    }
    public function edit($id)
    {
        $help = Help::findOrFail($id);
        return view('admin.helps.edit' , ['help' => $help]);
    }

    public function update(Update $request, $id)
    {
        $help = Help::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل المساعده') ;
        return response()->json(['url' => route('admin.helps.index')]);
    }

    public function show($id)
    {
        $help = Help::findOrFail($id);
        return view('admin.helps.show' , ['help' => $help]);
    }
    public function destroy($id)
    {
        $help = Help::findOrFail($id)->delete();
        Report::addToLog('  حذف المساعده') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Help::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من المسهدات') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
