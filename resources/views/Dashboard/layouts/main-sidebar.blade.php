<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
       <a href="{{ route('Dashboard.user') }}"> <h4> {{trans('login_trans.app')}}</h4></a>
    </div>

    @if(\Auth::guard('admin')->check())
        @include('Dashboard.layouts.main-sidebar.admin-sidebar-main')


    @else (\Auth::guard('doctor')->check())

        @include('Dashboard.layouts.main-sidebar.doctor-sidebar-main')

    @endif

</aside>
<!-- main-sidebar -
