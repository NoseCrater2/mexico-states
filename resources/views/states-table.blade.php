@extends('layout.app')
@section('content')
    <div class="flex flex-col w-full">
<!-- Header Section: Typographic Focus & Stats -->
<div class="container-fluid py-5 bg-white border-bottom">
<div class="row align-items-end">
<div class="col-lg-7">
<h1 class="display-5 fw-bold text-dark">Entidades Federativas de México</h1>
<p class="lead text-muted mb-0">Datos demográficos, capitales administrativas y distribuciones de población en las {{ $states->total() }} entidades federativas de México.</p>
</div>
<div class="col-lg-5 d-flex flex-column flex-sm-row gap-3 justify-content-lg-end mt-4 mt-lg-0">
<div class="card border-0 shadow-sm bg-light flex-fill">
<div class="card-body p-3">
<div class="text-uppercase text-muted small fw-bold mb-1">Total de Entidades</div>
<div class="d-flex align-items-baseline gap-1">
<span class="h2 mb-0 text-primary fw-bold">{{ $states->total() }}</span>
<span class="text-muted small">Estados</span>
</div>
</div>
</div>
<div class="card border-0 shadow-sm bg-light flex-fill">
<div class="card-body p-3">
<div class="text-uppercase text-muted small fw-bold mb-1">Población total </div>
<div class="d-flex align-items-baseline gap-1">
<span class="h2 mb-0 text-danger fw-bold">126.0</span>
<span class="text-muted small">Millones</span>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Controls Section -->
<div class="container-fluid py-3 bg-light border-bottom sticky-top" style="top: 64px; z-index: 1020;">
<div class="row g-3 align-items-center">
<div class="col-md-4">
<div class="input-group shadow-sm">
<span class="input-group-text bg-white border-end-0"><span class="material-symbols-outlined text-muted">search</span></span>

<input class="form-control border-start-0 ps-0" id="stateSearch" placeholder="Buscar..." type="text"/>


</div>
</div>
<div class="col-md-8 d-flex gap-2 justify-content-md-end overflow-auto pb-2 pb-md-0">
<button class="btn btn-primary d-flex align-items-center gap-1 whitespace-nowrap">
<span class="material-symbols-outlined" style="font-size: 18px;">filter_list</span> Estados
      </button>
<div class="dropdown">
<button class="btn btn-white bg-white border shadow-sm dropdown-toggle d-flex align-items-center gap-1" type="button">
          Población
        </button>
</div>
</div>
</div>
</div>
<!-- Data Table Section -->
<div class="container-fluid py-4">
<div class="card shadow-sm border-0 overflow-hidden">
<div class="table-responsive" id="results">
    @include('layout.partials.table')
</div>
</div>
</div>
<script>
let search = '';
let sort = 'nombre';
let direction = 'asc';
let debounce;

async function loadUsers() {
    const params = new URLSearchParams({
        search,
        sort,
        direction
    });

    const response = await fetch(`/states?${params}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    document.getElementById('results').innerHTML =
        await response.text();
}


// Buscar mientras escribe
document.getElementById('stateSearch')
    .addEventListener('input', function () {
        search = this.value;
        clearTimeout(debounce);

        debounce = setTimeout(() => {
             loadUsers();
        }, 300);

    });


// Ordenar columnas
document.querySelectorAll('.sort')
    .forEach(button => {
        button.addEventListener('click', function () {
            const newSort = this.dataset.sort;

            if (sort === newSort) {
                direction = direction === 'asc' ? 'desc' : 'asc';
            } else {
                sort = newSort;
                direction = 'asc';
            }

            loadUsers();
        });
    });
</script>
@endsection
