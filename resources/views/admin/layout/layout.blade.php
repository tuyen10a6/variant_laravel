<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.headerlink')
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.layout.navbar')
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('admin.layout.header')
                @yield('content')
            </div>
            @include('admin.layout.footer')     
        </div>
    </div>
    @include('admin.layout.logout')
    @include('admin.layout.footerlink')

</body>

</html>