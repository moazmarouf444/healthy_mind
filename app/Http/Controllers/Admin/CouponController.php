<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\coupons\Store;
use App\Http\Requests\Admin\coupons\Update;
use App\Models\Coupon ;
use App\Traits\Report;


class CouponController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $coupons = Coupon::search(request()->searchArray)->paginate(30);
            $html = view('admin.coupons.table' ,compact('coupons'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.coupons.index');
    }

    public function create()
    {
        return view('admin.coupons.create');
    }


    public function store(Store $request)
    {
        Coupon::create($request->validated());
        Report::addToLog('  اضافه كوبونات الهصم') ;
        return response()->json(['url' => route('admin.coupons.index')]);
    }
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit' , ['coupon' => $coupon]);
    }

    public function update(Update $request, $id)
    {
        $coupon = Coupon::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل كوبونات الهصم') ;
        return response()->json(['url' => route('admin.coupons.index')]);
    }

    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.show' , ['coupon' => $coupon]);
    }
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id)->delete();
        Report::addToLog('  حذف كوبونات الهصم') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Coupon::WhereIn('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من كوبونات الخصم') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
