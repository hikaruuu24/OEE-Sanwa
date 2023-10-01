<?php

namespace App\Http\Controllers;

use App\Models\OeeMachine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class OeeMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Data OEE';
        $data['oee'] = OeeMachine::orderBy('id', 'desc')->get();
        return view('oee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create Data OEE';
        return view('oee.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'nullable',
        //     'date' => 'nullable',
        //     'total' => 'nullable',
        //     'good' => 'nullable',
        //     'reject' => 'nullable',
        //     'downtime' => 'nullable',
        //     'time_from' => 'nullable',
        //     'time_to' => 'nullable',
        //     'production_time' => 'nullable',
        //     'description' => 'nullable'
        // ]);
        try {
            OeeMachine::create([
                'name' => $request->name,
                'date' => $request->date,
                'time_from' => $request->time_from,
                'time_to' => $request->time_to,
                'total' => $request->total,
                'good' => $request->good,
                'reject' => $request->reject,
                'production_time' => $request->production_time,
                'downtime' => $request->downtime,
                'description' => $request->description
            ]);
            return redirect()->route('oee.index')->with(['success' => 'OEE added successfully!']);
        } catch (\Throwable $th) {
            return redirect()->route('oee.index')->with(['failed' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OeeMachine  $oeeMachine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OeeMachine  $oeeMachine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit Data OEE';
        $data['oee'] = OeeMachine::findOrFail($id);
        return view('oee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OeeMachine  $oeeMachine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'nullable',
        //     'date' => 'nullable',
        //     'total' => 'nullable',
        //     'good' => 'nullable',
        //     'reject' => 'nullable',
        //     'downtime' => 'nullable',
        //     'time_from' => 'nullable',
        //     'time_to' => 'nullable',
        //     'production_time' => 'nullable',
        //     'description' => 'nullable'
        // ]);
        try {
            OeeMachine::where('id', $id)->update([
                'name' => $request->name,
                'date' => $request->date,
                'time_from' => $request->time_from,
                'time_to' => $request->time_to,
                'total' => $request->total,
                'good' => $request->good,
                'reject' => $request->reject,
                'production_time' => $request->production_time,
                'downtime' => $request->downtime,
                'description' => $request->description
            ]);

            return redirect()->route('oee.index')->with(['success' => 'OEE edited successfully!']);
        } catch (\Throwable $th) {
            return redirect()->route('oee.index')->with(['failed' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OeeMachine  $oeeMachine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $oee = OeeMachine::findOrFail($id);
            $oee->delete();
            Session::flash('success', 'OEE deleted successfully!');
            return response()->json(['status' => '200']);
        } catch (\Throwable $th) {
            Session::flash('failed', 'OEE deleted fail! '.$th);
            return response()->json(['status' => '500']);

        }
        

    }
}
