<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cycle;

class VilleController extends Controller
{
    /**
     * Get the current Ville.
     *
     * @OA\Get(
     *     path="/api/ville/today",
     *     summary="Get the current city of the day",
     *     description="Retrieve information about the current city.",
     *     operationId="getToday",
     *     tags={"Ville"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/Ville")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ville not found"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function today()
    {
        $ville = Cycle::getCurrentVille();

        if(!$ville)
        {
            return response()->json(['error' => 'Ville not found'], 404);
        }

        return $ville;
    }
}
