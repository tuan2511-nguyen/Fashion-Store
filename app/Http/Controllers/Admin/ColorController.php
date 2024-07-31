<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ColorService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;
    public function __construct(ColorService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $colors = $this->service->getAllColors();
        return view('admin.pages.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->service->createColor($request->all());
            return redirect()->route('colors.index')->with('success', 'Color created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = $this->service->getColorById($id);
        return view('admin.pages.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->service->updateColor($id, $request->all());
            return redirect()->route('colors.index')->with('success', 'Color updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->deleteColor($id);
        return redirect()->route('colors.index');
    }
}
