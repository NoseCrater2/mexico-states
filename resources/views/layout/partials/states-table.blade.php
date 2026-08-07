
<table class="table table-hover align-middle mb-0" id="statesTable">
    <thead class="table-light">
        <tr>
            <th class="py-3 text-uppercase small fw-bold text-muted text-start">CLAVE</th>
            <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" style="min-width: 250px;">Nombre</th>
            <th class="py-3 text-uppercase small fw-bold text-muted text-end">Población Total</th>
            <th class="py-3 text-uppercase small fw-bold text-muted text-center">DETALLES</th>
        </tr>
    </thead>
<tbody id="tableBody">

    @forelse ($states as $state)
        <tr>
            <td>
                <div class="badge bg-primary-subtle text-primary p-2 rounded text-uppercase" style="max-width: 80px; height: 32px; display: flex; align-items: center; justify-content: center;">{{$state->cve_ent}}  | {{$state->nom_abrev}}</div>
            </td>
            <td class="ps-4">
                <div class="d-flex align-items-center gap-3">
                    <span class="h5 mb-0 fw-bold">{{$state->nomgeo}}</span>

                </div>
            </td>
            <td class="text-end fw-bold">{{ format_number($state->pob_total, 0) }}</td>
            <td class="text-center">
                <a class="btn btn-light btn-sm text-muted" title="View Details" href="{{ route('states.show', ['id' => $state->cve_ent]) }}">
                    <span class="material-symbols-outlined" style="font-size: 20px;">visibility</span>
                </a>
            </td>
        </tr>
    @empty
    <tr>
        <span class="text-muted">Sin registros</span>
    </tr>
    @endforelse
</tbody>
</table>
<div class="pt-2 px-2">
    {{ $states->links() }}
</div>
