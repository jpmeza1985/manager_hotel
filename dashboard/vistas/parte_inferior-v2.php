
</div>
<!-- End of Main Content -->

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
	<p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://ithsistemas.cl/site/" target="_blank">ITH Sistemas</a><span class="d-none d-sm-inline-block">, Todos los derechos reservados</span></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/js/core/app-menu.js"></script>
    <script src="assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/scripts/cards/card-statistics.js"></script>

    <script src="assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="assets/js/scripts/tables/table-datatables-basic.js"></script>
    <!-- END: Page JS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script>
        miStorage = window.localStorage;
        const current_mode = miStorage.getItem('light-layout-current-skin');
        if (!!current_mode) {
            let htmlTag = document.getElementById('html-id')
            htmlTag.classList.add(current_mode);
            let htmlMenu = document.getElementById('menu-principal')
            let currentMenu = current_mode === 'dark-layout' ? 'menu-dark' : '';
            htmlMenu.classList.add(currentMenu);
        }
    </script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>