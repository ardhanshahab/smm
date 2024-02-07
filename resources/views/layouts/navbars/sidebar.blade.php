<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    @php
        $activeButton = '';
        $navName = '';
        $activePage = '';
    @endphp

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ __('Creative Tim') }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if ($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#manajemen"
                    @if ($activeButton == 'manajemen') aria-expanded="true" @endif>
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>
                        {{ __('Manajemen') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if ($activeButton == 'manajemen') show @endif" id="manajemen">
                    <ul class="nav">
                        <li class="nav-item @if ($activePage == 'stok') active @endif">
                            <a class="nav-link" href="{{ route('stok.index') }}">
                                <i class="nc-icon nc-bag"></i>
                                <p>{{ __('stok') }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if ($activePage == 'permintaan') active @endif">
                            <a class="nav-link" href="{{ route('permintaan.index') }}">
                                <i class="nc-icon nc-cart-simple"></i>
                                <p>{{ __('Permintaan') }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if ($activePage == 'mitra') active @endif">
                            <a class="nav-link" href="{{ route('mitra.index') }}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __('Mitra') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#masterdata"
                        @if ($activeButton == 'masterdata') aria-expanded="true" @endif>
                        <i class="nc-icon nc-grid-45"></i>
                        <p>
                            {{ __('Master Data') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @if ($activeButton == 'masterdata') show @endif" id="masterdata">
                        <ul class="nav">
                            <li class="nav-item @if ($activePage == 'barang') active @endif">
                                <a class="nav-link" href="{{ route('barang.index') }}">
                                    <i class="nc-icon nc-tag-content"></i>
                                    <p>{{ __('Barang') }}</p>
                                </a>
                            </li>
                            <li class="nav-item @if ($activePage == 'departement') active @endif">
                                <a class="nav-link" href="{{ route('departement.index') }}">
                                    <i class="nc-icon nc-istanbul"></i>
                                    <p>{{ __('Departement') }}</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#mainuser"
                        @if ($activeButton == 'mainuser') aria-expanded="true" @endif>
                        <i class="nc-icon nc-satisfied"></i>
                        <p>
                            {{ __('User') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @if ($activeButton == 'mainuser') show @endif" id="mainuser">
                        <ul class="nav">
                            <li class="nav-item @if ($activePage == 'user') active @endif">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    <i class="nc-icon nc-single-02"></i>
                                    <p>{{ __('User Profile') }}</p>
                                </a>
                            </li>

            <li class="nav-item @if ($activePage == 'user-management') active @endif">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __('User Management') }}</p>
                </a>
            </li>
        </ul>
                    </div>
    </li>
    @endif
    </ul>
</div>
</div>
