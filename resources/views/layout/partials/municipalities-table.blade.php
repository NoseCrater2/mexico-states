 <div class="row g-4">
        @forelse ($municipalities as $municipality)
            <div class="col-sm-6 col-lg-4 col-xl-3 municipality-card">
                <x-municipality-item :municipality="$municipality" />
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

