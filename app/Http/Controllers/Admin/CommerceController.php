<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Commerce;
use Illuminate\Support\Facades\Storage;

class CommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.commerces.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.commerces.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required|max:10',
            'email' => 'required|unique:commerces',
            'website' => 'required',
            'capacity' => 'required',
            'available_capacity' => 'required',
            'services' => 'required'
        ]);
        $commerce = Commerce::create($request->all());
        if ($request->file('file')){
            $url = Storage::put('images', $request->file('file'));
            $commerce->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.commerces.edit', $commerce)->with('info', 'El comercio se creo con exito!.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commerce $commerce)
    {
        return view('admin.commerces.show', compact('commerce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commerce $commerce)
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.commerces.edit', compact('commerce', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commerce $commerce)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required|max:10',
            'email' => 'required',
            'website' => 'required',
            'capacity' => 'required',
            'available_capacity' => 'required',
            'services' => 'required'
        ]);

        $commerce->update($request->all());

        if($request->file('file')){
            $url = Storage::put('images', $request->file('file'));

            if($commerce->image){
                Storage::delete($commerce->image->url);
                $commerce->image()->update([
                    'url' => $url
                ]);
            }else{
                $commerce->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.commerces.edit', $commerce)->with('info', 'El comercio se actualizo con exito!.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commerce $commerces)
    {

    }
}
