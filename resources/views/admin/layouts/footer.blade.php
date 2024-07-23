</div>
<!-- End of Main Content -->

<!-- Footer -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Shahensha Alam</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

@include('admin.layouts.logout-modal')



<!-- Bootstrap core JavaScript-->
<script src="{{ url('/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('/admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
{{-- <script src="{{ url('/admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="{{ url('/admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ url('/admin/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ url('/admin/js/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ url('/admin/js/demo/datatables-demo.js') }}"></script> --}}


{{-- sweet alert --}}
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

{{-- Sweat Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- chosen --}}

<script src="{{ url('admin/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/prism.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ url('admin/js/select2.full.min.js') }}"></script>
<script>
        $('#custNm2').chosen({
        no_results_text: "Oops, nothing found!",
    });
    $(".select2").select2();
    //$('#select2').trigger('chosen:open');
</script>
</body>

</html>
