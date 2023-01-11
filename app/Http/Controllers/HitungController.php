<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hitung.index')->with([
            'hitung' => Hitung::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hitung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|min:3',
            'number' => 'required|min:1',
        ]);

        $hitung = new Hitung;
        $hitung->name = $request->name;
        $hitung->number = $request->number;
        $hitung->save();

        return to_route('hitung.index')->with('success'.'Data successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('hitung.edit')->with([
            'hitung' => Hitung::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|min:3',
            'number' => 'required|min:1',
        ]);

        $hitung = Hitung::find($id);
        $hitung->name = $request->name;
        $hitung->number = $request->number;
        $hitung->save();

        return to_route('hitung.index')->with('success'.'Data successfully changes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hitung = Hitung::find($id);
        $hitung->delete();

        return back()->with('success'.'Data successfully deleted!');
    }

    public function hitung(){
        $total = Hitung::count();
        $mean = number_format(Hitung::avg('number'), 1, ',');
        $min = Hitung::min('number');
        $max = Hitung::max('number');

        $hitung = [
            'total' => $total, 'mean' => $mean, 'min' => $min, 'max' => $max
        ];

        return view('hitung.index', compact('data'));
    }
}
