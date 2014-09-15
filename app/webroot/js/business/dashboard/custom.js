$(document).ready(function() {



    /**
     *	Update Form Post Method
     * 	@param #attr.val(), link => Update controller
     *	@return data.error=> error.id or data.success=> success.id
     */
    $('#updateButton').click(function(e) {
        e.preventDefault();
        var link = updateData; //Businesses updatedata function run.
        var attr = $('#attr').val(); //Form control value
        var btn = $(this);
        btn.button('loading');
        if (attr == "profile_update" && $('#settings_profile').valid())
        {
            $.post(link, {
                attr: attr,
                gender: $('#gender').val(),
                time: $('#user_time_zone').val(),
                cont: $('#country').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error);
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                }
            }, 'json');
        }
        else if (attr == "notification_update") {
            var permarray = [];
            $("input:checkbox[name=permission]:not(:checked)").each(function()
            {
                permarray.push(this.value);
            });
            $.post(link, {
                attr: attr,
                permdata: permarray
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                }
            }, 'json');
        }
        else if (attr == "channel_update" && $('#channel_profile').valid()) {
            $.post(link, {
                attr: attr,
                title: $('#title').val(),
                desc: $('#desc').val(),
                bgColor: $('#bgcolor').val(),
                analitics: $('#analitics').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                }
            }, 'json');
        }
        else if (attr == "channel_update_start" && $('#welcome_form').valid()) {
            $.post(link, {
                attr: attr,
                title: $('#title').val(),
                desc: $('#desc').val(),
                bgColor: $('#bgcolor').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    btn.button('reset');
                }
            }, 'json');
        }
        else if (attr == "edit_ads" && $('#edit_ads').valid()) {
            var anyChecked = $("input:checkbox[name=category]:checked");
            var category = new Array();
            var countC = anyChecked.length;
            for (i = 0; i <= countC - 1; i++)
            {
                category[i] = anyChecked[i].value;
            }
            var cat_arr = JSON.stringify(category);
            $.post(link, {
                attr: attr,
                title: $('#title').val(),
                desc: $('#desc').val(),
                ad_id: $('#ad_id').val(),
                category: cat_arr
            },
            function
                    (data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                    setTimeout(function() {
                        location.href = ads_management
                    }, 2000);
                }
            }, 'json');
        }
        else if (attr == "social_management") {
            $.post(link, {
                attr: attr,
                fb_link: $('#fb_link').val(),
                twitter_link: $('#twitter_link').val(),
                gplus_link: $('#gplus_link').val(),
                website: $('#website').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                }
            }, 'json');
        }
        else if (attr == "password_change" && $('#password_change').valid()) {
            if ($('#new_pass').val() == $('#conf_pass').val())
            {
                $.post(link, {
                    attr: attr,
                    old_pass: $('#old_pass').val(),
                    new_pass: $('#new_pass').val(),
                    conf_pass: $('#conf_pass').val()
                },
                function(data) {
                    if (data.error) {
                        Messenger().post(data.error);
                        btn.button('reset');
                    } else {
                        Messenger().post(data.success);
                        btn.button('reset');
                    }
                }, 'json');
            } else {
                Messenger().post("Confirm password wrong");
                btn.button('reset');
            }
        }
        else {
            btn.button('reset');
        }
    });



    /**
     *	New Form Post Method
     * 	@param #attr.val(), link => New controller
     *	@return data.error=> error.id or data.success=> success.id
     */
    $('#NewButton').click(function(e) {
        e.preventDefault();
        var link = newData; //Businesses updatedata function run.
        var attr = $('#attr').val(); //Form control value
        var btn = $(this);
        btn.button('loading');
        if (attr == "new_ads" && $('#add_ads').valid())
        {
            var anyChecked = $("input:checkbox[name=category]:checked");
            var category = new Array();
            var countC = anyChecked.length;
            for (i = 0; i <= countC - 1; i++)
            {
                category[i] = anyChecked[i].value;
            }
            var cat_arr = JSON.stringify(category);
            $.post(link, {
                attr: attr,
                title: $('#title').val(),
                desc: $('#desc').val(),
                category: cat_arr
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                    setTimeout(function() {
                        location.href = ads_management
                    }, 2000);
                }
            }, 'json');
        }
        else if (attr == "game_add" && $('#game_add').valid())
        {
            $new_game = $('#new_data').val(); //if It is 1 so it means game add if it is not it means edit.

            if ($new_game == 0)
            {
                $edited_game_id = $('#game_id').val();
            } else {
                $edited_game_id = 0;
            }

            if ($('#mobile').prop('checked'))
            {
                $mobile_ready = 1;
            } else {
                $mobile_ready = 0;
            }

            if ($('#fullscreen').prop('checked'))
            {
                $full_screen = 1;
            } else {
                $full_screen = 0;
            }

            if ($('#installable').prop('checked'))
            {
                $installable = 1;
            } else {
                $installable = 0;
            }


            $.post(link, {
                attr: attr,
                name: $('#name').val(),
                desc: $('#desc').val(),
                game_link: $('#game_link').val(),
                width: $('#width').val(),
                height: $('#height').val(),
                category: $('#category_id').val(),
                tags: $('#tags').val(),
                android: $('#gplay_link').val(),
                ios: $('#appstore_link').val(),
                fullscreen: $full_screen,
                mobile: $mobile_ready,
                installable: $installable,
                image_name: $('#game_image').attr('data-src'),
                game_file: $('#game_file').val(),
                new_game: $new_game,
                game_id: $edited_game_id
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                    //setTimeout(function(){location.href=ads_management}, 2000 );
                }
            }, 'json');
        } else {
            btn.button('reset');
        }

    });

    $('.NewButton').click(function(e) {
        e.preventDefault();
        var link = newData; //Businesses updatedata function run.
        var attr = $('#attr').val(); //Form control value
        var btn = $(this);
        var id = $(this).attr('id');
        if (id == 'NewButton1') {
            var active = '1';
        } else if (id == 'NewButton2') {
            var active = '0';
        }
        btn.button('loading');
        if (attr == "new_ads" && $('#add_ads').valid())
        {
            var anyChecked = $("input:checkbox[name=category]:checked");
            var category = new Array();
            var countC = anyChecked.length;
            for (i = 0; i <= countC - 1; i++)
            {
                category[i] = anyChecked[i].value;
            }
            var cat_arr = JSON.stringify(category);
            $.post(link, {
                attr: attr,
                title: $('#title').val(),
                desc: $('#desc').val(),
                category: cat_arr
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                    setTimeout(function() {
                        location.href = ads_management
                    }, 2000);
                }
            }, 'json');
        }
        else if (attr == "game_add" && $('#game_add').valid())
        {
            $new_game = $('#new_data').val(); //if It is 1 so it means game add if it is not it means edit.

            if ($new_game == 0)
            {
                $edited_game_id = $('#game_id').val();
            } else {
                $edited_game_id = 0;
            }

            if ($('#mobile').prop('checked'))
            {
                $mobile_ready = 1;
            } else {
                $mobile_ready = 0;
            }

            if ($('#fullscreen').prop('checked'))
            {
                $full_screen = 1;
            } else {
                $full_screen = 0;
            }

            if ($('#installable').prop('checked'))
            {
                $installable = 1;
            } else {
                $installable = 0;
            }


            $.post(link, {
                attr: attr,
                active: active,
                name: $('#name').val(),
                desc: $('#desc').val(),
                game_link: $('#game_link').val(),
                width: $('#width').val(),
                height: $('#height').val(),
                category: $('#category_id').val(),
                tags: $('#tags').val(),
                android: $('#gplay_link').val(),
                ios: $('#appstore_link').val(),
                fullscreen: $full_screen,
                mobile: $mobile_ready,
                installable: $installable,
                image_name: $('#game_image').attr('data-src'),
                game_file: $('#game_file').val(),
                new_game: $new_game,
                game_id: $edited_game_id
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                    //setTimeout(function(){location.href=ads_management}, 2000 );
                }
            }, 'json');
        } else {
            btn.button('reset');
        }

    });

    $('#deletedata').click(function(e) {
        e.preventDefault();
        var link = deletedata;
        var attr = $('#attr').val(); //Form control value
        var btn = $(this);
        btn.button('loading');
        if (attr == "edit_ads") {
            count = $("[name='select-ads']:checked").length;
            if (count > 1)
            {
                for (i = 0; i <= count - 1; i++)
                {
                    id = $("[name='select-ads']:checked")[i].value;
                    $.post(link, {
                        attr: attr,
                        id: id
                    },
                    function(data) {
                        if (data.error) {
                            alert(data.error); // error.id ye göre mesaj yazdırcak..
                        } else {
                            Messenger().post(data.success);
                            $('#confirm-modal').modal('hide');
                            setTimeout(function() {
                                location.href = ads_management
                            }, 2000);
                        }
                    }, 'json');
                }
            } else {
                id = $("[name='select-ads']:checked")[0].value;
                $.post(link, {
                    attr: attr,
                    id: id
                },
                function(data) {
                    if (data.error) {
                        alert(data.error); // error.id ye göre mesaj yazdırcak..
                    } else {
                        Messenger().post(data.success);
                        $('#confirm-modal').modal('hide');
                        setTimeout(function() {
                            location.href = ads_management
                        }, 2000);
                    }
                }, 'json');
            }
        } else if (attr == "edit_game") {
            count = $("[name='select-user']:checked").length;
            if (count > 1)
            {
                for (i = 0; i <= count - 1; i++)
                {
                    id = $("[name='select-user']:checked")[i].value;
                    $.post(link, {
                        attr: attr,
                        id: id
                    },
                    function(data) {
                        if (data.error) {
                            alert(data.error); // error.id ye göre mesaj yazdırcak..
                        } else {
                            Messenger().post(data.success);
                            $('#confirm-modal').modal('hide');
                            setTimeout(function() {
                                location.href = mygames
                            }, 2000);
                        }
                    }, 'json');
                }

            } else {
                id = $("[name='select-user']:checked")[0].value;
                $.post(link, {
                    attr: attr,
                    id: id
                },
                function(data) {
                    if (data.error) {
                        alert(data.error); // error.id ye göre mesaj yazdırcak..
                    } else {
                        Messenger().post(data.success);
                        $('#confirm-modal').modal('hide');
                        setTimeout(function() {
                            location.href = mygames
                        }, 2000);
                    }
                }, 'json');
            }
        } else {

        }

    });


    $('#switch_publish').click(function() {

        var link = switch_publish;
        var game_id = $('#game_id').val();

        $.post(link, {
            game_id: game_id,
        },
                function(data) {
                    if (data.error) {
                        alert(data.error); // error.id ye göre mesaj yazdırcak..
                    } else {
                        //alert(data.rtdata.title);
                        //Messenger().post(data.success);
                        location.reload();

                    }
                }, 'json');

    });


    $('#stars').on('starrr:change', function(e, value) {
        $('#count').html(value);
    });

    $('#stars-existing').on('starrr:change', function(e, value) {
        $('#count-existing').html(value);
    });


    $('.featured_toggle').click(function() {

        game_id = this.id;
        var link = feat_toggle_link;

        $.post(link, {
            game_id: game_id,
        },
                function(data) {
                    if (data.error) {
                        alert(data.error); // error.id ye göre mesaj yazdırcak..
                    } else {

                        if (data.act_type == 1)
                        {
                            $('#' + game_id).removeClass("btn-default").addClass("btn-warning");
                            $("#" + game_id).html('<i class="fa fa-bullseye"></i> Unset Featured');


                        } else {

                            $('#' + game_id).removeClass("btn-warning").addClass("btn-default");
                            $("#" + game_id).html('<i class="fa fa-bullseye"></i> Set Featured');
                        }

                        Messenger().post(data.success);

                    }
                }, 'json');

    });


    $('.add_mapping').click(function() {
        link = add_mapping;
        domain = $('#mapping_domain').val();
        if (domain == '')
        {
            Messenger().post({
                message: 'You have to enter a domain!',
                type: 'error',
                showCloseButton: true});
        } else {
            //------
            $.post(link, {domain: domain},
            function(data) {
                if (data.rtdata.error) {
                    alert(data.rtdata.error); // error.id ye göre mesaj yazdırcak..
                } else {

                    if (data.rtdata.result == 1)
                    {
                        Messenger().post(data.rtdata.title);
                        $('#remove_domain').show();
                        $('#map_domain').hide();
                        $('.domain_label').html(domain);
                        $('.domain_label').attr('href', 'http://' + domain);
                    } else {
                        var msg;
                        msg = Messenger().post({
                            message: data.rtdata.title,
                            type: 'error',
                            showCloseButton: true
                        });
                    }

                }
            }, 'json');
            //------ 
        }
    });

    $('.remove_mapping').click(function() {
        link = remove_mapping;
        //------
        $.post(link, {},
                function(data) {
                    if (data.rtdata.error) {
                        alert(data.rtdata.error); // error.id ye göre mesaj yazdırcak..
                    } else {
                        //Messenger().post(data.rtdata.success);
                        Messenger().post(data.rtdata.title);
                        $('#remove_domain').hide();
                        $('#map_domain').show();
                    }
                }, 'json');
        //------ 
    });



    /**
     *  Game Delete Method
     *  @param #attr.val(), link => New controller
     *  @return data.error=> error.id or data.success=> success.id
     *  Note:Will be added into Removedata function
     */
    $('.remove_game').click(function() {
        id = $('#game_id').val();
        var link = remove_game;
        var attr = 'remove_game';
        //------
        $.post(link, {
            attr: attr,
            id: id
        },
        function(data) {
            if (data.rtdata.error) {
                alert(data.rtdata.error); // error.id ye göre mesaj yazdırcak..
            } else {
                Messenger().post(data.rtdata.success);
                window.location.href = mygames;
            }
        }, 'json');
        //------ 


    });
    $('.remove_bg_img').click(function() {

        //------
        $.ajax({
            type: "POST",
            url: remove_background,
            dataType: "json",
            async: false,
            success: function(data) {

                Messenger().post(data.rtdata.title);
                $('#user_background').attr('src', 'https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png');
                $('#background_area').css('background-image', '');
                $('#bg_message').html('No background chosen.');
                $('.remove_bg_img').hide();

            },
            failure: function(errMsg) {
                alert(errMsg);
            }
        });
        //------ 

    });

    $("#bgcolor").blur(function() {
        $('#background_area').css('background-color', $("#bgcolor").val());
    });


    //trig when user click on installable check box on game add/edit
    $('.installable').click(function() {

        if ($('.installable').prop('checked'))
        {
            $('.app_details').show();
            $('#game_link').val('');
            $('#game_link').attr('disabled', 'disabled');
        } else {
            $('.app_details').hide();
            $('#game_link').removeAttr('disabled');
        }

    });


    $('#redirect').click(function() {
        var attr = $('#attr').val(); //Form control value
        var btn = $(this);
        btn.button('loading');

        if (attr == "edit_ads") {
            id = $("[name='select-ads']:checked").val();
            window.location.href = edit_ads + '/' + id;
        } else {

        }

    });

    //Controller functions for modals of avatar begins
    $('#avatarframe').load(function() {
        $(this).contents().find("#close_panel").on('click', function(event) {
            $('#pictureChange').modal('toggle');
        });
    });

    $('#avatarframe').load(function() {
        $(this).contents().find("#set_photo").on('click', function(event) {

            //$('#channel_avatar').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
            var new_img = $('iframe[id=avatarframe]').contents().find('#new_image_link').val();
            $('#channel_avatar').attr('src', new_img);
            $('#pictureChange').modal('toggle');

        });

//var name = $('iframe[id=avatarframe]').contents().find('#selected_image').val();
//alert(name);
    });
//Controller functions for modals of avatar ends

//Controller functions for modals of cover begins
    $('#coverframe').load(function() {
        $(this).contents().find("#close_panel").on('click', function(event) {
            $('#coverChange').modal('toggle');
        });
    });

    $('#coverframe').load(function() {
        $(this).contents().find("#set_photo").on('click', function(event) {

            //$('#user_cover').css('background-image', 'url(http://3.bp.blogspot.com/-13dC5LhMbMM/T6NpcCU7obI/AAAAAAAAAVE/kt0XhVIV_zU/s200/loading.gif)');
            var new_img = $('iframe[id=coverframe]').contents().find('#new_image_link').val();
            $('#user_cover').css('background-image', 'url(' + new_img + ')');
            $('#coverChange').modal('toggle');

        });

    });
//Controller functions for modals of covers ends

//Controller functions for modals of background begins
    $('#backgroundframe').load(function() {
        $(this).contents().find("#close_panel").on('click', function(event) {
            $('#backgroundChange').modal('toggle');
        });
    });

    $('#backgroundframe').load(function() {
        $(this).contents().find("#set_photo").on('click', function(event) {

            var new_img = $('iframe[id=backgroundframe]').contents().find('#new_image_link').val();
            $('#user_background').attr('src', new_img);
            $('#background_area').css('background-image', 'url(' + new_img + ')');
            $('.remove_bg_img').show();
            $('#backgroundChange').modal('toggle');
        });

    });
//Controller functions for modals of background ends

//Controller functions for modals of game image begins
    $('#gameframe').load(function() {
        $(this).contents().find("#close_panel").on('click', function(event) {
            $('#gameChange').modal('toggle');
        });
    });

    $('#gameframe').load(function() {
        $(this).contents().find("#set_photo").on('click', function(event) {

            //$('#game_image').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
            var new_img = $('iframe[id=gameframe]').contents().find('#new_image_link').val();
            var img_name = $('iframe[id=gameframe]').contents().find('#selected_image').val();
            $('#game_image').attr('src', new_img);
            $('#game_image').attr('data-src', img_name);
            $('#bg_message').html('Image selected.');
            $('#gameChange').modal('toggle');

        });

    });
//Controller functions for modals of game_image ends

//Controller functions for modals of game Upload begins
    $('#gameaddframe').load(function() {
        $(this).contents().find("#close_panel").on('click', function(event) {
            $('#gameAdd').modal('toggle');
        });
    });

    $('#gameaddframe').load(function() {
        $(this).contents().find("#set_photo").on('click', function(event) {
            $('#gameAdd').modal('toggle');
            $('#game_file_loader').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
            setTimeout(function() {
                var img_name = $('iframe[id=gameaddframe]').contents().find('#selected_image').val();
                $('#game_file').val(img_name);
                $('#game_link').val(img_name);
                $('#game_link').attr('disabled', 'disabled');
            }, 1000);

        });

    });
//Controller functions for modals of game Upload ends



    /**
     * 
     *  MY GAMES
     *
     */


    // User list checkboxes
    var $allUsers = $(".select-users input:checkbox");
    var $checkboxes = $("[name='select-user']");
    $allUsers.change(function() {
        var checked = $allUsers.is(":checked");
        if (checked) {
            $checkboxes.prop("checked", "checked");
            toggleBulkActions(checked, $checkboxes.length);
        } else {
            $checkboxes.prop("checked", "");
            toggleBulkActions(checked, 0);
        }
    });
    $checkboxes.change(function() {
        var anyChecked = $(".user [name='select-user']:checked");
        toggleBulkActions(anyChecked.length, anyChecked.length);
    });
    function toggleBulkActions(shouldShow, checkedCount) {
        if (shouldShow) {
            $(".users-list .header").hide();
            $(".users-list .header.select-users").addClass("active").find(".total-checked").html("(" + checkedCount + " total games)");

        } else {
            $(".users-list .header").show();
            $(".users-list .header.select-users").removeClass("active");
        }
    }
    // Grid switcher
    $btns = $(".grid-view");
    $views = $(".users-view");
    $btns.click(function(e) {
        e.preventDefault();
        $btns.removeClass("active");
        $(this).addClass("active");

        $views.removeClass("active");

        $(".users-grid").hide();
        $(".users-list").hide();

        $($(this).data("grid")).show();
    });

});



$(function() {
    /**
     *	Filter dropdown options Method, Ads management page
     * 	@param 
     *	@return Filter
     */
    var $filters = $(".filters .filter input:checkbox");

    $filters.change(function() {
        var $option = $(this).closest(".filter").find(".filter-option");

        if ($(this).is(":checked")) {
            $option.slideDown(150, function() {
                $option.find("input:text:eq(0)").focus();
            });
        } else {
            $option.slideUp(150);
        }
    });

    // Filter dropdown options for Created date, show/hide datepicker or input text
    var $dropdown_switcher = $(".field-switch");
    $dropdown_switcher.change(function() {
        var field_class = $(this).find("option:selected").data("field");
        var $filter_option = $(this).closest(".filter-option");
        $filter_option.find(".field").hide();
        $filter_option.find(".field." + field_class).show();

        if (field_class === "calendar") {
            $filter_option.find(".datepicker").datepicker("show");
        } else {
            $filter_option.find(".field." + field_class + " input:text").focus();
        }
    });


    $('#datatable-ads').dataTable({
        "sPaginationType": "full_numbers",
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
    });

    // Bulk actions checkboxes

    var $toggle_all = $("input:checkbox.toggle-all");
    var $checkboxes = $("[name='select-ads']");
    var $bulk_actions_btn = $(".bulk-actions .dropdown-toggle");

    $toggle_all.change(function() {
        var checked = $toggle_all.is(":checked");
        if (checked) {
            $checkboxes.prop("checked", "checked");
            $('#redirect').css("display", "none");
            toggleBulkActions(true);
        } else {
            $checkboxes.prop("checked", "");
            toggleBulkActions(false);
        }
    });

    $checkboxes.change(function() {
        var anyChecked = $("[name='select-ads']:checked");
        if (anyChecked.length > 1) {
            $('#redirect').css("display", "none");
        } else {
            $('#redirect').css("display", "block");
        }
        toggleBulkActions(anyChecked.length);
    });

    function toggleBulkActions(show) {
        if (show) {
            $bulk_actions_btn.removeClass("disabled");
        } else {
            $bulk_actions_btn.addClass("disabled");
        }
    }

    //Filtered END

    /**
     *	Tabs Method, Profile page
     * 	@param 
     *	@return tabs
     */
    // tabs
    var $tabs = $(".tabs a");
    var $tab_contents = $(".tab-content .tab");

    $tabs.click(function(e) {
        e.preventDefault();
        var index = $tabs.index(this);

        $tabs.removeClass("active");
        $tabs.eq(index).addClass("active");

        $tab_contents.removeClass("active");
        $tab_contents.eq(index).addClass("active");
    });


    // orders datatable 
    $('#datatable-profile').dataTable({
        "sPaginationType": "full_numbers",
        "iDisplayLength": 20,
        "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
    });


    // form validation
    $('#settings_profile').validate({
        rules: {
            "datepicker": {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
        }
    });


    // form validation
    $('#channel_profile').validate({
        rules: {
            "screenname": {
                required: true
            },
            "description": {
                required: true
            },
            "bgclr": {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
        }
    });



    // form validation Ads Add
    $('#add_ads').validate({
        rules: {
            "product[first_name]": {
                required: true
            },
            "customer[notes]": {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
        }
    });

    // form validation Game add
    $('#game_add').validate({
        rules: {
            "name": {
                required: true,
                maxlength: 45
            },
            "notes": {
                required: true,
                maxlength: 500,
                minlength: 10
            },
            "product[address]": {
                required: true,
                maxlength: 200
            },
            "data[category_id]": {
                required: true
            },
            "width": {
                maxlength: 10
            },
            "height": {
                maxlength: 10
            },
            "product[tags]": {
            }
        },
        messages: {
            notes: {
                maxlength: "Description length must be between 10-500 chars",
                minlength: "Description length must be between 10-500 chars"
            },
            name: {
                maxlength: "Name length must be between 1-45 chars"
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
        }
    });



    // form validation
    $('#edit_ads').validate({
        rules: {
            "product[first_name]": {
                required: true
            },
            "customer[notes]": {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
        }
    });

    // form validation startup
    $('#welcome_form').validate({
        rules: {
            "screenname": {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
        }
    });

    // form validation startup
    $('#password_change').validate({
        rules: {
            "old_pass": {
                required: true
            },
            "new_pass": {
                required: true
            },
            "conf_pass": {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
        }
    });


    // Datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: true,
        startView: 2,
        todayHighlight: true
    });


    // Product tags with select2
    $("#tags").select2({
        placeholder: 'Select tags or add new ones',
        tags: ["Zombie", "Flying", "Upgrade", "Wacom"],
        tokenSeparators: [",", " "]
    });
    // Minicolors colorpicker
    $('input.minicolors').minicolors({
        position: 'top left',
        defaultValue: '#9b86d1',
        theme: 'bootstrap'
    });

    $("[data-switch]").bootstrapSwitch({
        "size": "small"
    });
    Messenger.options = {
        extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
        theme: 'flat'
    }

    // Range Datepicker
    $('.input-daterange').datepicker({
        autoclose: true,
        orientation: 'right top',
        endDate: new Date()
    });

    // Flot Charts
    var chart_border_color = "#efefef";
    var chart_color = "#b0b3e3";

    var d = [[utils.get_timestamp(15), 1290], [utils.get_timestamp(14), 1050], [utils.get_timestamp(13), 1100], [utils.get_timestamp(12), 1300], [utils.get_timestamp(11), 1050], [utils.get_timestamp(10), 1521], [utils.get_timestamp(9), 950], [utils.get_timestamp(8), 1130], [utils.get_timestamp(7), 1100], [utils.get_timestamp(6), 1472], [utils.get_timestamp(5), 1410], [utils.get_timestamp(4), 1684], [utils.get_timestamp(3), 1410], [utils.get_timestamp(2), 1322], [utils.get_timestamp(1), 1050], [utils.get_timestamp(0), 1238]];

    var d2 = [[utils.get_timestamp(14), 1500], [utils.get_timestamp(13), 1600], [utils.get_timestamp(12), 1630], [utils.get_timestamp(11), 1310], [utils.get_timestamp(10), 1530], [utils.get_timestamp(9), 2050], [utils.get_timestamp(8), 2310], [utils.get_timestamp(7), 2050], [utils.get_timestamp(6), 2125], [utils.get_timestamp(5), 1400], [utils.get_timestamp(4), 1600], [utils.get_timestamp(3), 1930], [utils.get_timestamp(2), 2000], [utils.get_timestamp(1), 2320]];

    var options = {
        xaxis: {
            mode: "time",
            tickLength: 10
        },
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                            opacity: 0.04
                        }, {
                            opacity: 0.1
                        }]
                }
            },
            shadowSize: 0
        },
        selection: {
            mode: "x"
        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: chart_border_color,
            borderWidth: 0,
            borderColor: chart_border_color,
        },
        tooltip: true,
        colors: [chart_color]
    };

    var plot = $.plot($("#visitors-chart"), [d], $.extend(options, {
        tooltipOpts: {
            content: "Visitors on <b>%x</b>: <span class='value'>%y</span>",
            defaultTheme: false,
            shifts: {
                x: -75,
                y: -70
            }
        }
    }));

    var plot2 = $.plot($("#payments-chart"), [d2], $.extend(options, {
        tooltipOpts: {
            content: "Payments on <b>%x</b>: <span class='value'>$%y</span>",
            defaultTheme: false,
            shifts: {
                x: -75,
                y: -70
            }
        }
    }));

    var plot3 = $.plot($("#signups-chart"), [d], $.extend(options, {
        tooltipOpts: {
            content: "New signups on <b>%x</b>: <b class='value'>%y</b>",
            defaultTheme: false,
            shifts: {
                x: -78,
                y: -70
            }
        }
    }));


    // Bar chart (visitors)

    var dBar = [[utils.get_timestamp(30), 930], [utils.get_timestamp(29), 1200], [utils.get_timestamp(28), 980], [utils.get_timestamp(27), 950], [utils.get_timestamp(26), 1000], [utils.get_timestamp(25), 1050], [utils.get_timestamp(24), 1150], [utils.get_timestamp(23), 2300], [utils.get_timestamp(22), 1200], [utils.get_timestamp(21), 1300], [utils.get_timestamp(20), 1700], [utils.get_timestamp(19), 1450], [utils.get_timestamp(18), 1500], [utils.get_timestamp(17), 546], [utils.get_timestamp(16), 614], [utils.get_timestamp(15), 954], [utils.get_timestamp(14), 1700], [utils.get_timestamp(13), 1800], [utils.get_timestamp(12), 1900], [utils.get_timestamp(11), 2000], [utils.get_timestamp(10), 2100], [utils.get_timestamp(9), 2200], [utils.get_timestamp(8), 2300], [utils.get_timestamp(7), 2400], [utils.get_timestamp(6), 2550], [utils.get_timestamp(5), 2600], [utils.get_timestamp(4), 1800], [utils.get_timestamp(3), 2200], [utils.get_timestamp(2), 2350], [utils.get_timestamp(1), 2800], [utils.get_timestamp(0), 3245]];

    var options2 = {
        yaxes: {
            min: 0
        },
        xaxis: {
            mode: "time",
            timeformat: "%a %d"
        },
        series: {
            bars: {
                show: true,
                lineWidth: 0,
                barWidth: 47000000, // for bar charts, this is width in milliseconds (86400000 would be the width of a day)
                align: 'center',
                fillColor: {
                    colors: [{opacity: 0.7}, {opacity: 0.7}]
                }
            }
        },
        grid: {
            show: true,
            hoverable: true,
            clickable: true,
            tickColor: chart_border_color,
            borderWidth: 0,
            borderColor: chart_border_color,
        },
        tooltip: true,
        tooltipOpts: {
            content: "Visits on <b>%x</b>: <span class='value'>%y</span>",
            defaultTheme: false,
            shifts: {
                x: -65,
                y: -70
            }
        },
        colors: ["#4fa3d5"]
    };

    var plot4 = $.plot($("#bar-chart"), [dBar], options2);
});



//***************************************************
//------------------Subscription Functions-------------------------
//***************************************************

function subscribe(channel_name, user_auth, id) {
    if (user_auth == 1) {
        switch_subscribe(id);
    } else {
        $.pnotify({
            title: 'Authentication Error',
            text: 'You have to login first to follow channels.',
            type: 'error'
        });
    }
}

function delete_game(user_auth, game_id) {
    if (user_auth == 1) {
        $('#gamebox-' + game_id).css("display", "none");
        $.post(deletedata, {
            attr: "remove_game",
            id: game_id
        },
        function(data) {
            if (data.error) {
                Messenger().post(data.rtdata.error);
                $('#confirm-modal').modal('hide');
            } else {
                Messenger().post(data.rtdata.success);
                $('#confirm-modal').modal('hide');
            }
        }, 'json');
    }
}

function subscribeout(channel_name, user_auth, id) {
    if (user_auth == 1) {
        switch_subscribe(id);
    } else {
        $.pnotify({
            title: 'Authentication Error',
            text: 'You have to login first to follow channels.',
            type: 'error'
        });
    }
}

function switch_subscribe(channel_id) {
    $.get(subswitcher + '/' + channel_id);
}

function switchfollow(id) {
    $(".follow-" + id).hide();
    $(".unfollow-" + id).show();
}

function switchunfollow(id) {
    $(".unfollow-" + id).hide();
    $(".follow-" + id).show();
}

$('#follow_button').click(function() {
    if (user_auth == 1) {
        $('#follow_button').hide();
        $('#unFollow_button').show();
    }
});

$('#unFollow_button').click(function() {
    if (user_auth == 1) {
        $('#unFollow_button').hide();
        $('#follow_button').show();
    }
});
//***************************************************
//------------------Favorite Functions-------------------------
//***************************************************	

function favorite(game_name, user_auth, id) {
    if (user_auth == 1)
    {
        switch_favorite(id);
    } else {
        $('#login').modal('show');
    }
}

function unFavorite(game_name, user_auth, id) {
    if (user_auth == 1)
    {
        switch_favorite(id);
    } else
    {
        $('#login').modal('show');
    }
}

$('#fav_button').click(function() {
    if (user_auth == 1)
    {
    } else
    {
        $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
        });
    }
});

function switch_favorite(game_id) {
    var button = $('.fav-' + game_id);
    button
            .removeClass('btn-default')
            .removeClass('btn-danger')
            .addClass('btn-warning')
            .html('<i class="fa fa-heart heart"></i> Progress...');
    $.get(favswitcher + '/' + game_id, function(data) {
        if (data == 0) {
            button
                    .removeClass('btn-warning')
                    .addClass('btn-danger')
                    .html('<i class="fa fa-heart"></i> Favorite');
            Messenger()
                    .post("Game Unfavorited");
        } else {
            button
                    .removeClass('btn-warning')
                    .addClass('btn-default')
                    .html('<i class="fa fa-heart"></i> UnFavorite');
            Messenger()
                    .post("Game Favorited");
        }
    });
}

function chaingame2(game_name, user_auth, game_id, clone_status)
{
    var btn = $('#clone-' + game_id);
    btn.button('loading');
    if (user_auth == 1)
    {
        $.get(chaingame + '/' + game_id,
                function(data)
                {
                    if (data == 1)
                    {
                        Messenger().post("Game Cloned");
                        btn.button('reset');
                    } else
                    {
                        Messenger().post("Error. Please, try again..");
                        btn.button('reset');
                    }
                });

    } else
    {
        $('#myModal').modal('hide');
        $('#login').modal('show');
    }
}


function ad_get_code1(location, user_id) {
    alert(user_id);
}

/*
 function col_ads(location,user_id){
 var formData = {location:location,user_id:user_id};
 alert("asd");
 $.ajax({
 type: "POST",
 url: col_ads_link,
 data: formData,
 success: function(data){
 $('.ad_code').html(data);
 }
 });
 }
 
 /**
 * Explore Games Clone Button Action
 * @param string game_name
 * @param boolean user_auth
 * @param integer game_id
 * @param integer clone_status
 * @author Emircan Ok
 */
function chaingame3(game_name, user_auth, game_id) {
    var btn = $('a.clone-' + game_id);
    btn
            .removeClass('btn-success')
            .addClass('btn-warning')
            .html('<i class="fa fa-cog spin"></i> Cloning');
    if (user_auth == 1) {
        $.get(chaingame + '/' + game_id, function(data) {
            if (data == 1) {
                Messenger()
                        .post("Game Cloned");
                btn
                        .button('reset')
                        .html('<i class="fa fa-cog"></i> Cloned')
                        .removeClass('btn-warning')
                        .addClass('btn-default');
            } else {
                Messenger()
                        .post("Error. Please, try again..");
                btn
                        .button('reset');
            }
        });
    } else {
        $('#myModal')
                .modal('hide');
        $('#login')
                .modal('show');
    }
}

/**
 * Explore Games Hover Game Clone Button Action
 * @author Emircan Ok
 */
$('div.clone a').hover(
        function() {
            if ($(this).html() == '<i class="fa fa-cog"></i> Cloned') {
                $(this)
                        .removeClass('btn-default')
                        .addClass('btn-success')
                        .html('<i class="fa fa-cog"></i> Re Clone');
            }
        },
        function() {
            if ($(this).html() == '<i class="fa fa-cog"></i> Re Clone') {
                $(this)
                        .removeClass('btn-success')
                        .addClass('btn-default')
                        .html('<i class="fa fa-cog"></i> Cloned');
            }
        }
);



/**
 * Grid - List Cookie
 * @author Emircan Ok
 */
$('a.grid-view').click(function() {
    var view = $(this).attr('data-grid');
    switch (view) {
        case '.users-list':
            document.cookie = 'view=list';
            break;
        case '.users-grid':
            document.cookie = 'view=grid';
            break;
    }
});

function publish(id) {
    $.post(publish);
}

function unpublish(id) {
    $.post(unpublish);
}

$('.switch_publish1').click(function(e) {
    e.preventDefault();
    var link        =   switch_publish;
    var button      =   $(this);
    var game_id     =   button.attr('id');
    var lbutton     =   button.closest('div').find('a').first();
    var rbutton     =   lbutton.next('button');
    if (lbutton.hasClass('btn-success')) {
        var status = true;
    } else {
        var status = false;
    }
    lbutton
        .removeClass('btn-success')
        .removeClass('btn-danger')
        .addClass('btn-warning')
        .html('Processing');
    rbutton
        .removeClass('btn-success')
        .removeClass('btn-danger')
        .addClass('btn-warning');
    $.post(
        link,
        {
            game_id: game_id,
        },
        function(data) {
            if (data.error) {
                alert(data.error);
            } else {
                if (data.rtdata.result === 1) {
                    Messenger().post(data.rtdata.title);
                    switch (data.rtdata.title) {
                        case 'Game has been published.':
                            lbutton
                                .removeClass('btn-warning')
                                .addClass('btn-success')
                                .html('<i class="fa fa-edit"></i> Edit');
                            rbutton
                                .removeClass('btn-warning')
                                .addClass('btn-success');
                            button.html('<i class="fa fa-cog"></i> UnPublish');
                            break;
                        case 'Game has been unpublished.':
                            lbutton
                                .removeClass('btn-warning')
                                .addClass('btn-danger')
                                .html('<i class="fa fa-edit"></i> Edit');
                            rbutton
                                .removeClass('btn-warning')
                                .addClass('btn-danger');
                            button.html('<i class="fa fa-cog"></i> Publish');
                            break;
                    }
                } else {
                    Messenger().post(
                        {
                            message: 'Error!',
                            type: 'error',
                            showCloseButton: true
                        }
                    );
                    lbutton.removeClass('btn-warning');
                    switch (status) {
                        case true:
                            lbutton.addClass('btn-success');
                            break;
                        case false:
                            lbutton.addClass('btn-danger');
                            break;
                    }
                    lbutton.html('<i class="fa fa-edit"></i> Edit');
                    rbutton
                        .removeClass('btn-warning')
                        .addClass('btn-danger');
                }
            }
        },
        'json'
    );
});

$('.NewButtonGame').click(function(e){
    e.preventDefault();
    var link = newData; //Businesses updatedata function run.
    var attr = 'game_add'; //Form control value
    var btn = $(this);
    btn.button('loading');
    /*$new_game = $('#new_data').val(); //if It is 1 so it means game add if it is not it means edit.

            if ($new_game == 0)
            {
                $edited_game_id = $('#game_id').val();
            } else {
                $edited_game_id = 0;
            }*/
    
    switch ($(this).attr('id')) {
        case 'NewButton1':
            var active = 1;
            break;
        case 'NewButton2':
            var active = 0;
            break;
    }

            if ($('#mobile').prop('checked'))
            {
                $mobile_ready = 1;
            } else {
                $mobile_ready = 0;
            }

            if ($('#fullscreen').prop('checked'))
            {
                $full_screen = 1;
            } else {
                $full_screen = 0;
            }

            if ($('#installable').prop('checked'))
            {
                $installable = 1;
            } else {
                $installable = 0;
            }


            $.post(link, {
                attr: attr,
                name: $('#name').val(),
                desc: $('#desc').val(),
                game_link: $('#game_link').val(),
                width: $('#width').val(),
                height: $('#height').val(),
                category: $('#category_id').val(),
                tags: $('#tags').val(),
                android: $('#gplay_link').val(),
                ios: $('#appstore_link').val(),
                fullscreen: $full_screen,
                mobile: $mobile_ready,
                installable: $installable,
                image_name: $('#game_image').attr('data-src'),
                game_file: $('#game_file').val(),
                /*new_game: $new_game,*/
                /*game_id: $edited_game_id*/
                active: active
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                } else {
                    Messenger().post(data.success);
                    btn.button('reset');
                    //setTimeout(function(){location.href=ads_management}, 2000 );
                }
            }, 'json');
});