@include('admin.layout.header')
<div id="layoutSidenav">
  @include('admin.layout.sidebar')
  <div id="layoutSidenav_content">
    <main>
  
        @yield('app')
    </main>
</div>
</div>
  @include('admin.layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('backend/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('backend/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('backend/assets/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('backend/js/datatables-simple-demo.js') }}"></script>
</body>
</html>
