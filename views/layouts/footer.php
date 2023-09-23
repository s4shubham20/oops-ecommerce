<?php
        if(basename($_SERVER['PHP_SELF'])== 'footer.php'){
            exit();
        }
        ?>
    <!-- Required Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/jquery/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/jquery-ui/jquery-ui.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/popper.js/popper.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/bootstrap/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/pages/widget/excanvas.js');?>"></script>
    <!-- waves js -->
    <script src="<?=Controller::asset('back/pages/waves/js/waves.min.js');?>"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?=Controller::asset('back/js/jquery-slimscroll/jquery.slimscroll.js');?>"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?=Controller::asset('back/js/modernizr/modernizr.js');?>"></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?=Controller::asset('back/js/SmoothScroll.js');?>"></script>
    <script src="<?=Controller::asset('back/js/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?=Controller::asset('js/chart.js/Chart.js');?>"></script>
    <!-- amchart js -->
    <script src="<?=Controller::asset('back/pages/widget/amchart/gauge.js');?>"></script>
    <script src="<?=Controller::asset('back/pages/widget/amchart/serial.js');?>"></script>
    <script src="<?=Controller::asset('back/pages/widget/amchart/light.js');?>"></script>
    <script src="<?=Controller::asset('back/pages/widget/amchart/pie.min.js');?>"></script>
    <!-- menu js -->
    <script src="<?=Controller::asset('back/js/pcoded.min.js');?>"></script>
    <script src="<?=Controller::asset('back/js/vertical-layout.min.js');?>"></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?=Controller::asset('back/pages/dashboard/custom-dashboard.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/script.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=Controller::asset('back/js/sweetalert/sweetalert2.min.js');?>"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <?php if(isset($_SESSION['success'])){
        echo "<script>
                const myTimeout = setTimeout(myGreeting, 1500);
                function myGreeting() {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '".$_SESSION['success']."',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            </script>";
            unset($_SESSION['success']);
        }elseif(isset($_SESSION['error'])){
        echo "<script>
            const myTimeout = setTimeout(myGreeting, 1500);
            function myGreeting() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: '".$_SESSION['error']."',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        </script>";
        unset($_SESSION['error']); 
        }
    ?>
    <script>
        function DeleteConfirmation()
        {
            var result = confirm('Are you sure want to delete this ?');
            if(result == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $(".js-example-theme-multiple2").select2({
                theme: "classic",
            });
            $('body').on('change', '#categoryId', function (e) {
                e.preventDefault();
                
                var catId = $('#categoryId').val();
                // console.log("Test"+category);
                $.ajax({
                    url: "<?=Controller::base_url('admin/AjaxController.php');?>",
                    type: "POST",
                    data: {catId:catId},
                    success:function (response) {
                        $('#subcategoryId').html(response);
                    },
                });
            });
        });

        $(document).ready(function(){
            $(".js-example-theme-multiple2").select2({
                theme: "classic",
            });
            $('body').on('change', '#categoryId', function (e) {
                e.preventDefault();
                
                var catId = $('#categoryId').val();
                // console.log("Test"+category);
                $.ajax({
                    url: "<?=Controller::base_url('admin/AjaxController.php');?>",
                    type: "POST",
                    data: {_catId:catId},
                    success:function (response) {
                        $('#brandId').html(response);
                    },
                });
            });
        });
        $(document).ready(function(){
            $(".js-example-theme-multiple2").select2({
                theme: "classic",
            });
            $('body').on('change', '#selectedcategoryId', function (e) {
                $('#selectedsubcategoryId option').removeAttr("selected");
                var catId = $('#selectedcategoryId').val();
                // console.log(unselectedValue);
                $.ajax({
                    url: "<?=Controller::base_url('admin/AjaxController.php');?>",
                    type: "POST",
                    data: {catId:catId},
                    success:function (response) {
                        $('#selectedsubcategoryId').html(response);
                        // console.log(response);
                    },
                });
            });
        });

        $(".js-example-theme-multiple1").select2({
            // theme: "classic"
        });

        $(document).ready(function(){
            $(".js-example-theme-multiple2").select2({
                theme: "classic",
            });
            $('body').on('change', '#productcategoryId', function (e) {
                $('#productsubcategoryId option').removeAttr("selected");
                var catId = $('#productcategoryId').val();
                var subCatId = $("#productSubCatId").val();
                var productId = $("#productId").val();
                //console.log(subCatId);
                $.ajax({
                    url: "<?=Controller::base_url('admin/AjaxController.php');?>",
                    type: "POST",
                    data: {productcatId:catId, productSubCatId:subCatId, productId:productId},
                    success:function (response) {
                        $('#productsubcategoryId').html(response);
                        // console.log(response);
                    },
                });
            });
        });

        $(".js-example-theme-multiple1").select2({
            // theme: "classic"
        });

        $(document).ready(function(){
            $(".js-example-theme-multiple2").select2({
                theme: "classic",
            });
            $('body').on('change', '#productcategoryId', function (e) {
                $('#productBrandId option').removeAttr("selected");
                var catId = $('#productcategoryId').val();
                var productId = $("#productId").val();
                var productBrandId = $("#productBrndId").val();
                // console.log(productBrandId);
                $.ajax({
                    url: "<?=Controller::base_url('admin/AjaxController.php');?>",
                    type: "POST",
                    data: {productcatId:catId , productBrandId:productBrandId},
                    success:function (response) {
                        $('#productBrandId').html(response);
                        // console.log(response);
                    },
                });
            });
        });

        const orderstatusId = (key) =>{
            let orderstatusId = document.getElementById('orderItemId'+key).value;
            let orderItemId = key;
            // console.log(orderItemId+' '+orderstatusId.value);
            $.ajax({
                url:"<?=Controller::base_url('admin/AjaxController.php');?>",
                type:"POST",
                data:{orderStatusId:orderstatusId,orderItemId:orderItemId},
                success:function(res){
                }
            });
        }
        $(".js-example-theme-multiple1").select2({
            // theme: "classic"
        });

    </script>    
</body>
</html>