<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-2" href="{{ route('home') }}">
            ONLAB
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">

                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            ONLAB
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#collapse-data" data-toggle="collapse" role="button" aria-expanded="true"
                        aria-controls="collapse-data">
                        <i class="ni ni-app text-primary"></i>
                        <span class="nav-link-text">{{ __('Data Master') }}</span>
                    </a>

                    <div class="collapse show" id="collapse-data">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('praktikum.index') }}">
                                    {{ __('Praktikum') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('kelas.index') }}">
                                    {{ __('Kelas') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dosbim.index') }}">
                                    {{ __('Dosbim') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('aslab.index') }}">
                                    {{ __('Aslab') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mahasiswa.index') }}">
                                    {{ __('Mahasiswa') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#collapse-materi" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapse-materi">
                        <i class="ni ni-books text-primary"></i>
                        <span class="nav-link-text">{{ __('Materi') }}</span>
                    </a>

                    <div class="collapse show" id="collapse-materi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modul.index') }}">
                                    {{ __('Modul') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('video.index') }}">
                                    {{ __('Video') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('artikel.index') }}">
                                    {{ __('Artikel') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tugas.index') }}">
                        <i class="ni ni-send text-primary"></i> {{ __('Tugas') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('nilai.index') }}">
                        <i class="ni ni-archive-2 text-primary"></i> {{ __('Nilai') }}
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('nilaiTotal.index') }}">
                        <i class="ni ni-single-copy-04 text-primary"></i> {{ __('Nilai Total') }}
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="ni ni-settings-gear-65 text-primary"></i> {{ __('Pengaturan') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-primary"></i> {{ __('Log Out') }}
                    </a>
                </li>

        </div>
    </div>
</nav>
