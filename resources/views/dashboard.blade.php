@extends('layout.app')
@section('content')
            <div class="container-fluid px-4 py-4">
                <!-- Header Section -->
                <div class="row mb-4 align-items-end">
                    <div class="col-md-8 position-relative">
                        <div class="d-none d-md-block position-absolute bg-primary rounded-pill" style="width: 4px; left: -1.5rem; top: 0.5rem; bottom: 0.5rem;"></div>
                        <h1 class="display-5 fw-bold text-dark mb-2">Demografía <br/><span class="text-muted">México 2024</span></h1>
                        <p class="lead text-muted mb-0">Análisis integral de indicadores poblacionales, crecimiento histórico y distribución demográfica a nivel nacional.</p>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <div class="d-inline-flex align-items-center gap-2 bg-light px-3 py-2 rounded-pill shadow-sm border">
                            <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">update</span>
                            <span class="fw-semibold text-dark small mb-0">Actualizado: Q1 2024</span>
                        </div>
                    </div>
                </div>
                <!-- KPI Cards -->
                <div class="row g-4 mb-4">
                    <!-- Población Total -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card bg-primary text-white h-100 shadow-sm border-0 card-kpi">
                            <div class="card-body d-flex flex-column justify-content-between position-relative overflow-hidden">
                                <div class="position-absolute bg-white opacity-10 rounded-circle" style="width: 150px; height: 150px; top: -50px; right: -50px; filter: blur(20px);"></div>
                                <div class="d-flex justify-content-between align-items-start position-relative z-1">
                                    <span class="text-uppercase small fw-bold tracking-wider">Población Total</span>
                                    <span class="material-symbols-outlined">groups</span>
                                </div>
                                <div class="position-relative z-1 mt-3">
                                    <h2 class="display-5 fw-bold mb-1 counter-animate" data-target="126.0">0.0</h2>
                                    <p class="small mb-0 opacity-75">Millones de habitantes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Edad Mediana -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card h-100 shadow-sm border-0 card-kpi">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="text-muted text-uppercase small fw-bold">Edad Mediana</span>
                                    <span class="material-symbols-outlined text-tertiary">cake</span>
                                </div>
                                <div class="mt-3">
                                    <h2 class="display-5 fw-bold text-tertiary mb-1 counter-animate" data-target="29.2">0.0</h2>
                                    <p class="small text-muted mb-0">Años</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Tasa de Natalidad -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card h-100 shadow-sm border-0 card-kpi">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="text-muted text-uppercase small fw-bold">Tasa de Natalidad</span>
                                    <span class="material-symbols-outlined text-primary">child_care</span>
                                </div>
                                <div class="mt-3">
                                    <h2 class="display-5 fw-bold text-primary mb-1"><span class="counter-animate" data-target="15.4">0.0</span><span class="fs-4 ms-1 opacity-75">%</span></h2>
                                    <p class="small text-muted mb-0">Nacimientos por 1,000 hab.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Esperanza de Vida -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card bg-tertiary-container h-100 shadow-sm border-0 card-kpi">
                            <div class="card-body d-flex flex-column justify-content-between position-relative overflow-hidden">
                                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, transparent, rgba(255,255,255,0.1));"></div>
                                <div class="d-flex justify-content-between align-items-start position-relative z-1">
                                    <span class="text-uppercase small fw-bold tracking-wider">Esperanza de Vida</span>
                                    <span class="material-symbols-outlined">favorite</span>
                                </div>
                                <div class="position-relative z-1 mt-3">
                                    <h2 class="display-5 fw-bold mb-1 counter-animate" data-target="75.4">0.0</h2>
                                    <p class="small mb-0 opacity-75">Años promedio</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Main Visuals -->
            <div class="row g-4">
            <!-- Growth Chart -->
                <div class="col-lg-8">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h3 class="h4 mb-1">Crecimiento Histórico</h3>
                                    <p class="text-muted small mb-0">Población 1970 - 2024</p>
                                </div>
                                <span class="badge bg-primary rounded px-2 py-1">+145% desde 1970</span>
                            </div>
                            <div class="chart-area flex-grow-1">
                                <svg class="w-100 h-100 position-absolute" preserveaspectratio="none" style="top:0; left:0;" viewbox="0 0 800 300">
                                    <defs>
                                    <lineargradient id="areaGradient" x1="0" x2="0" y1="0" y2="1">
                                        <stop class="text-primary" offset="0%" stop-color="#0d6efd" stop-opacity="0.2"></stop>
                                        <stop class="text-primary" offset="100%" stop-color="#0d6efd" stop-opacity="0"></stop>
                                    </lineargradient>
                                    </defs>
                                    <line stroke="#dee2e6" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="800" y1="50" y2="50"></line>
                                    <line stroke="#dee2e6" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="800" y1="150" y2="150"></line>
                                    <line stroke="#dee2e6" stroke-width="1" x1="0" x2="800" y1="250" y2="250"></line>
                                    <path d="M0,250 L0,220 C100,180 200,150 300,120 C400,90 500,70 600,50 C700,30 800,20 800,20 L800,250 Z" fill="url(#areaGradient)"></path>
                                    <path d="M0,220 C100,180 200,150 300,120 C400,90 500,70 600,50 C700,30 800,20 800,20" fill="none" stroke="#0d6efd" stroke-linecap="round" stroke-width="3"></path>
                                    <circle cx="0" cy="220" fill="#0d6efd" r="4"></circle>
                                    <circle cx="400" cy="90" fill="#0d6efd" r="4"></circle>
                                    <circle cx="800" cy="20" fill="#0d6efd" r="6" stroke="#fff" stroke-width="2"></circle>
                                </svg>
                                <div class="d-flex justify-content-between position-absolute w-100 text-muted small" style="bottom: -1.5rem;">
                                    <span>1970</span>
                                    <span>1990</span>
                                    <span>2010</span>
                                    <span>2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gender & Map -->
                <div class="col-lg-4 d-flex flex-column gap-4">
                    <!-- Gender Donut -->
                    <div class="card shadow-sm border-0 flex-grow-1">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center position-relative">
                            <h3 class="h5 position-absolute top-0 start-0 m-3">Distribución<br/>por Género</h3>
                            <div class="position-relative mt-5" style="width: 180px; height: 180px;">
                                <svg class="w-100 h-100" style="transform: rotate(-90deg);" viewbox="-1 -1 40 40">
                                    <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#e9ecef" stroke-width="6"></path>
                                    <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#0d6efd" stroke-dasharray="51.2, 100" stroke-width="6"></path>
                                </svg>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <span class="material-symbols-outlined text-primary" style="font-size: 32px;">wc</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-4 px-2">
                                <div class="text-center">
                                    <div class="rounded-circle bg-primary mx-auto mb-1" style="width: 12px; height: 12px;"></div>
                                    <div class="small fw-bold text-dark">Mujeres</div>
                                    <div class="h4 text-primary mb-0">51.2%</div>
                                </div>
                                <div class="text-center">
                                    <div class="rounded-circle bg-secondary mx-auto mb-1" style="width: 12px; height: 12px;"></div>
                                    <div class="small fw-bold text-dark">Hombres</div>
                                    <div class="h4 text-muted mb-0">48.8%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </main>
        @push('scripts')
            <script crossorigin="anonymous" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script>
         document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll('.counter-animate');
            counters.forEach(counter => {
                const target = parseFloat(counter.getAttribute('data-target'));
                const duration = 1500;
                const steps = 60;
                const stepTime = Math.abs(Math.floor(duration / steps));
                const increment = target / steps;
                let current = 0;

                const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.innerText = target.toFixed(1);
                    clearInterval(timer);
                } else {
                    counter.innerText = current.toFixed(1);
                }
                }, stepTime);
            });
            });
        </script>
        @endpush
    @endsection

