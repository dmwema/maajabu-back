<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\returnSelf;
use App\Http\Resources\Category as ResourcesCategory;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ResourcesCategory::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd(Auth::user()->id);
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $request->validate([
            'name' => 'required'
        ]);
        if (Category::create($request->all())) {
            return [
                "success" => true,
                "message" => "Enregistrement effectué",
                "data" => $request->category
            ];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $works = $category->works;
        return [
            'category' => $category
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $request->validate([
            'name' => 'required'
        ]);
        if ($category->update($request->all())) {
            return [
                "success" => true,
                "message" => "La modification a reussie",
                "data" => $category
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        if ($category->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé",
                "data" => $category
            ];
        }
    }
}
