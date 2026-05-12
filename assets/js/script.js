$(document).ready(function () {
    $(".ul-menu-list > li > a").click(function (e) {
        e.preventDefault();
        const $wrap = $(this).closest(".ul-menu-list");
        $wrap.find("li").removeClass("active");
        $(this).closest(".left_sibar li").addClass("active");
        // const targetId = $(this).data("id");
        // $wrap.find(".p-treatment__block").removeClass("active");
        // $wrap.find("#" + targetId).addClass("active");
    });

    $(".menu_list__head li a").click(function (e) {
        e.preventDefault();
        const $wrap = $(this).closest(".tabs-container");
        $wrap.find(".menu_list__head li a").removeClass("active");
        $(this).closest(".menu_list__head li a").addClass("active");
        const targetId = $(this).data("id");
        $wrap.find(".tabs-content .item").removeClass("active");
        $wrap.find("#" + targetId).addClass("active");
    });

    $('#btn-copy').on('click', function() {
        // Lấy nội dung của panel đang hiển thị (có class is-active)
        // .text() sẽ lấy chữ thuần, bỏ qua các thẻ html như <p>, <br>
        const contentToCopy = $('.tabs-content .item.active').text().trim();

        if (contentToCopy) {
            // Tạo một textarea tạm để copy (phương pháp chuẩn)
            const $temp = $("<textarea>");
            $("body").append($temp);
            $temp.val(contentToCopy).select();
            document.execCommand("copy");
            $temp.remove();

            // Hiệu ứng thông báo nhỏ cho người dùng
            const originalText = $(this).text();
            $(this).text('Copied!').addClass('copied');
            
            setTimeout(() => {
                $(this).text(originalText).removeClass('copied');
            }, 2000);
        }
    });
});
