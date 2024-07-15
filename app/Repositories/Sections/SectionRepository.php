<?php
namespace App\Repositories\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{
    //index ---------------------------------------
    public function index()
    {
         $sections = Section::all();
         return view('Dashboard.section.index',compact('sections'));
    }

  //store------------------------------------------

    public function store($request)
    {

         Section::create([

            'name' => $request->input('name'),
         ]);

         session()->flash('add');

         return redirect()->route('sections.index');
    }

    //update-----------------------------------

    public function update($request)
    {

         $section = Section::findOrfail($request->id);
         $section->update([

            'name' => $request->input('name'),
         ]);

         session()->flash('edit');

         return redirect()->route('sections.index');

    }

    //delete=--------------------------------
    public function destroy($request)
    {

     Section::findOrfail($request->id)->delete();


          session()->flash('delete');

         return redirect()->route('sections.index');

    }



}
