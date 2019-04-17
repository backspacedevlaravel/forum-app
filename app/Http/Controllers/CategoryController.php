<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $bsd_slug = Str::slug($request->name);
        $bsd_next = 2;
        while(Category::whereSlug($bsd_slug)->first()) {
            $bsd_slug = Str::slug($request->name) . '-' . $bsd_next;
            $bsd_next++;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $bsd_slug;
        $category->save();

        return response()->json([
            'status' => Response::HTTP_CREATED,
            'created' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $bsd_slug = Str::slug($request->name);
        $bsd_next = 2;
        while(Category::whereSlug($bsd_slug)->first()) {
            if($category->name == $request->name) {
                break;
            }
            $bsd_slug = Str::slug($request->name) . '-' . $bsd_next;
            $bsd_next++;
        }

        $category->name = $request->name;
        $category->slug = $bsd_slug;
        $category->save();

        return response()->json([
            'status' => Response::HTTP_OK,
            'updated' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
            'deleted' => true,
        ]);
    }
}
