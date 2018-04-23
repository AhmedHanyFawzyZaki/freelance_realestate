<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Partner;
use Illuminate\Http\Request;

use Image;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
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
            $partners = Partner::where('image', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('name_ar', 'LIKE', "%$keyword%")
                ->orWhere('description_ar', 'LIKE', "%$keyword%")
                ->orWhere('name_sp', 'LIKE', "%$keyword%")
                ->orWhere('description_sp', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $partners = Partner::paginate($perPage);
        }

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.partners.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required',
            'name_ar' => 'required',
            'description_ar' => 'required',
            'name_sp' => 'required',
            'description_sp' => 'required'
        ]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . rand(1, 100) . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(250, 150, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream();
            Storage::disk('public')->put('images/partners/' . $fileName, $img);
            $requestData['image'] = $fileName;
        }

        Partner::create($requestData);

        return redirect('admin/partners')->with('flash_message', 'Partner added!');
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
        $partner = Partner::findOrFail($id);

        return view('admin.partners.show', compact('partner'));
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
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
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
            'image' => 'nullable',
            'name' => 'required',
            'description' => 'required',
            'name_ar' => 'required',
            'description_ar' => 'required',
            'name_sp' => 'required',
            'description_sp' => 'required'
        ]);
        $requestData = $request->all();
        $partner = Partner::findOrFail($id);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('images/partners/' . $partner->image);
            $image = $request->file('image');
            $fileName = time() . rand(1, 100) . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(250, 150, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream();
            Storage::disk('public')->put('images/partners/' . $fileName, $img);
            $requestData['image'] = $fileName;
        }

        $partner->update($requestData);

        return redirect('admin/partners')->with('flash_message', 'Partner updated!');
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
        Partner::destroy($id);

        return redirect('admin/partners')->with('flash_message', 'Partner deleted!');
    }
}
