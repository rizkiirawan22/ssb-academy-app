<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $model = Article::all();
            return Datatables()
                ->of($model)
                ->addIndexColumn()
                ->addColumn('image', function ($model) {
                    return '<img class="img-circle" src="' . asset('storage/' . $model->image) . '" width="40" height="40" alt="Gambar Artikel">';
                })
                ->addColumn('date', function ($model) {
                    return Carbon::parse($model->date)->translatedFormat('l, d F Y');
                })
                ->addColumn('content', function ($model) {
                    return $model->content;
                })
                ->addColumn('action', function ($model) {
                    $btn = '<a href="' . route('admin.artikel.edit', $model->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<button type="button" id="delete" class="btn btn-danger btn-sm" value="' . $model->id . '"><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['image', 'content', 'action'])
                ->make(true);
        }
        return view('pages.admin.article.index');
    }

    public function create()
    {
        return view('pages.admin.article.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|file|mimes:jpg,jpeg,png|max:5120',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['image'] = $request->file('image')->store('articles');
        $validatedData['date'] = Carbon::now()->translatedFormat('Y-m-d');
        $validatedData['author'] = auth()->user()->id;
        $store = Article::create($validatedData);
        if ($store) {
            return redirect()->route('admin.artikel.index')->with('status', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('admin.artikel.index');
        }
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('pages.admin.article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|file|mimes:jpg,jpeg,png|max:5120',
        ];
        $validatedData = $request->validate($rules);
        $article = Article::find($id);
        if ($request->file('image')) {
            if ($request->imageOld) {
                Storage::delete($request->imageOld);
            }
            $validatedData['image'] = $request->file('image')->store('articles');
        }
        $update = $article->update($validatedData);
        if ($update) {
            return redirect()->route('admin.artikel.index')->with('status', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('admin.artikel.index');
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article->image) {
            Storage::delete($article->image);
        }
        $article->delete();
        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }
}
