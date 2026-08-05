<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller {


function index() {
    return view('dashboard');
}

function getStates(Request $request) {
     $sort = $request->get('sort', 'nomgeo');
    $direction = $request->get('direction', 'asc');

    $allowedSorts = [
        'nomgeo',
        'poblacion'
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
        return view('layout.partials.table', compact('states'))->render();
    }

    return view('states-table', compact('states'));
}

function showState(Request $request) {
    $state = [];
    return view('show-state', compact("state"));
}
}


