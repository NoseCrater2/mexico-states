<table class="table table-hover align-middle mb-0" id="statesTable">
    <thead class="table-light">
    <tr>
    <th class="py-3 text-uppercase small fw-bold text-muted text-start">CLAVE</th>
    <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" style="min-width: 250px;">Nombre</th>
    <th class="py-3 text-uppercase small fw-bold text-muted text-end">Población Total</th>
    <!--<th class="py-3 text-uppercase small fw-bold text-muted" style="min-width: 300px;">Gender Distribution</th>-->
    <th class="py-3 text-uppercase small fw-bold text-muted text-center">DETALLES</th>
    </tr>
    </thead>
<tbody id="tableBody">

    @forelse ($states as $state)
        <tr>
            <td>
<div class="badge bg-primary-subtle text-primary p-2 rounded text-uppercase" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">{{$state->cve_ent}}</div>
            </td>
        <td class="ps-4">
        <div class="d-flex align-items-center gap-3">
        <span class="h5 mb-0 fw-bold">{{$state->nomgeo}}</span>
        <div class="badge bg-success-subtle text-success p-2 rounded text-uppercase" style="width: auto; height: 32px; display: flex; align-items: center; justify-content: center;">{{$state->nom_abrev}}</div>

        </div>
        </td>
        <td class="text-end fw-bold">{{ Number::format( $state->pob_total, 2) }}</td>
         <!--<td>
        <div class="small text-muted d-flex justify-content-between mb-1">
       <span><span class="badge rounded-circle bg-danger p-1 me-1"> </span>F (51.1%)</span>
        <span><span class="badge rounded-circle bg-primary p-1 me-1"> </span>M (48.9%)</span>
        </div>
        <div class="progress" style="height: 8px;">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 51.1%"></div>
        <div class="progress-bar bg-primary" role="progressbar" style="width: 48.9%"></div>
        </div>
        </td> -->
        <td class="text-center">
        <button class="btn btn-light btn-sm text-muted" title="View Details"><span class="material-symbols-outlined" style="font-size: 20px;">visibility</span></button>
        </td>
        </tr>
    @empty
    <tr>
        <span class="text-muted">Sin registros</span>
    </tr>
    @endforelse
</tbody>
</table>
<div class="card-footer bg-white py-3 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
<div class="small text-muted">Mostrando <span class="fw-bold text-dark">{{ $states->firstItem() }} </span> a <span class="fw-bold text-dark">{{ $states->lastItem() }}</span> de <span class="fw-bold text-dark">{{ $states->total() }}</span> registros</div>
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm mb-0">
        <li class="page-item {{$states->onFirstPage() ? 'disabled':''}}"><a class="page-link"  href="{{$states->previousPageUrl()}}" ><span class="material-symbols-outlined" style="font-size: 18px;">chevron_left</span></a></li>
        <li class="page-item {{$states->hasMorePages() ? '':'disabled'}}"><a class="page-link" href="{{$states->nextPageUrl()}}"><span class="material-symbols-outlined" style="font-size: 18px;">chevron_right</span></a></li>
        </ul>
    </nav>
</div>
