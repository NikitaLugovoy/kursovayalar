<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class Files extends Controller
{
    public function index()
{
    $files = File::where('user_id', auth()->id())->get();
    return view('files.index', compact('files'));
}

public function show(File $file)
{
    return view('files.show', compact('file'));
}

    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|file|max:2048'
    ]);

    $path = $request->file('file')->store('uploads', 'public');

    File::create([
        'name' => $request->file('file')->getClientOriginalName(),
        'path' => $path,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('files.index')->with('success', 'Файл успешно загружен!');
}



    public function download(File $file)
    {
        $filePath = storage_path("app/public/{$file->path}");

        if (!file_exists($filePath)) {
            return redirect()->route('files.index')->with('error', 'Файл не найден.');
        }

        return response()->download($filePath, $file->name);
    }

    public function destroy(File $file)
    {
        Storage::disk('public')->delete($file->path);
        $file->delete();

        return redirect()->route('files.index')->with('success', 'Файл успешно удалён!');
    }

    public function edit(File $file)
    {
        return view('files.edit', compact('file'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'file' => 'required|file|max:2048'
        ]);

        Storage::disk('public')->delete($file->path);

        $path = $request->file('file')->store('uploads', 'public');

        $file->update([
            'name' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
        ]);

        return redirect()->route('files.index')->with('success', 'Файл успешно обновлён!');
    }
}
