<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.home') }}"><i class="icon-speedometer"></i> لوحة التحكم
                </a>
            </li>


            @if (auth()->user()->hasRole('superadministrator') || auth()->user()->hasRole('Call Center'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.setting.contact') }}"><i class="fa fa-comments-o  "></i>
                        نموذج التواصل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.setting.newsletter') }}"><i
                            class="fa fa-comments-o  "></i>
                        طلبات الانضمام</a>
                </li>
            @endif
            @if (auth()->user()->hasRole('superadministrator'))
                <li class="nav-title">
                    الصفحة الرئيسية
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: orange" href="{{ route('dashboard.setting.cover') }}"><i
                            class="icon-camera "></i>
                        صور الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: orange" href="{{ route('dashboard.counters.index') }}"><i
                            class="icon-counter ">123</i>
                        العدادات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: orange" href="{{ route('dashboard.partners.index') }}"><i
                            class="icon-user "></i>
                        الشركاء</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: orange" href="{{ route('dashboard.certs.index') }}"><i
                            class="icon-camera "></i>
                        الشهادات</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="color: orange" href="{{ route('dashboard.reviews.index') }}"><i
                            class="icon-star "></i>
                        التقييمات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: orange" href="{{ route('dashboard.whies.index') }}"><i
                            class="icon-note "></i>
                        لماذا تختارنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: orange" href="{{ route('dashboard.facils.index') }}"><i
                            class="icon-note "></i>
                        الضمانات</a>
                </li>
            @endif

            @if (auth()->user()->hasRole('superadministrator') || auth()->user()->hasRole('Manager'))
                <li class="nav-title">
                    المشاريع
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: rgb(115, 175, 231)"
                        href="{{ route('dashboard.categories.index') }}"><i class="icon-layers "></i>
                        الأحياء</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: rgb(115, 175, 231)"
                        href="{{ route('dashboard.projects.index') }}"><i class="icon-home "></i>
                        @lang('site.projects')</a>
                </li>



                <li class="nav-title">
                    الخدمات
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.services.index') }}"><i class="icon-note "></i>
                        الخدمات</a>
                </li>
            @endif

            @if (auth()->user()->hasRole('superadministrator') || auth()->user()->hasRole('blogger'))
                <li class="nav-title">
                    المدونة
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.blogcategories.index') }}"><i class="icon-note "></i>
                        تصنيفات المدونة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.blogs.index') }}"><i class="icon-note "></i>
                        المدونة</a>
                </li>
            @endif

            @if (auth()->user()->hasRole('superadministrator'))
                <li class="nav-title">
                    من نحن
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: greenyellow" href="{{ route('dashboard.about.create') }}"><i
                            class="icon-info "></i>
                        من نحن؟</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: greenyellow" href="{{ route('dashboard.setting.social') }}"><i
                            class="icon-share "></i>
                        مواقع التواصل الاجتماعي</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: greenyellow"
                        href="{{ route('dashboard.setting.settingsText') }}"><i class="icon-info "></i>
                        معلومات الموقع</a>
                </li>
                {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.privacies.index') }}"><i class="icon-info "></i>
                    سياسة الخصوصية</a>
            </li> --}}
                {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.setting.chart') }}"><i class="icon-info "></i>
                    الاسهم</a>
            </li> --}}
                <li class="nav-title">
                    الأدوات
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-user "></i>
                        المستخدمين</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.setting.logs') }}"><i class="icon-magnifier "></i>
                        سجل العمليات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.meta-tags.index') }}"><i class="icon-tag "></i>
                        Meta Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.redirects.index') }}"><i class="icon-info "></i>
                        Redirects</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.setting.changePassword') }}"><i
                        class="icon-lock "></i>
                    تغيير كلمة السر</a>
            </li>
            <li class="nav-item nav-dropdown">
            </li>

        </ul>
    </nav>
</div><a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="{{ route('home') }}"
    target="_blank">@lang('site.home')!</a>
<div class="navigation-background"></div>
