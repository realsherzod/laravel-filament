<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   /**
 * @OA\Post(
 *     path="/api/comments",
 *     summary="Create a new comment",
 *     tags={"Comments"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="comment",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="rate",
 *                     type="integer",
 *                     format="int32",
 *                     example=3,
 *                     minimum=1,
 *                     maximum=5
 *                 ),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Comment created successfully"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */


    public function storeComment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'comment' => 'required|string',
            'rate' => 'required|integer|min:1|max:5',
        ]);

        $comment = Comment::create($validated);

        return response()->json([
            'message' => 'Comment created successfully',
            'comment' => $comment
        ], 201);
    }

/**
 * @OA\Get(
 *     path="/api/get-comments",
 *     summary="Retrieve all active comments",
 *     tags={"Comments"},
 *     @OA\Response(
 *         response=200,
 *         description="List of all active comments",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="comments",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(
 *                         property="name",
 *                         type="string"
 *                     ),
 *                     @OA\Property(
 *                         property="comment",
 *                         type="string"
 *                     ),
 *                     @OA\Property(
 *                         property="rate",
 *                         type="integer",
 *                         format="int32",
 *                         example=3
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

    public function getComments()
    {
        $comments = Comment::where('is_active', true)->get();

        return response()->json([
            'comments' => $comments->map(function ($comment) {
                return [
                    'name' => $comment->name,
                    'comment' => $comment->comment,
                    'rate' => $comment->rate,
                ];
            }),
        ]);
    }
}
