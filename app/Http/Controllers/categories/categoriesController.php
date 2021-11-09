<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\ApiController;
use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return $this->showALl($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'description'=>'required',
        ];

        $this->validate($request, $rules);
        $newCategory = Categories::create($request->all());

        return $this->showOne($newCategory , 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        $categories = Categories::findorfail($id);
        return $this->showOne($categories);
    }

    
    public function update(Request $request, categories $categories)
    {
        $categories->fill($request->only([
            'name',
            'description', 
        ]));

        if ($categories->isClean()) {
            return $this->errorResponse('You Need To Specify Any Different Values to Update' , 422);
        }
        $categories->save();

        return $this->showOne($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        $categories->delete();

        return $this->showOne($categories);
    }
}
