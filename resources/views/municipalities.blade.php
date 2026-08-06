@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center mb-4">
            <a class="btn btn-light rounded-circle me-3 d-flex align-items-center justify-content-center p-2" href="/states" style="width: 40px; height: 40px;">
                <span class="material-symbols-outlined fs-5">arrow_back</span>
            </a>
            <div>
                <h1 class="h3 mb-1 fw-bold">Municipios de {{ $state->nomgeo }} </h1>
                <p class="text-secondary mb-0 text-sm"> {{ $municipalities->total() }} Municipios Totales</p>
            </div>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <x-card title="población total">
                    <x-slot:content>
                        <h2 class="display-5 fw-bold mb-0">{{ abbreviate_number($state->pob_total) }}</h2>
                    </x-slot:content>
                </x-card>
            </div>
            <div class="col-lg-6">
                <x-card title="Distribución por Género">
                    <x-slot:content>
                        <div class="d-flex justify-content-between mb-2 text-sm">
                            <span class="fw-medium">Femenino ({{ format_percent($state->pob_femenina, $state->pob_total) }})</span>
                            <span class="fw-medium">Masculino ({{ format_percent($state->pob_masculina, $state->pob_total) }})</span>
                        </div>
                        <div class="progress mb-3" style="height: 12px; border-radius: 6px;">
                            <div aria-valuemax="100" aria-valuemin="0"  class="progress-bar bg-danger" role="progressbar" style="width: {{format_percent($state->pob_femenina, $state->pob_total)}}"></div>
                            <div aria-valuemax="100" aria-valuemin="0"  class="progress-bar bg-primary" role="progressbar" style="width: {{format_percent($state->pob_masculina, $state->pob_total)}}"></div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="d-flex align-items-center gap-1">
                                <div style="width: 8px; height: 8px; border-radius: 50%" class="bg-danger"></div>
                                <span class="text-muted text-xs">Mujeres</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <div style="width: 8px; height: 8px; border-radius: 50%;" class="bg-primary"></div>
                                <span class="text-muted text-xs">Hombres</span>
                            </div>
                        </div>
                    </x-slot:content>
                </x-card>
            </div>
        </div>
        <div class="card mb-4 bg-white">
            <div class="card-body p-3 d-flex flex-column flex-md-row gap-3 align-items-center justify-content-between">
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white border-end-0"><span class="material-symbols-outlined text-muted">search</span></span>
                    <input class="form-control bg-light border-1 ps-2" id="munSearch" placeholder="Buscar por nombre" type="text"/>
                </div>
                <div class="d-flex gap-2 w-100 w-md-auto">
                    <select class="form-select bg-light border-1" id="select-filter" >
                        <option value="nomgeo,asc">Nombre A-Z</option>
                        <option value="nomgeo,desc">Nombre Z-A</option>
                        <option value="pob_total,asc">Población (Asc)</option>
                        <option value="pob_total,desc">Población (Desc)</option>
                        <option value="total_viviendas_habitadas,asc">Viviendas (Asc)</option>
                        <option value="total_viviendas_habitadas,desc">Viviendas (Desc)</option>
                    </select>
                </div>
            </div>
        </div >
        <div id="munresults" class="bg-white card p-4">
            @include('layout.partials.municipalities-table')
        </div>

    </div>
@endsection
<script>
    window.municipalitiesConfig = {
        cve_ent: @js($state->cve_ent),
        sort:  @js(request('sort')) || 'nomgeo',
        direction:  @js(request('direction')) || 'asc',
        page: @js(request('page')) || 1,
    }
</script>
@vite('resources/js/municipalities.js')
