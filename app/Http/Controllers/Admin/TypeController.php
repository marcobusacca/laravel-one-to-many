<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $message = $request->query->get('message');

        $types = Type::all();

        return view('admin.types.index', compact('types', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Type $type)
    {
        $message = $request->query->get('message');

        return view('admin.types.show', compact('type', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $form_data = $request->all();

        $type = new Type();

        $form_data['slug'] = $type->generateSlug($form_data['name']);

        $type->fill($form_data);

        $type->save();

        $message = 'Creazione Tipologia Completata';

        return redirect()->route('admin.types.show', compact('type', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->all();

        $form_data['slug'] = $type->generateSlug($form_data['name']);

        $type->update($form_data);

        $message = 'Modifica Tipologia Completata';

        return redirect()->route('admin.types.show', compact('type', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
}
