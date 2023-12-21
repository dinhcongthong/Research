<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link appLogo">
            Research
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner pt-2 pb-5">
        <li class="menu-item {{ request()->segment(1) === 'captcha-basic' ? 'active' : '' }}">
            <a href="{{ route('captcha_basic') }}" class="menu-link" title="Captcha thường">
                <div>Captcha thường</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) === 'google-captcha' ? 'active' : '' }}">
            <a href="{{ route('google_captcha') }}" class="menu-link" title="Captcha Google">
                <div>Captcha Google</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) === 'big-data' ? 'active' : '' }}">
            <a href="{{ route('big_data.index') }}" class="menu-link" title="Big data">
                <div>Big data</div>
            </a>
        </li>
    </ul>
</aside>
