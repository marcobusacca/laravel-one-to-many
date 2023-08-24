<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $message = $request->query->get('message');

        $projects = Project::all();

        return view('admin.projects.index', compact('projects', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        $message = $request->query->get('message');

        return view('admin.projects.show', compact('project', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();

        if($request->hasFile('cover_image')){
            
            $img_path = Storage::put('projects_images', $request->cover_image);
            
            $form_data['cover_image'] = $img_path;
        }

        $project = new Project();

        $project->fill($form_data);

        $project->save();

        $message = 'Creazione Progetto Completata';

        return redirect()->route('admin.projects.show', compact('project', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if($request->hasFile('cover_image')){

            if($project->cover_image){

                Storage::delete($project->cover_image);
            }
            
            $img_path = Storage::put('projects_images', $request->cover_image);
            
            $form_data['cover_image'] = $img_path;
        }

        $project->update($form_data);

        $message = 'Modifica Progetto Completata';

        return redirect()->route('admin.projects.show', compact('project', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->cover_image){

            Storage::delete($project->cover_image);
        }

        $project->delete();

        $message = 'Cancellazione Progetto Completata';

        return redirect()->route('admin.projects.index', compact('message'));
    }

    public function deleteCoverImage(Project $project)
    {
        if($project->cover_image){

            Storage::delete($project->cover_image);

            $project->cover_image = NULL;

            $project->update();
        }
        
        return redirect()->route('admin.projects.edit', compact('project'));
    }
}