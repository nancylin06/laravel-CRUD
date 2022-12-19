<?php

namespace App\Http\Controllers;

use App\Models\name;
use Illuminate\Http\Request;

class firstController extends Controller
{
    public function table()
    {
        $vals = name::paginate(5);
        return view('home', compact('vals'));
    }
    public function insert()
    {
        return view('insert');
    }
    public function valid(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
            'country' => 'required',
            'hobbies' => 'required'
        ]);

        $name = new name;
        $name->name = $request->name;
        $name->mobile_number = $request->mobile;
        $name->gender = $request->gender;
        if ($request->hasFile('mage')) {
            $request->validate([
                'mage' => 'required|image|mimes:png,jpg,jpeg,gif|max:512'
            ]);

            $image = $request->file('mage');
            $date = date('d-m-y') . time() . '.' . $image->extension();

            $path = public_path('/images');
            $image->move($path, $date);
            $name->image_url = "/images/" . $date;
        }
        $name->place = $request->country;
        $name->likes = json_encode($request->hobbies);
        $name->save();

        return redirect('/')->with('message', 'Successfully uploaded!');
    }
    public function edit($id)
    {
        $input = name::find($id);
        return view('edit', compact('input'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
            'country' => 'required',
            'hobbies' => 'required'
        ]);

        $got = name::find($request->id);
        $got->name = $request->name;
        $got->mobile_number = $request->mobile;
        $got->gender = $request->gender;
        if ($request->hasFile('mage')) {
            $request->validate([
                'mage' => 'required|image|mimes:png,jpg,jpeg,gif|max:512'
            ]);

            $image = $request->file('mage');
            $date = date('d-m-y') . time() . '.' . $image->extension();

            $path = public_path('/images');
            $image->move($path, $date);
            $got->image_url = "/images/" . $date;
        }
        $got->place = $request->country;
        $got->likes = json_encode($request->hobbies);
        $got->save();

        return redirect('/')->with('message', 'Successfully updated!');
    }
    public function delete($ids)
    {
        $delete = name::find($ids);
        $delete->delete();
        return back()->with('show', 'Data has been deleted!');
    }
}
