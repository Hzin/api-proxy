<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Taniko\Dijkstra\Graph;

class RouteController extends Controller
{
    /**
     * Retorna a melhor rota saindo de um país A para um país B.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(\Illuminate\Http\Request $request)
    {
        $countries = get_countries();
        $mappedCountries = [];

        $origem = $request->input('origem');
        $destino = $request->input('destino');

        $graph = Graph::create();

        foreach ($countries as $country) {
            if (empty($country['borders'])) {
                continue;
            }

            foreach ($country['borders'] as $key => $border) {
                if (empty($border) || empty($country['fifa']) || in_array($country['fifa'], $mappedCountries)) {
                    continue;
                }

                $graph->add($country['fifa'], $border, 1);

                array_push($mappedCountries, $country['fifa']);
            }
        }

        $route = $graph->search($origem, $destino);

        return response()->json($route);
    }
}
