<?php
namespace App\Repository\Sections;

use App\Events\SectionCreated;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
      $sections = Section::all();
      return view('Dashboard.Sections.index',compact('sections'));
    }
    public function create()
    {
        return view('Dashboard.Sections.index2');
        }

    public function store($request)
    {
        Section::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        
        foreach (Admin::all() as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'message' => 'قسم جديد: '.$request->input('name'),
            ]);
        }
        event(new SectionCreated($request->input('name')));
        session()->flash('add');
        return redirect()->route('Sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),

        ]);
        session()->flash('edit');
        return redirect()->route('Sections.index');
    }


    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }

    public function show($id)
    {
        $doctors =Section::findOrFail($id)->doctors;
        $section = Section::findOrFail($id);
        return view('Dashboard.Sections.show_doctors',compact('doctors','section'));
    }

}
