@include('admin.layouts.header')
@include('admin.layouts.sidebar')

                <!-- Tampilan isi yang berubah pada setiap halaman. -->
                <div class="container-fluid px-4">
                    @yield('konten')
                </div>

@include('admin.layouts.footer')
