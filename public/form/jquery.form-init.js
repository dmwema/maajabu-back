jQuery(function($) {
     $('#bookingPopup-form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please enter your email"
            },
            message: {
                required: "Please enter your message"
            }
        },
       submitHandler: function(form) {
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                url:"form/book-form.php",
                success: function() {
                     $('#success').fadeIn();
                    $('#bookingPopup-form').each(function(){this.reset();});
                    closeModal();
                },
                error: function() {
                    $('#bookingPopup-form').fadeTo( "slow", 1, function() {
                        $('#error').fadeIn();
                    });
                }
            });
        }
    });
    function closeModal(){
        $('.popup-wrap').each(function(index){
            if($(this).hasClass('show')){
                $(this).find('.form-popup .close').trigger('click');
            }
        });
    };
    $('#contactform').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please enter your email"
            },
            message: {
                required: "Please enter your message"
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                url:"form/contact-form.php",
                success: function() {
                      $('#success').fadeIn();
            $( '#contactform' ).each(function(){this.reset();});
                },
                error: function() {
                    $('#contactform').fadeTo( "slow", 1, function() {
                        $('#error').fadeIn();
                    });
                }
            });
        }
    });
    $('#newsletterform').validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                url:"form/newsletter-form.php",
                success: function() {
                     $('#success').fadeIn();
                    $('#newsletterform').each(function(){this.reset();});
                },
                error: function() {
                    $('#newsletterform').fadeTo( "slow", 1, function() {
                        $('#error').fadeIn();
                    });
                }
            });
        }
    });
});