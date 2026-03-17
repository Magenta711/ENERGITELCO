<?php

namespace App\Http\Controllers\energy\album;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Energy\Album\AlbumImage;
use App\Models\Energy\Album\AlbumProject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlbumProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['gallery', 'showGallery']);
        $this->middleware('verified')->except(['gallery', 'showGallery']);
        $this->middleware('permission:Ver Album', ['only' => ['index', 'images']]);
        $this->middleware('permission:Crear Album', ['only' => ['store', 'create', 'upload']]);
        $this->middleware('permission:Editar Album', ['only' => ['update', 'edit', 'upload']]);
        $this->middleware('permission:Eliminar Album', ['only' => ['destroy', 'destroy_image']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('energy.album.index', [
            'projects' => AlbumProject::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('energy.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            // 'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ]);

        $data = $request->only(['name', 'description', 'location', 'project_date', 'status']);

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/album_covers'), $imageName);
            $data['cover_image'] = 'uploads/album_covers/' . $imageName;
        }
        DB::beginTransaction();
        try {
            $project = AlbumProject::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->route('album_projects.images', ['slug' => $project->slug, 'id' => $project->id])->with('success', 'Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function images($slug, $id)
    {
        $project = AlbumProject::with('images')->findOrFail($id);
        return view('energy.album.upload', compact('project'));
    }

    public function upload(Request $request, $projectId)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,gif,webp,mp4,mov,webm|max:51200'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $slug = AlbumProject::findOrFail($projectId)->slug;

            $destinationPath = public_path('uploads/album/' . $projectId . '_' . $slug);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $mimeType = $file->getMimeType();

            $file->move($destinationPath, $imageName);

            $relativePath = 'uploads/album/' . $projectId . '_' . $slug . '/' . $imageName;
            $type = explode('/', $mimeType)[0];

            if ($type == 'image') {
                $type = 'image';
            } elseif ($type == 'video') {
                $type = 'video';
            }

            try {


                $image = AlbumImage::create([
                    'project_real_id' => $projectId,
                    'image' => $relativePath,
                    'type' => $type
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Imagen subida correctamente',
                    'path' => asset($relativePath),
                    'id' => $image->id,
                    'type' => $type,
                ]);
            } catch (\Exception $e) {
                Log::error('Error creando AlbumImage: ' . $e->getMessage(), [
                    'project_id' => $projectId,
                    'path' => $relativePath,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Error al guardar registro de la imagen',
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        return response()->json(['error' => true, 'message' => 'No se recibió ningún archivo'], 400);
    }

    public function gallery()
    {
        $projects = AlbumProject::where('status', 1)->latest()->get();
        return view('welcome.gallery.gallery', compact('projects'));
    }

    public function showGallery($slug, $id)
    {
        $project = AlbumProject::with('images')->findOrFail($id);

        return view('welcome.gallery.show', compact('project'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        return view('energy.album.edit', [
            'project' => AlbumProject::findOrFail($id)
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'project_date' => 'required|date',
            // 'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        $project = AlbumProject::findOrFail($id);
        $data = $request->only(['name', 'description', 'location', 'project_date', 'status']);

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/album_covers'), $imageName);
            $data['cover_image'] = 'uploads/album_covers/' . $imageName;
        }

        DB::beginTransaction();
        try {
            $project->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->route('album_projects.images', [$project->slug, $project->id])->with('success', 'Proyecto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = AlbumProject::findOrFail($id);

        if ($project->cover_image) {
            $coverImagePath = public_path($project->cover_image);
            if (file_exists($coverImagePath)) {
                unlink($coverImagePath);
            }
        }

        if ($project->images) {
            foreach ($project->images as $image) {
                $imagePath = public_path($image->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $project->delete();

        return redirect()->route('album_projects.index')->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function destroy_image(Request $request, $id)
    {
        $image = AlbumImage::findOrFail($id);
        $imagePath = public_path($image->image);

        if (file_exists($imagePath)) {
            // Eliminar el archivo de imagen del sistema de archivos
            unlink($imagePath);
        }
        // Elimina el registro de la imagen de la base de datos
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Imagen eliminada correctamente']);
    }
}
