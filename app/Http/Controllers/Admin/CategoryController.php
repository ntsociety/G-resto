<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catego = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.category.index', compact('catego'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $category = new Category;
        $data = $request->validated();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            // $ext = $file->getClientOriginalExtension();
            $imageName=time().'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/category/',$imageName);
            $category->image = $imageName;
        }
        $category->name = $data['name'];
        $category->slug = Str::slug($category->name);
        $category->description = $data['description'];
        $category->special = $request->input('special') == True ? '1':'0';
        $category->save();

        return redirect()->route('category.index')->with('message', 'Catégorie crée avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validated();
        if($request->hasFile('image'))
        {

            $path = 'assets/category/'.$category->image;
            unlink($path);
            // Storage::delete($path);
            // if(File_exists($path))
            // {
            //     Storage::delete($path);
            // }
            $file = $request->file('image');
            // $ext = $file->getClientOriginalExtension();
            $imageName=time().'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/category/',$imageName);
            $category->image = $imageName;
        }
        $category->name = $data['name'];
        $category->slug = Str::slug($category->name);
        $category->description = $data['description'];
        $category->special = $request->input('special') == True ? '1':'0';
        $category->update();
        return redirect()->route('category.index')
                        ->with('message','Catégorie modifiée avec succès!');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->image)
        {
            $path = 'assets/category/'.$category->image;
            Storage::delete($path);
            $category->delete();
            return redirect()->route('category.index')
                        ->with('message','Catégorie supprimée avec succès!');
        }


    }
}
