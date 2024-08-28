<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clip;
use Illuminate\Http\Request;

class ClipController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clips/most-recent",
     *     summary="Retrieve the most recent clip",
     *     tags={"Clips"},
     *     @OA\Response(
     *         response=200,
     *         description="The most recent clip",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="url", type="string"),
     *             @OA\Property(property="active", type="boolean")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Clip not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function getMostRecentClip()
    {
        $clip = Clip::where('is_active', true)
                    ->orderBy('created_at', 'desc')
                    ->first();
    
        if ($clip) {
            return response()->json([
                'video' => url('storage/' . $clip->video),
            ]);
        }
    
        return response()->json([
            'message' => 'No active clips found',
        ], 404);
    }
    
}
