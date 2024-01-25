<?php

namespace App\Http\Controllers;

use App\Models\Pal;
use Illuminate\Http\Request;

class PalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $palBuilder = Pal::with(['attrs', 'drops']);

        // $palBuilder->when(request('name'), function ($query) {
        //     return $query->where(function ($q) {
        //         $q->where('zh_name', 'like', '%' . request('name') . '%')
        //             ->orWhere('en_name', 'like', '%' . request('name') . '%');
        //     });
        // });
        // $pals = $palBuilder->orderBy('id', 'asc')->get();
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pal = new Pal();
        $pal->name = $request->name;
        $pal->save();
        return $pal;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Pal::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Pal::findOrFailed($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Pal::findOrFailed($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pal = Pal::findOrFailed($id);
        $pal->name = $request->name;
        $pal->save();
        return $pal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Pal::destroy($id);
    }
}
