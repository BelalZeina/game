@php
    $user=auth("admin")->user();
@endphp
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

        @if($user->hasPermission('roles-read'))
        <!-- roles -->
        <li class="menu-item {{ isActiveRoute(['roles.index','roles.create','roles.edit']) }} ">
            <a href="{{ route('roles.index') }}" class="menu-link d-flex align-items-center gap-2">
                <i class="fa-solid fa-star"></i>
                <div data-i18n="Analytics">{{ __('models.roles') }}</div>
            </a>
        </li>
        @endif



        @if($user->hasPermission('admins-read'))

        <li class="menu-item {{ isActiveRoute(['admins.index','admins.edit','admins.create' ,'admins.show','users.index','users.edit','users.create' ,'users.show','supervisors.index','supervisors.edit','supervisors.create']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle d-flex align-items-center gap-2">
                <i class="fa-solid fa-users"></i>
                <div data-i18n="Account Settings">{{ __('models.users') }} </div>
            </a>
            <ul class="menu-sub">

                @if($user->hasPermission('admins-read'))
                <li class="menu-item {{ isActiveRoute(['admins.index','admins.edit','admins.create' ,'admins.show']) }}">
                    <a href="{{ route('admins.index') }}" class="menu-link">
                        <div data-i18n="Connections">{{ __('models.admins') }}</div>
                    </a>
                </li>
                @endif

                @if($user->hasPermission('admins-read'))
                <li class="menu-item {{ isActiveRoute(['supervisors.index','supervisors.edit','supervisors.create' ,'supervisors.show']) }}">
                    <a href="{{ route('supervisors.index') }}" class="menu-link">
                        <div data-i18n="Connections">{{ __('models.supervisors') }}</div>
                    </a>
                </li>
                @endif

                @if($user->hasPermission('users-read'))
                <li class="menu-item {{ isActiveRoute(['users.index','users.edit','users.create' ,'users.show']) }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="Connections">{{ __('models.users') }}</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if($user->hasPermission('videos-read'))
            <li class="menu-item {{ isActiveRoute(['videos.index','videos.edit','videos.create']) }}">
                <a href="{{ route('videos.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="fa-solid fa-video"></i>
                    <div data-i18n="Connections">{{__("models.videos")}}</div>
                </a>
            </li>
        @endif

        @if($user->hasPermission('contact_us-read'))
            <li class="menu-item {{ isActiveRoute(['contacts.index']) }}">
                <a href="{{ route('contacts.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="fa-solid fa-message"></i>
                    <div data-i18n="Connections">{{__("models.contact_us")}}</div>
                </a>
            </li>
        @endif



    </ul>
</aside>
