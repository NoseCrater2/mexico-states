<aside class="sidebar d-flex flex-column">
    <div class="px-3 mb-4 d-flex align-items-center gap-2">
        <img alt="Aztec Metric Logo" class="img-fluid" src="https://lh3.googleusercontent.com/aida/AP1WRLsfDHND0LJnyRRqy-YNvDQZ1s_c_XcrE7WdvvV5usjuKqFR98vpj4nA5eKOMiWzRSxK2NEzVjN7F-Ik-pVtm6qaRSwFiKgxniVx0_SGvc0-VvY7oDJYj8Z77HmjpEiYamy1B3Pwqs28cZdGvxqiMMlNSXyUGIcoKdYgGJNjRd66gq_uZxBa8dI0XmUnD_argZ8j8WpdDZvjpa6fJ5cnK0QiS0Av-53FGg7nqJAoGABfmngEhxd2AcDeZqkU" style="height: 32px;"/>
        <span class="fs-4 fw-semibold text-primary">Aztec Metric</span>
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
