@extends('layout.app')
@section('content')
    <div class="flex flex-col w-full">
        <div class="container-fluid py-4">
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <h1 class="display-5 fw-bold text-dark">Entidades Federativas de México</h1>
                    <p class="lead text-muted mb-0">Datos demográficos, distribuciones de población en las {{ $states->total() }} entidades federativas de México.</p>
                </div>
            <div class="col-lg-12 d-flex flex-column flex-sm-row gap-3 justify-content-lg-end mt-4 mt-lg-0">
                <x-card title="total de entidades">
                    <x-slot:content>
                        <div class="d-flex align-items-baseline gap-1">
                            <span class="h2 mb-0 text-primary display-5 fw-bold">{{ $states->total() }}</span>
                            <span class="text-muted small">Estados</span>
                        </div>
                    </x-slot:content>
                </x-card>

                <x-card title="población total">
                    <x-slot:content>
                        <div class="d-flex align-items-baseline gap-1">
                            <span class="h2 mb-0 text-danger display-5 fw-bold">126.0</span>
                            <span class="text-muted small">Millones</span>
                        </div>
                    </x-slot:content>
                </x-card>
            </div>
            </div>
        </div>
        <div class="container-fluid py-3">
            <div class="card my-3 p-3 bg-white">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><span class="material-symbols-outlined text-muted">search</span></span>
                            <input class="form-control border-start-0 ps-2" id="stateSearch" placeholder="Buscar..." type="text"/>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex gap-2 justify-content-md-end overflow-auto pb-2 pb-md-0">
                        <button class="btn d-flex align-items-center gap-1 whitespace-nowrap sort btn-outline-primary" data-sort="nomgeo">
                                <span class="material-symbols-outlined" style="font-size: 18px;">
                                {{request('direction') == 'desc' ? 'keyboard_arrow_up': 'keyboard_arrow_down' }}
                                </span> Estados
                        </button>
                        <button class="btn d-flex align-items-center gap-1 whitespace-nowrap sort btn-outline-primary" data-sort="pob_total">
                                <span class="material-symbols-outlined" style="font-size: 18px;">
                                keyboard_arrow_down
                                </span> Población
                        </button>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm bg-white overflow-hidden">
                <div class="table-responsive" id="results">
                    @include('layout.partials.states-table')
                </div>
            </div>
        </div>
@endsection

<script>
    window.statesConfig = {
        sort:  @js(request('sort')) || 'nomgeo',
        direction: @js(request('direction')) || 'asc',
        page: @js(request('page')) || 1,
    }
</script>
@vite('resources/js/states.js')
