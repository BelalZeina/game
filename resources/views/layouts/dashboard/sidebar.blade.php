<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link d-flex align-items-center gap-2 ">
            {{-- <img src="{{ asset('asset/img/dashboard/dummy logo.png') }}" style="width: 50px" alt=""> --}}
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Game</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            {{-- <img src="{{ asset('asset/img/dashboard/dummy logo.png') }}" alt=""> --}}
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 pt-5 ">
        <!-- Dashboard -->
        <li class="menu-item {{ isActiveRoute(['dashboard.index','home']) }} ">
            <a href="{{ route('dashboard.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-house"></i>
                <div data-i18n="Analytics">{{ __('models.dashboard') }}</div>
            </a>
        </li>




        <!-- Layouts -->




        <li class="menu-item {{ isActiveRoute(['admins.index','admins.edit','admins.create' ,'admins.show','users.index','users.edit','users.create' ,'users.show']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-users"></i>
                <div data-i18n="Account Settings">{{ __('models.users') }} </div>
            </a>
            <ul class="menu-sub">


                <li class="menu-item {{ isActiveRoute(['admins.index','admins.edit','admins.create' ,'admins.show']) }}">
                    <a href="{{ route('admins.index') }}" class="menu-link">
                        <div data-i18n="Connections">{{ __('models.admins') }}</div>
                    </a>
                </li>


                <li class="menu-item {{ isActiveRoute(['users.index','users.edit','users.create' ,'users.show']) }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="Connections">{{ __('models.users') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ isActiveRoute(['contacts.index']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-earth-americas"></i>
                <div data-i18n="Account Settings">الموقع الخارجى</div>
            </a>
            <ul class="menu-sub">


                <li class="menu-item {{ isActiveRoute(['contacts.index']) }}">
                    <a href="{{ route('contacts.index') }}" class="menu-link">
                        <div data-i18n="Connections">تواصل معنا</div>
                    </a>
                </li>
            </ul>
        </li>



    </ul>
</aside>
