@include('backend.admin.include.head')
@include('backend.admin.include.header')


        <div id="layoutSidenav">
        @include('backend.admin.include.sidebar')

            <div id="layoutSidenav_content">
                <main>
                @yield('mainbody')
                </main>
                @include('backend.admin.include.footer')

            </div>
        </div>
        @include('backend.admin.include.script')

