		<!-- jQuery CDN -->
        <script type="DataTables/jQuery-3.2.1/jquery-3.2.1.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
                 $('#categories_list').DataTable();
                 $('#product_list').DataTable();
                 $('#account_list').DataTable();
                 
             });
         </script>