<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    //Obtener los carpetas paginados para las vistas
    public function index(Request $request)
    {
        $query = Folder::query();
        $sortBy = $request->input('column');
        $order = $request->input('order');

        if ($request->has('subFolder')) {
            $subFolder = $request->input('subFolder');
            $query->where('id_folder', $subFolder);
        }else{
            $query->whereNull('id_folder');
        }

        //Odernar la tabla
        if($sortBy) {
            $query->orderBy($sortBy, $order);
        }else{
            $query->orderBy('id', 'desc');
        }
        
        $folders = $query->get();

        return $folders;
    }

    //Obtener los carpetas paginados para las vistas
    public function index_unpaged(Request $request)
    {
        // Obtener todas las carpetas principales
        $mainFolders = Folder::whereNull('id_folder')->orderBy('name', 'asc')->get();
    
        // Recorrer las carpetas principales para obtener sus subcarpetas anidadas
        $foldersWithSubfolders = $mainFolders->map(function ($mainFolder) {
            $mainFolder->sub_folders = $this->getSubFolders($mainFolder->id);
            return $mainFolder;
        });
    
        return $foldersWithSubfolders;
    }
    
    // Función recursiva para obtener las subcarpetas anidadas
    private function getSubFolders($folderId)
    {
        // Obtener las subcarpetas para la carpeta dada
        $subFolders = Folder::where('id_folder', $folderId)->orderBy('name', 'asc')->get();
    
        // Recorrer las subcarpetas para obtener sus subcarpetas (si las tienen)
        $subFolders->transform(function ($subFolder) {
            $subFolder->sub_folders = $this->getSubFolders($subFolder->id);
            return $subFolder;
        });
    
        return $subFolders;
    }

    public function store(Request $request)
    {
        $file = [
            'name' => $request->name,
            'id_folder' => $request->id_folder,
        ];

        $result = Folder::create($file);

        return $result;
    }

    public function show($id)
    {
        $folder = Folder::findOrFail($id);
        return response()->json($folder);
    }

    public function update(Request $request, $id)
    {      
        $folder = Folder::find($id);
    
        if (!$folder) {
            return response()->json(['message' => 'Carpeta no encontrado'], 404);
        }

        $data = [
            'name' => $request->name,
            'updated_by' => $request->updated_by,
        ];

        $folder->update($data); //Actualiza el registro

        return response()->json(['message' => 'Carpetas guardada correctamente']);
    }

    public function destroy($id)
    {
        $folder = Folder::find($id);
    
        if (!$folder) {
            return response()->json(['message' => 'Carpeta no encontrada'], 404);
        }
        $folder->delete(); //Elimina el registro

        return response()->json(['message' => 'Carpeta eliminada exitosamente'], 200);
    }  
}