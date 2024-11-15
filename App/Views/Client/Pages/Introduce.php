<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Introduce extends BaseView
{
    public static function render($data = null)
    {
?>

        <header class="bg-primary text-white text-center py-5" style="background: url('/public/assets/client/images/hannah-morgan-ycvfts5ma4s-unsplash-2.jpg') no-repeat center center/cover; height: 70vh; background-position: center;">
            <div class="container">
                <h1 class="display-4">Secondhand Chic Boutique</h1>
                <p class="lead">Phong cách tái chế - Độc đáo và bền vững</p>
            </div>
        </header>

        <div class="container my-5">
            <!-- About Us Section -->
            <section class="py-5">
                <h2 class="text-center text-warning mb-4">Về Chúng Tôi</h2>
                <p class="lead text-center mx-auto" style="max-width: 800px;">Chào mừng bạn đến với Secondhand Chic Boutique! Chúng tôi là một cửa hàng chuyên cung cấp các sản phẩm secondhand chất lượng cao, mang đến cho bạn cơ hội sở hữu những món đồ thời trang độc đáo, vừa bền vững lại vừa tiết kiệm. Mỗi món đồ tại đây đều được chọn lọc kỹ càng, phục vụ cho những ai yêu thích việc tái chế và bảo vệ môi trường.</p>
                <p class="lead text-center mx-auto" style="max-width: 800px;">Với cam kết mang đến những sản phẩm chất lượng, chúng tôi không chỉ giúp bạn tạo dựng phong cách riêng mà còn góp phần vào việc bảo vệ hành tinh. Những món đồ secondhand mà chúng tôi cung cấp đều có câu chuyện riêng, được lựa chọn từ những bộ sưu tập cũ nhưng vẫn còn mới mẻ, phù hợp với những xu hướng thời trang hiện đại.</p>
            </section>

            <!-- Our Mission Section -->
            <section class="bg-light py-5">
                <h2 class="text-center text-warning mb-4">Sứ Mệnh Của Chúng Tôi</h2>
                <p class="lead text-center mx-auto" style="max-width: 800px;">Tại Secondhand Chic Boutique, chúng tôi tin rằng mỗi sản phẩm secondhand đều mang trong mình một sứ mệnh đặc biệt. Mục tiêu của chúng tôi không chỉ là mang lại những món đồ thời trang, mà còn là tạo ra một phong trào sống bền vững, giúp giảm thiểu chất thải và bảo vệ môi trường. Chúng tôi khuyến khích khách hàng của mình chọn lựa những món đồ đã qua sử dụng nhưng vẫn giữ được chất lượng cao, tạo ra những lựa chọn thân thiện với môi trường mà vẫn thời thượng và phong cách.</p>
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Mỗi món đồ không chỉ là một món vật phẩm, mà là một cơ hội để bạn đóng góp vào sự thay đổi lớn cho hành tinh."</p>
                </blockquote>
            </section>

            <!-- Our Core Values Section -->
            <section class="py-5">
                <h2 class="text-center text-warning mb-4">Giá Trị Cốt Lõi</h2>
                <p class="lead text-center mx-auto" style="max-width: 800px;">Chúng tôi xây dựng Secondhand Chic Boutique không chỉ đơn thuần là một nơi bán hàng, mà là một cộng đồng yêu thích sự bền vững và thời trang. Những giá trị cốt lõi mà chúng tôi theo đuổi bao gồm:</p>
                <ul class="lead mx-auto" style="max-width: 800px;">
                    <li><strong>Bền vững:</strong> Mỗi sản phẩm đều mang lại giá trị lâu dài, không chỉ trong chất lượng mà còn trong việc bảo vệ môi trường.</li>
                    <li><strong>Cá nhân hóa:</strong> Chúng tôi cung cấp những sản phẩm độc đáo, giúp bạn thể hiện phong cách riêng biệt của mình.</li>
                    <li><strong>Cộng đồng:</strong> Chúng tôi luôn khuyến khích sự gắn kết giữa các tín đồ yêu thích đồ secondhand, tạo dựng một cộng đồng bền vững.</li>
                </ul>
            </section>

            <!-- Commitment Section -->
            <section class="bg-light py-5">
                <h2 class="text-center text-warning mb-4">Cam Kết Của Chúng Tôi</h2>
                <p class="lead text-center mx-auto" style="max-width: 800px;">Chúng tôi cam kết luôn mang đến cho bạn những sản phẩm chất lượng cao, đã qua kiểm tra kỹ càng và được bảo dưỡng tốt nhất. Các món đồ tại Secondhand Chic Boutique không chỉ được chọn lọc kỹ lưỡng mà còn mang đến cho bạn sự an tâm về chất lượng. Mỗi món đồ đều được chăm sóc và phục hồi để đạt đến chất lượng tốt nhất trước khi đến tay người tiêu dùng.</p>
                <p class="lead text-center mx-auto" style="max-width: 800px;">Chúng tôi tự hào là một phần trong phong trào tái chế, và chúng tôi mong muốn bạn cũng sẽ cùng chúng tôi tạo dựng một phong cách sống xanh, bảo vệ hành tinh và tiết kiệm chi phí.</p>
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Chọn lựa sáng suốt hôm nay, hành động cho một tương lai bền vững!"</p>
                </blockquote>
            </section>
        </div>

<?php
    }
}
?>