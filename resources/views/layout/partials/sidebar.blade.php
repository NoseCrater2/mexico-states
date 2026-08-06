@props([
    'routes' => [
        [
            'title' => 'Dashboard',
            'name' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
            'icon' => 'dashboard'
        ],
        [
            'title' => 'Estados',
            'name' => route('states'),
            'active' => request()->is('states*'),
            'icon' => 'map'
        ],

    ]
])

<button
    class="btn btn-primary mobile-menu-button d-lg-none"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#mobileSidebar"
    aria-controls="mobileSidebar"
    aria-label="Abrir menú"
>
    <span class="material-symbols-outlined">menu</span>
</button>

<aside class="sidebar d-none d-lg-flex flex-column">
    <div class="px-3 mb-4 d-flex align-items-center gap-2">
        <span class="fs-4 fw-semibold text-primary">
            Mexa Metric
        </span>
    </div>

    <nav class="nav flex-column px-2 flex-grow-1">
        @foreach ($routes as $route)
            <a
            class="nav-link {{ $route['active'] ? 'active fw-medium' : '' }}"
            href="{{ $route['name'] }}"
            >
            <span class="material-symbols-outlined">{{$route['icon']}}</span>
           {{$route['title']}}
        </a>
        @endforeach

    </nav>
</aside>

<div
    class="offcanvas offcanvas-start mobile-sidebar"
    tabindex="-1"
    id="mobileSidebar"
    aria-labelledby="mobileSidebarLabel"
>
    <div class="offcanvas-header">
        <h5
            class="offcanvas-title text-primary fw-semibold"
            id="mobileSidebarLabel"
        >
            Mexa Metric
        </h5>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Cerrar"
        ></button>
    </div>

    <div class="offcanvas-body p-2">
        <nav class="nav flex-column">
            @foreach ($routes as $route)
            <a
                class="nav-link {{ $route['active'] ? 'active fw-medium' : '' }}"
                href="{{ $route['name'] }}"
            >
                <span class="material-symbols-outlined">{{$route['icon']}}</span>
               {{$route['title']}}
            </a>
            @endforeach

        </nav>
    </div>
</div>
