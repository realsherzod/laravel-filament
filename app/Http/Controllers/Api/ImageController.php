<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;

class ImageController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/catalogs/{catalog_id}/images",
     *     summary="Retrieve images for a specific catalog",
     *     tags={"Images"},
     *     @OA\Parameter(
     *         name="catalog_id",
     *         in="path",
     *         required=true,
     *         description="ID of the catalog to retrieve images for",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of images for the specified catalog"
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

    public function images($catalog_id)
    {

        $images = Image::where('catalog_id', $catalog_id)
            ->where('is_active', true)
            ->get();

        return response()->json([
            'images' => $images->map(function ($image) {
                return [
                    'image' => url('storage/' . $image->image ) ,
                ];
            }),
        ]);
    }
}
