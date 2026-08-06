<aside class="sidebar d-flex flex-column">
    <div class="px-3 mb-4 d-flex align-items-center gap-2">
        <span class="fs-4 fw-semibold text-primary">Mexa Metric</span>
    </div>
    <nav class="nav flex-column px-2 flex-grow-1">
        <a aria-current="page" class="nav-link {{ request()->routeIs('dashboard')?'active fw-medium':'' }} " href="/">
            <span class="material-symbols-outlined">dashboard</span> Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('states')?'active fw-medium':'' }}" href="/states">
            <span class="material-symbols-outlined">map</span> Estados
        </a>
    </nav>
</aside>
