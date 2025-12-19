(function(){
    if(typeof jQuery === 'undefined') return;
    document.addEventListener('DOMContentLoaded', function(){
        var $ = jQuery;
        var nodes = document.querySelectorAll('.vs-hero-carousel');
        if(!nodes || !nodes.length) return;
        nodes.forEach(function(el){
            try{ // ensure slider is paused initially to avoid heavy work
                $(el).layerSlider('pause');
            }catch(err){}
            if('IntersectionObserver' in window){
                var obs = new IntersectionObserver(function(entries){
                    entries.forEach(function(entry){
                        try{
                            if(entry.isIntersecting){
                                $(el).layerSlider('start');
                            } else {
                                $(el).layerSlider('pause');
                            }
                        }catch(err){}
                    });
                },{threshold:0.25});
                obs.observe(el);
            } else {
                try{ $(el).layerSlider('start'); }catch(err){}
            }
        });
    });
})();
