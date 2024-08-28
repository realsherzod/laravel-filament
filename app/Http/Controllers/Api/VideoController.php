<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/catalogs/{catalog_id}/videos",
     *     summary="Retrieve videos for a specific catalog",
     *     tags={"Videos"},
     *     @OA\Parameter(
     *         name="catalog_id",
     *         in="path",
     *         required=true,
     *         description="ID of the catalog to retrieve videos for",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of videos for the specified catalog"
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
    public function videos($catalog_id): JsonResponse
    {
        $videos = Video::where('catalog_id', $catalog_id)
            ->where('is_active', true)
            ->get();

        return response()->json([
            'videos' => $videos->map(function ($video) {
                return [
                    'video' => url('storage/' . $video->video),
                ];
            }),
        ]);
    }
}
