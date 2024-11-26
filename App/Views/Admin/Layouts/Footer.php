<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
        public static function render($data = null)
        {

?>

                <!-- container-scroller -->
                <!-- plugins:js -->
                <script src="/public/assets/admin/vendors/js/vendor.bundle.base.js"></script>
                <!-- endinject -->
                <!-- Plugin js for this page -->
                <script src="/public/assets/admin/vendors/chart.js/Chart.min.js"></script>
                <script src="/public/assets/admin/vendors/progressbar.js/progressbar.min.js"></script>
                <script src="/public/assets/admin/vendors/jvectormap/jquery-jvectormap.min.js"></script>
                <script src="/public/assets/admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                <script src="/public/assets/admin/vendors/owl-carousel-2/owl.carousel.min.js"></script>
                <!-- End plugin js for this page -->
                <!-- inject:js -->
                <script src="/public/assets/admin/js/off-canvas.js"></script>
                <script src="/public/assets/admin/js/hoverable-collapse.js"></script>
                <script src="/public/assets/admin/js/misc.js"></script>
                <script src="/public/assets/admin/js/settings.js"></script>
                <script src="/public/assets/admin/js/todolist.js"></script>
                <!-- endinject -->
                <!-- Custom js for this page -->
                <script src="/public/assets/admin/js/dashboard.js"></script>
                <!-- End custom js for this page -->
                <!-- <script>
                        const tempDiv = document.createElement("div");
                        tempDiv.style.height = "200vh";
                        document.body.appendChild(tempDiv);
                        console.log("Can Scroll Now:", document.body.scrollHeight > document.body.clientHeight);
                </script> -->

                
                </body>

                </html>
<?php
        }
}

?>