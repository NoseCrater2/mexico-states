<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Services\MunicipalityService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class StateController extends Controller {


function index() {
    $data = [
        'total_population' => State::sum('pob_total'),
        'fem_population' => State::sum('pob_femenina'),
        'male_population' => State::sum('pob_masculina'),
        'age_avg' => 29.2,
        'birth_rate' => 15.4,
        'life_expectancy' => 75.4
    ];
    return view('dashboard', compact('data'));
}

function getStates(Request $request) {
    $sort = $request->get('sort', 'nomgeo');
    $direction = $request->get('direction', 'asc');

    $allowedSorts = [
        'nomgeo',
        'pob_total'
    ];

    if (!in_array($sort, $allowedSorts)) {
        $sort = 'nomgeo';
    }

    $states = State::query()
        ->when($request->search, function ($query, $search) {
            $query->where('nomgeo', 'like', "%{$search}%");
        })
        ->orderBy($sort, $direction)
        ->paginate(5)
        ->withQueryString();

    if ($request->ajax()) {
        return view('layout.partials.table', [
            'states' => $states,
        ])->render();
    }

    return view('states-table',  [
            'states' => $states,
        ]);
}

function showState(Request $request, string $id) {
   $state = State::findOrFail($id);
   $search = $request->search;
    $sort = $request->get('sort', 'nomgeo');
    $direction = $request->get('direction', 'asc');

    $allowedSorts = [
        'nomgeo',
        'pob_total',
        'total_viviendas_habitadas'
    ];

   $municipalities = app(MunicipalityService::class)($id);
   if($search){
    $municipalities = $municipalities->filter(function($mun) use ($search){
        return str_contains( strtolower($mun['nomgeo']), strtolower($search));
    });
   }
   if($direction === 'desc'){
     $municipalities = $municipalities->sortByDesc($sort);
   }else{
    $municipalities = $municipalities->sortBy($sort);
   }

   $page = $request->get('page', 1);
   $perPage = 4;

   $paginated = new LengthAwarePaginator(
                $municipalities->forPage($page, $perPage),
                $municipalities->count(),
                $perPage,
                $page,
                [
                    'path' => $request->url(),
                    'query' => $request->query()
                ]
    );

    if($request->ajax()){
          return view('layout.partials.municipalities-table', [
           'municipalities' => $paginated
        ])->render();
    }
    return view('show-state', [
        'state' => $state,
        'municipalities' => $paginated
    ]);
}
}


