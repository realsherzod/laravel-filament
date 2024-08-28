<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
 /**
 * @OA\Post(
 *     path="/api/phones",
 *     summary="Store a new phone number",
 *     tags={"Phones"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="phone",
 *                     type="string",
 *                     example="1234567890"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Phone number stored successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="phone", type="string",
 *                 @OA\Property(property="id", type="integer"),
 *                 @OA\Property(property="phone", type="string")
 *             )
 *         )
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


 public function storePhone(Request $request)
 {
     $validated = $request->validate([
         'phone' => 'required|string|min:10|max:15'
     ]);
 
     $phone = Phone::create($validated);
 
     return response()->json([
         'message' => 'Phone number stored successfully',
         'phone' => $phone
     ], 201);
 }
 
}
