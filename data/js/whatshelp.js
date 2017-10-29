<!-- WhatsHelp.io widget -->

    (function () {
        var options = {
            facebook: "1251498441607641", // Facebook page ID
            email: "kontakt@krzysztofsikora.pl", // Email
            call: "+48728318771", // Call phone number
            company_logo_url: "//scontent.xx.fbcdn.net/v/t1.0-1/p50x50/16711765_1251499598274192_7235337117024363580_n.jpg?oh=978ffdd92993710d424b42f2d9ab576c&oe=5A4F9929", // URL of company logo (png, jpg, gif)
            greeting_message: "Hello, how may we help you? Just send us a message now to get assistance.", // Text of greeting message
            call_to_action: "Napisz do mnie", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "facebook,call,email" // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
