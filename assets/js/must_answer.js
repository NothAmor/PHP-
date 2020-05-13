const Answer = {
    timing : function() {
        let time = 60;
        $('time').innerHTML = time;
        timer = setInterval(function() {
            time--;
            $('time').innerHTML = time;
            if(time == 0) {
                $('question').submit();
                clearInterval(timer);
            }
        }, 1000);
    }
};