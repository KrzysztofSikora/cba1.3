window.onload = function onLoad() {


    var circleFirst = new ProgressBar.Circle('#progress-first', {
        color: '#aaa',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: {color: '#aaa', width: 1},
        to: {color: '#333', width: 4},
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value);
            }

        }
    });

    // var circleSecond = new ProgressBar.Circle('#progress-second', {
    //     color: '#aaa',
    //     // This has to be the same size as the maximum width to
    //     // prevent clipping
    //     strokeWidth: 4,
    //     trailWidth: 1,
    //     easing: 'easeInOut',
    //     duration: 1400,
    //     text: {
    //         autoStyleContainer: false
    //     },
    //     from: { color: '#aaa', width: 1 },
    //     to: { color: '#333', width: 4 },
    //     // Set default step function for all animate calls
    //     step: function(state, circle) {
    //         circle.path.setAttribute('stroke', state.color);
    //         circle.path.setAttribute('stroke-width', state.width);
    //
    //         var value = Math.round(circle.value() * 100);
    //         if (value === 0) {
    //             circle.setText('');
    //         } else {
    //             circle.setText(value);
    //         }
    //
    //     }
    // });
    //
    // var circleThird = new ProgressBar.Circle('#progress-third', {
    //     color: '#aaa',
    //     // This has to be the same size as the maximum width to
    //     // prevent clipping
    //     strokeWidth: 4,
    //     trailWidth: 1,
    //     easing: 'easeInOut',
    //     duration: 1400,
    //     text: {
    //         autoStyleContainer: false
    //     },
    //     from: { color: '#aaa', width: 1 },
    //     to: { color: '#333', width: 4 },
    //     // Set default step function for all animate calls
    //     step: function(state, circle) {
    //         circle.path.setAttribute('stroke', state.color);
    //         circle.path.setAttribute('stroke-width', state.width);
    //
    //         var value = Math.round(circle.value() * 100);
    //         if (value === 0) {
    //             circle.setText('');
    //         } else {
    //             circle.setText(value);
    //         }
    //
    //     }
    // });
    var bar = new ProgressBar.Line('#progress-bar', {
        strokeWidth: 4,
        easing: 'easeInOut',
        duration: 6000,
        color: '#d24ba8',
        trailColor: '#eee',
        trailWidth: 1,
        svgStyle: {width: '100%', height: '100%'},
        text: {
            style: {
                // Text color.
                // Default: same as stroke color (options.color)
                color: '#999',
                position: 'absolute',
                right: '0',
                top: '30px',
                padding: 0,
                margin: 0,
                transform: null
            },
            autoStyleContainer: false
        },
        from: {color: '#FFEA82'},
        to: {color: '#ED6A5A'},
        step: function (state, bar) {
            bar.setText(Math.round(bar.value() * 100) + ' %');
        }
    });
    $(window).scroll(function () {
        var hT = $('#skills').offset().top,
            hH = $('#skills').outerHeight(),
            wH = $(window).height(),
            wS = $(this).scrollTop();


        if (wS > ((hT + hH - wH))) {
            circleFirst.animate(0.35);
            // circleSecond.animate(0.75);
            // circleThird.animate(0.65);
            bar.animate(1.0);  // Number from 0.0 to 1.0

        }

    });

}















