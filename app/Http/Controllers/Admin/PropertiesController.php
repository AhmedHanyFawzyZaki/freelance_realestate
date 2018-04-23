<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Property;
use Illuminate\Http\Request;

use Image;
use Illuminate\Support\Facades\Storage;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $properties = Property::where('cover_image', 'LIKE', "%$keyword%")
                ->orWhere('main_image', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('name_ar', 'LIKE', "%$keyword%")
                ->orWhere('name_sp', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('description_ar', 'LIKE', "%$keyword%")
                ->orWhere('description_sp', 'LIKE', "%$keyword%")
                ->orWhere('introduction', 'LIKE', "%$keyword%")
                ->orWhere('introduction_ar', 'LIKE', "%$keyword%")
                ->orWhere('introduction_sp', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $properties = Property::paginate($perPage);
        }

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cover_image' => 'required',
            'main_image' => 'required',
            'price' => 'required',
            'name' => 'required',
            'name_ar' => 'required',
            'name_sp' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
            'description_sp' => 'required',
            'introduction' => 'required',
            'introduction_ar' => 'required',
            'introduction_sp' => 'required'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $fileName = 'main-image' . time() . rand(1, 100) . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            /*$img->resize(250, 150, function ($constraint) {
                $constraint->aspectRatio();
            });*/

            $img->stream();
            Storage::disk('public')->put('images/properties/' . $fileName, $img);
            $requestData['main_image'] = $fileName;
        }

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $fileName = 'cover_image' . time() . rand(1, 100) . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(500, 600, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream();
            Storage::disk('public')->put('images/properties/' . $fileName, $img);
            $requestData['cover_image'] = $fileName;
        }

        Property::create($requestData);

        return redirect('admin/properties')->with('flash_message', 'Property added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);

        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cover_image' => 'nullable',
            'main_image' => 'nullable',
            'price' => 'required',
            'name' => 'required',
            'name_ar' => 'required',
            'name_sp' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
            'description_sp' => 'required',
            'introduction' => 'required',
            'introduction_ar' => 'required',
            'introduction_sp' => 'required'
        ]);
        $requestData = $request->all();

        $property = Property::findOrFail($id);

        if ($request->hasFile('main_image')) {
            Storage::disk('public')->delete('images/properties/' . $property->main_image);
            $image = $request->file('main_image');
            $fileName = 'main-image' . time() . rand(1, 100) . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            /*$img->resize(250, 150, function ($constraint) {
                $constraint->aspectRatio();
            });*/

            $img->stream();
            Storage::disk('public')->put('images/properties/' . $fileName, $img);
            $requestData['main_image'] = $fileName;
        }

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete('images/properties/' . $property->cover_image);
            $image = $request->file('cover_image');
            $fileName = 'cover_image' . time() . rand(1, 100) . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(500, 600, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream();
            Storage::disk('public')->put('images/properties/' . $fileName, $img);
            $requestData['cover_image'] = $fileName;
        }
        $property->update($requestData);

        return redirect('admin/properties')->with('flash_message', 'Property updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Property::destroy($id);

        return redirect('admin/properties')->with('flash_message', 'Property deleted!');
    }
}
