 <div class="row g-4">
        @forelse ($municipalities as $municipality)
            <div class="col-sm-6 col-lg-4 col-xl-3 municipality-card">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body p-4 flex-grow-1">
                    <h5 class="card-title fw-semibold mb-2">{{$municipality['nomgeo']}}</h5>
                    <div class="d-flex justify-content-between text-sm mb-1">
                        <span class="text-secondary">Población</span>
                        <span class="fw-medium">{{format_number($municipality['pob_total']??0, 0)}}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-sm">
                        <span class="fw-medium">F ({{format_percent($municipality['pob_femenina']??0, $municipality['pob_total']??0)}})</span>
                        <span class="fw-medium">M ({{format_percent($municipality['pob_masculina']??0, $municipality['pob_total']??0)}})</span>
                    </div>
                    <div class="progress mb-3" style="height: 12px; border-radius: 6px;">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="51.2" class="progress-bar bg-danger" role="progressbar" style="width: {{format_percent($municipality['pob_femenina']??0, $municipality['pob_total']??0)}}"></div>
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="48.8" class="progress-bar bg-primary" role="progressbar" style="width: {{format_percent($municipality['pob_masculina']??0, $municipality['pob_total']??0)}}"></div>
                    </div>
                    <div class="d-flex justify-content-between text-sm">
                        <span class="text-secondary">Casas habitadas</span>
                        <span class="fw-medium">{{format_number($municipality['total_viviendas_habitadas']??0, 0)}}</span>
                    </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-sm-6 col-lg-4 col-xl-3 municipality-card">
                <div class="card h-100 d-flex flex-column">
                    Sin registros
                </div>
            </div>
        @endforelse
        {{ $municipalities->links() }}
</div>

