@extends('layout.app')
@section('content')
<div class="container-fluid p-4 p-lg-5 pb-5">
<!-- Header -->
<div class="d-flex align-items-center mb-4">
<a class="btn btn-light rounded-circle me-3 d-flex align-items-center justify-content-center p-2" href="/states" style="width: 40px; height: 40px;">
<span class="material-symbols-outlined fs-5">arrow_back</span>
</a>
<div>
<h1 class="h3 mb-1 fw-bold">Municipios de {{ $state->nomgeo }} </h1>
<p class="text-secondary mb-0 text-sm"> {{ $municipalities->total() }} Municipios Totales</p>
</div>
</div>
<!-- Summary Cards -->
<div class="row g-4 mb-4">
<!-- Population -->
<div class="col-lg-6">
<div class="card h-100">
<div class="card-body p-4">
<h6 class="text-muted text-uppercase fw-bold text-xs mb-2" style="letter-spacing: 0.05em;">Total Población</h6>
<h2 class="display-5 fw-bold mb-0">{{ abbreviate_number($state->pob_total) }}</h2>
</div>
</div>
</div>
<!-- Gender -->
<div class="col-lg-6">
<div class="card h-100">
<div class="card-body p-4">
<h6 class="text-muted text-uppercase fw-bold text-xs mb-3" style="letter-spacing: 0.05em;">Distribución por Género</h6>
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
</div>
</div>
</div>
</div>
<!-- Filters Bar -->
<div class="card mb-4 bg-white">
<div class="card-body p-3 d-flex flex-column flex-md-row gap-3 align-items-center justify-content-between">
<div class="position-relative w-100" style="max-width: 400px;">
<span class="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">search</span>
<input class="form-control bg-light border-0 ps-5" id="munSearch" placeholder="Buscar por nombre" type="text"/>
</div>
<div class="d-flex gap-2 w-100 w-md-auto">
<select class="form-select bg-light border-0" id="select-filter">
<option value="nom_geo,asc">Nombre A-Z</option>
<option value="nom_geo,desc">Nombre Z-A</option>
<option value="pob_total,asc">Población (Asc)</option>
<option value="pob_total,desc">Población (Desc)</option>
<option value="total_viviendas_habitadas,asc">Viviendas (Asc)</option>
<option value="total_viviendas_habitadas,desc">Viviendas (Desc)</option>
</select>
</div>
</div>
</div >
<div id="munresults">
     @include('layout.partials.municipalities-table')
</div>

</div>
@endsection
@push('scripts')
    <script>
        const cve_ent = @js($state->cve_ent);
        let search = '';
        let debounce;
        let sort = 'name';
        let direction = 'asc';

        async function loadMun() {
            const params = new URLSearchParams({
                search,
                sort,
                direction
            });

            const response = await fetch(`/states/${cve_ent}?${params}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            document.getElementById('munresults').innerHTML =
                await response.text();
        }

        document.getElementById('munSearch')
            .addEventListener('input', function () {
                search = this.value;
                clearTimeout(debounce);

                debounce = setTimeout(() => {
                    loadMun();
                }, 300);

        });

        document.getElementById('select-filter').addEventListener('change', function(e){
            const value = e.target.value;
            [sort, direction] = value.split(',');
            loadMun();
        })
    </script>
@endpush
