<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

  if (!function_exists('get_countries')) {
    /**
     * Recupera informações de uma api externa e guarda em cache para disponibilizar para os nossos clientes e a cada uma hora é atualizado o cache.
     * 
     * @return array
     */
    function get_countries() {
      $countries = [];
        if (Cache::has('countries')) {
            $countries = Cache::get('countries');
        } else {
            $response = Http::get(env('API_COUNTRIES_URL') . '/all');
    
            $countries = $response->json();

            Cache::put('countries', $countries, now()->addMinutes(60));
        }
      return $countries;
    }
  }