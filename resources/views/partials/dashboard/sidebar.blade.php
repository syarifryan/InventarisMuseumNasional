<ul>
    <li>
        <div class="menu-title">MAIN</div>
        <ul>
            <li>
                <a href="{{url('/dashboard')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Dashboard" aria-label="Dashboard"></div>

                    <span>
                        <i class="iconly-Curved-Home"></i>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <div class="menu-title">MASTER</div>
        <ul>
            {{-- <li>
                <a href="{{route('dashboard.kualitas-udara.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="User" aria-label="User"></div>
                    <span>
                        <i class="iconly-Curved-Ticket"></i>
                        <span>Kualitas Udara</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.sensor.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Sensor" aria-label="Sensor"></div>
                    <span>
                        <i class="iconly-Curved-Graph"></i>
                        <span>Sensor</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.fuzzy-tsukamoto.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="User" aria-label="User"></div>
                    <span>
                        <i class="iconly-Broken-Bookmark"></i>
                        <span>Fuzzy Tsukamoto</span>
                    </span>
                </a>
            </li> --}}
            {{-- <li>
                @can('rules-index')
                <a href="{{route('dashboard.fuzzy-rules.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="User" aria-label="User"></div>
                    <span>
                        <i class="iconly-Curved-EditSquare"></i>
                        <span>Fuzzy Rules</span>
                    </span>
                </a>
                @endcan
            </li> --}}
            {{-- <li>
                @can('handle-index')
                <a href="{{route('dashboard.handle.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="User" aria-label="User"></div>
                    <span>
                        <i class="iconly-Curved-Discovery"></i>
                        <span>Penanganan</span>
                    </span>
                </a>
                @endcan
            </li> --}}
            <li>
                @can('proses-index')
                <a href="{{route('dashboard.proses.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="User" aria-label="User"></div>
                    <span>
                        <i class="iconly-Curved-ShieldDone"></i>
                        <span>Inventaris</span>
                    </span>
                </a>
                @endcan
            </li>
        </ul>
    </li>
    
    <li>
        <div class="menu-title">Setting</div>
        <ul>
            @can('user-index')
            <li>
                <a href="{{route('dashboard.user.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="User" aria-label="User"></div>
                    <span>
                        <i class="iconly-Curved-People"></i>
                        <span>User</span>
                    </span>
                </a>
            </li>
            @endcan
            @can('role-index')
            <li>
                <a href="{{url('/dashboard/role')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Role & Permission" aria-label="Role & Permission"></div>
                    <span>
                        <i class="iconly-Light-Lock"></i>
                        <span>Role & Permission</span>
                    </span>
                </a>
            </li>
            @endcan
            <li>
                <a href="{{url('/dashboard/profile')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Profil" aria-label="Profil"></div>
                    <span>
                        <i class="iconly-Curved-User"></i>
                        <span>Profil</span>
                    </span>
                </a>
            </li>
        </ul>
    </li>
</ul>
