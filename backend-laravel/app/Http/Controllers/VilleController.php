<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cycle;
use App\Models\Ville;
use App\Utility\CityComparator;

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

    /**
     * Make a guess
     *
     * @OA\Get(
     *     path="/api/ville/guess/{id}",
     *     summary="Get a guess for a city based on the provided ID.",
     *     description="Retrieve information about the guessed city.",
     *     operationId="getGuess",
     *     tags={"Ville"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="The ID of the guessed city.",
     *         @OA\Schema(type="integer")
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Successful response",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="ville", ref="#/components/schemas/Ville"),
     *              @OA\Property(property="canton_diff", type="boolean", description="Whether the guessed city's canton matches the current city's canton"),
     *              @OA\Property(property="pop_diff", type="integer", description="Population comparison result"),
     *              @OA\Property(property="lang_diff", type="string", description="Language comparison result"),
     *              @OA\Property(property="position_diff", type="string", description="Position comparison result"),
     *          )
     *     ),
     *
     *     @OA\Response(
     *         response=404,
     *         description="Ville not found"
     *     )
     * )
     *
     *  @return App\Utility\CityComparator::compareToToday
     */
    public function guess($id)
    {
        // TODO: clean id
        $a = new CityComparator();
        return $a->compareToToday($id);
    }

    /**
     * Get all Villes.
     *
     * @OA\Get(
     *     path="/api/villes",
     *     summary="Get all cities",
     *     description="Retrieve information about all cities.",
     *     operationId="getAll",
     *     tags={"Ville"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Ville")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=404,
     *         description="Ville not found"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $villes = Ville::all();

        if(!$villes)
        {
            return response()->json(['error' => 'Villes not found'], 404);
        }

        return response()->json($villes);
    }
}
