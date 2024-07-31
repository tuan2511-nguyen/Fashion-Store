<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SizeService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $service;

    public function __construct(SizeService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $sizes = $this->service->getAllSizes();
        return view('admin.pages.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $this->service->createSize($request->all());
            return redirect()->route('sizes.index')->with('success', 'Size created successfully.');
        }
        catch(ValidationException $e)
        {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size = $this->service->getSizeById($id);
        return view('admin.pages.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $this->service->updateSize($id,$request->all());
            return redirect()->route('sizes.index')->with('success', 'Size updated successfully.');
        }
        catch(ValidationException $e)
        {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->deleteSize($id);
        return redirect()->route('sizes.index');
    }
}
