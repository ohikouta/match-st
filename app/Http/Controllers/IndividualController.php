<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;

class IndividualController extends Controller
{
    public function show()
    {
        return view('individuals.plan');
    }
    
    public function store(Request $request, individual $individual)
    {
        $input = $request['individual'];
        $individual->fill($input)->save();
        return redirect('/individuals/' . $individual->id);
    }
    
    public function showResult(Individual $individual)
    {
        return view('individuals.result')->with(['individual' => $individual]);
    }
    
    public function showDetail($id)
    {
        $individual = Individual::find($id);
        
        if (!$individual) {
            return abort(404);
        }
        
        return view('individuals.show', compact('individual'));
    }
}
