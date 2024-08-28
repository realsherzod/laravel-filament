<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Catalog;

class CatalogController extends Controller
{

/**
 * @OA\Get(
 *     path="/api/categories",
 *     summary="Retrieve all catalogs with images and names",
 *     tags={"Categories"},
 *     @OA\Response(
 *         response=200,
 *         description="List of all catalogs with images and names"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */
    public function categories()
    {
        $catalogs = Catalog::where('is_active', true)->get();

        return response()->json([
            'catalogs' => $catalogs->map(function ($catalog) {
                return [
                    'name' => [
                        'uz' => $catalog->name_uz,
                        'ru' => $catalog->name_ru,
                        'en' => $catalog->name_en,
                    ],
                    'image' => url('storage/'. $catalog->image ) ,
                ];
            }),
        ]);
    }


/**
 * @OA\Get(
 *     path="/api/categories-detail/{id}",
 *     summary="Retrieve details of a specific catalog by ID",
 *     tags={"Categories"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the catalog to retrieve details for",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Details of the specified catalog"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Catalog not found"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */

 public function categoriesDetail($id)
 {
     $catalog = Catalog::where('id', $id)
         ->where('is_active', true)
         ->first();
 
     if (!$catalog) {
         return response()->json(['error' => 'Catalog not found'], 404);
     }
 
     return response()->json([
         'catalog' => [
             'id' => $catalog->id,
             'title' => [
                 'uz' => $catalog->title_uz,
                 'ru' => $catalog->title_ru,
                 'en' => $catalog->title_en,
             ],
             'description' => [
                 'uz' => $catalog->description_uz,
                 'ru' => $catalog->description_ru,
                 'en' => $catalog->description_en,
             ],
             'second_image' => url('storage/' . $catalog->second_image),
         ],
     ]);
 }
 
}
