<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerStore;
use App\Models\ApplyJob;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('created_at','desc')->get();

        return view('admin.dashboard.careers.index',compact('careers'));
    }

    public function create()
    {
        return view('admin.dashboard.careers.create');
    }

    public function store(CareerStore $request)
    {
        Career::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'category' => $request['category'],
            'description' => $request['description'],
            'qualification' => $request['qualification'],
            'city' => $request['city'],
            'country' => $request['country'],
        ]);


        return redirect()->route('admin.dashboard.career.index')->with('popup_success','Job has been created');
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);

        return view('admin.dashboard.careers.edit',compact('career'));
    }

    public function update(CareerStore $request, $id)
    {
        $career = Career::findOrFail($id);

        $career['name'] = $request['name'];
        $career['type'] = $request['type'];
        $career['category'] = $request['category'];
        $career['description'] = $request['description'];
        $career['qualification'] = $request['qualification'];
        $career['city'] = $request['city'];
        $career['country'] = $request['country'];

        $career->save();


        return redirect()->route('admin.dashboard.career.index')->with('popup_success','Job has been updated');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);

        $career->delete();

        return redirect()->route('admin.dashboard.career.index')->with('popup_success','Job has been deleted');
    }

    public function application()
    {
        $applications = ApplyJob::orderBy('created_at','desc')->get();

        return view('admin.dashboard.careers.applications',compact('applications'));
    }
}
