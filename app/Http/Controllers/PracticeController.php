<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Employee;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['practices'] = Practice::latest()->paginate(4);

        return view('practice.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fields'] = Field::all();

        return view('practice.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $newPracticeForm = $request->validate([
                'name' => 'required',
                'email' => ['required', 'email'],
                'website' => 'required',
                'logo' => ['nullable', 'dimensions:min_width:100, min_height:100']
            ]);
    
            if($request->hasFile('logo')) {
                $newPracticeForm['logo'] = $request->file('logo')->store('public');
            }
    
            $created = Practice::create($newPracticeForm);

            if($request->fields) {
                foreach($request->fields as $field) {
                    $fieldId = Field::where('tag', $field)->value('id');
                    $created->fields()->attach($fieldId);
                }
            }
    
            return redirect('/practices');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        $data['practice'] = $practice;

        return view('practice.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice, Field $fields)
    {
        $diff = Field::all()->diff($practice->fields);

        $data = [
            'practice' => $practice,
            'diff' => $diff,
            'fields' => $practice->fields
        ];

        return view('practice.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        $editPracticeForm = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'logo' => ['image', 'nullable', 'dimensions:min_width:100, min_height:100']
        ]);
        // image dovoljan u ovoj validaciji
        //'file_input' => 'file|mimes:jpg,png|max:512' CUSTOM MIME TYPES
        // https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types

        if($request->hasFile('logo')) {
            $editPracticeForm['logo'] = $request->file('logo')->store('public');
        }

        if($request->fields) {
            $practice->fields()->detach();
            foreach($request->fields as $field) {
                $fieldId = Field::where('tag', $field)->value('id');
                $practice->fields()->attach($fieldId);
            }
        }

        if($request->employees) {
            foreach($request->employees as $employee) {
                Employee::where('id', $employee)->delete();
            }
        }
        
        $practice->update($editPracticeForm);

        // return Redirect::refresh();
        return redirect("/practices/$practice->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        $practice->delete();
        
        return redirect('/practices');
    }
}
