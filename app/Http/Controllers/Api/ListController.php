<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\Title;

class ListController extends Controller
{

  /**
 * @OA\Get(
 *     path="/api/titles",
 *     summary="Retrieve all titles",
 *     tags={"List"},
 *     @OA\Response(
 *         response=200,
 *         description="List of all titles",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="titles",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(
 *                         property="name",
 *                         type="object",
 *                         @OA\Property(
 *                             property="uz",
 *                             type="string",
 *                             example="Title in Uzbek"
 *                         ),
 *                         @OA\Property(
 *                             property="ru",
 *                             type="string",
 *                             example="Title in Russian"
 *                         ),
 *                         @OA\Property(
 *                             property="en",
 *                             type="string",
 *                             example="Title in English"
 *                         )
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */

    public function title()
    {
        $titles = Title::all();

        return response()->json([
            'titles' => $titles->map(function ($title) {
                return [
                    'name' => [
                        'uz' => $title->name_uz,
                        'ru' => $title->name_ru,
                        'en' => $title->name_en,
                    ],
                ];
            }),
        ]);
    }


    /**
 * @OA\Get(
 *     path="/api/socials",
 *     summary="Retrieve all active socials",
 *     tags={"List"},
 *     @OA\Response(
 *         response=200,
 *         description="List of all active socials"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */
public function socials()
    {
        $socials = Social::where('is_active', true)->get();

        return response()->json([
            'socials' => $socials->map(function ($social) {
                return [
                    'name' => $social->name,
                    'image' => url('storage/'. $social->image),
                    'path' => $social->path,
                ];
            }),
        ]);
    }
}
