<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RadioShow;
use App\Models\RadioTimeTable;
use App\Models\UserProfile;
class RadioShowController extends Controller
{

    public function index()
    {

       $programas = RadioShow::all();
        return view('dashboard.admin.programas.index', ['programas'=> $programas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $TimeTables = RadioTimeTable::all();
      $users = UserProfile::all();
      return view('dashboard.admin.programas.create', ['TimeTables'=> $TimeTables ,'users'=> $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $show = new RadioShow;
      $show->title = $request->title;
      $show->slug = str_replace(' ', '-', strtolower($request->slug));
      $show->genry = $request->genry;
      $show->description = $request->description;
      $show->website = $request->website;
      $schemas = $request->input('timetables', []);
        $profiles = $request->input('users', []);

    //  $RadioShow->status = $request->status;
      //$create_date = date_create()->format('Y-m-d H:i:s');

      if($request->status == 'published'){
          $show->status = "published";
      }elseif($request->status == 'draft'){
          $show->status = "draft";
      }
      $show->save();

      $show->users()->sync($profiles, $show);
      $show->timetables()->sync($schemas, $show);

      if($request->saveedit == 'edit'){
          return redirect()->route('shows.edit', $show->id);
      }else{

          return redirect()->route('shows.index');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(RadioShow $RadioShow)
    {
        return view('dashboard.admin.programas.show', ['RadioShow'=> $RadioShow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(RadioShow $RadioShow)
    {
        $TimeTables = RadioTimeTable::all();
        $users = UserProfile::all();
        return view('dashboard.admin.programas.edit', ['RadioShow'=> $RadioShow,'TimeTables'=> $TimeTables ,'users'=> $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadioShow $RadioShow)
    {
        $show = RadioShow::findorfail($RadioShow->id);
        $show->title = $request->title;
        $show->slug = str_replace(' ', '-', strtolower($request->slug));
        $show->genry = $request->genry;
        $show->description = $request->description;
        $show->website = $request->website;

        
        //$create_date = date_create()->format('Y-m-d H:i:s');
        if($request->status == 'published'){
            $RadioShow->status = "published";
        }else{
            $RadioShow->status = "draft";
        }
        $show->update();
        $schemas = $request->input('timetables', []);
        $profiles = $request->input('users', []);
        $show->users()->sync($profiles, $show);
        $show->timetables()->sync($schemas, $show);
        //$show->timetables($show,$schemas);

       if($request->saveedit == 'edit'){
            return redirect()->route('shows.edit', $RadioShow->id);
        }else{

            return redirect()->route('shows.index');
        }
       // return  $show->timetables;
}
public function destroy(RadioShow $RadioShow)
{
  $show = RadioShow::findorfail($RadioShow->id);
$show->delete();
  $TimeTables = RadioTimeTable::all();
  $users = UserProfile::all();
  
  $show->timetables()->detach($TimeTables, $show);
  $show->users()->detach($users, $show);
      return redirect()->route('shows.index');
    }
}
