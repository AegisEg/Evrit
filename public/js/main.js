$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#avatar_profile").click(function() {
        $("#edit_avatar").trigger("click");
    });
    $("#edit_avatar").change(function() {
        var files = this.files;
        var data = new FormData();
        $.each(files, function(key, value) {
            data.append(key, value);
        });
        $.ajax({
            method: 'POST',
            url: '/profile/avatar_save',
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            success: function(responce) {
                $("#avatar_profile").attr('src', responce);
            },
            beforeSend: function() {
                $("#avatar_profile").attr('src', "/images/loading.gif");
            }
        });
    });
    $('#action_menu_btn').click(function() {
        $('.action_menu').toggle();
    });
    $('#profile_tabs a[data-toggle="tab"]').on("click", function() {
        let url = location.href.replace(/\/$/, "");
        url = url.substring(0, url.indexOf('?'));
        let newUrl;
        const hash = $(this).attr("href");
        if (hash == "#information") {
            newUrl = url;
        } else {
            newUrl = url + "?gallery=true";
        }
        history.replaceState(null, null, newUrl);
    });
    $(".to_like").click(function() {
        $this = $(this);
        $.ajax({
            url: "/toggle-like",
            method: "POST",
            data: { image_id: $this.data('id') },
            success: function(responce) {
                responce = jQuery.parseJSON(responce);
                $this.find('.count_likes').html(responce.count);
                $this.toggleClass('active');
            }
        });
    });
    $(".comment_trash").click(function(e) {
        $this = $(this);
        $.ajax({
            url: "/del-comment",
            method: "POST",
            data: { comment_id: $this.data('id') },
            success: function(responce) {
                if (responce)
                    $this.closest(".coment").remove();
            }
        });
    });
    $(".image_trash").click(function(e) {
        $this = $(this);
        $.ajax({
            url: "/del-image",
            method: "POST",
            data: { image_id: $this.data('id') },
            success: function(responce) {
                if (responce)
                    $this.closest(".image_conteiner").remove();
            }
        });
    });
    $(".form_comment").submit(function(e) {
        e.preventDefault();
        $this = $(this);
        var formdata = $(this).serializeArray();
        formdata.push({ name: 'image_id', value: $this.data('id') });
        $.ajax({
            url: "/add-comment",
            method: "POST",
            data: formdata,
            success: function(responce) {
                $this.siblings(".comments_list").append(responce);
                $this[0].reset();
            }
        });
    });
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#sidebar').css('top', $('.user_menu').outerHeight());
    });
    jQuery(".popup-youtube").YouTubePopUp();
    $(".popup-image").fancybox();
    //    Register form
    $('.info_pop').popover({
        container: 'body'
    });
    $('.datepicker').on('keypress', function(event) {
        event.preventDefault();
    })
    $('.datepicker').datepicker({
        language: 'he'
    });
    $('select').selectpicker();
    //Переключатель при регистрации
    $('#gender').change(function() {
        $prop = ($(this).prop('checked') ? 1 : 0);
        $val0 = $("#soc_status").attr('data' + $prop + '-off');
        $val1 = $("#soc_status").attr('data' + $prop + '-on');
        $('#soc_status').bootstrapToggle('destroy')
        $('#soc_status').bootstrapToggle({
            on: $val1,
            off: $val0
        });
    });
    // валидация форм
    var forms = document.getElementsByClassName('form_validate');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
    //Меню выпадающее
    $('header .icon_menu>div').hover(function() {
            $(this).find(".sub_menu").fadeIn('slow');
        },
        function() {
            $(this).find(".sub_menu").fadeOut('slow');
        });

    ///Функции взаимодействия профиля
    $("#to_blacklist").click(function() {
        $this = $(this);
        var user_id = $this.data('user');
        $.ajax({
            method: 'POST',
            url: '/toblacklist',
            data: { user_id: user_id },
            beforeSend: function() {
                $(this).find('.loading_ico').addClass('active');
            },
            success: function(responce) {
                $this.replaceWith('<p class="py-1 my-0">' + responce + '</p>');
            }
        });
    });
    $('.modal button.close').click(function() {
        $(this).closest('.modal').modal('hide');
    });
    $(".sort_by").click(function() {
        $(".sort_by").removeClass('active');
        $(this).addClass('active');
        $(".search_settings").submit();
        $(".search_settings").trigger('submit');
    });
    $(".search_settings").submit(function(e, count = 0) {
        e.preventDefault();
        var formdata = new FormData();
        formdata = $(this).serializeArray();
        $sortby = $('.sort_by.active').attr('id');
        formdata.push({ name: 'sortby', value: $sortby });
        formdata.push({ name: 'count', value: count });
        $.ajax({
            url: "/search",
            method: "POST",
            data: formdata,
            beforeSend: function() {
                $(".preload").show();
            },
            success: function(responce) {
                responce = jQuery.parseJSON(responce);
                $(".catalog_content").empty().append(responce.content);
                $(".count_search").text(responce.count);
            },
            complete: function() {
                $(".preload").hide();
            }
        });
    });
    var inProgress = false;
    $(window).scroll(function() {
        $count = $(".catalog_content .cart").length;
        if (($(window).scrollTop() + $(window).height() >= $(document).height() - 200) && !inProgress && !($count >= $('.count_search').text())) {
            var formdata = new FormData();
            formdata = $(".search_settings").serializeArray();
            $sortby = $('.sort_by.active').attr('id');
            formdata.push({ name: 'sortby', value: $sortby });
            formdata.push({ name: 'count', value: $count });
            $.ajax({
                url: "/search",
                method: "POST",
                data: formdata,
                beforeSend: function() {
                    $(".preload").show();
                    inProgress = true;
                },
                success: function(responce) {
                    responce = jQuery.parseJSON(responce);
                    $(".catalog_content").append(responce.content);
                },
                complete: function() {
                    $(".preload").hide();
                    inProgress = false;
                }
            });
        }
    });
    ///Chat Script
    $('.contacts>.tabs_chat').click(function() {
        $this = $(this);
        $('.contacts>.tabs_chat').removeClass('active');
        $this.addClass('active');
        $(".chat_panel>.card").removeClass('active');
        $(".chat_panel>.card#" + $this.data('id')).addClass('active');
    });
    $(".chat_form").submit(function(e) {
        e.preventDefault();
        $this = $(this);
        var formdata = new FormData();
        formdata = $this.serializeArray();
        formdata.push({ name: 'key', value: $this.data('key') });
        $.ajax({
            url: "/send-message",
            method: "POST",
            data: formdata,
            success: function(responce) {
                $this[0].reset();
            }
        });
    });
});