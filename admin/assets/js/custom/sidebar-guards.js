(function(){
  function safeDestroy(instance){
    if (instance && typeof instance.destroy === 'function'){
      try{ instance.destroy(); }catch(e){}
    }
  }

  function patch(){
    if (window.Menu && window.Menu.prototype){
      var proto = window.Menu.prototype;
      var origManage = proto.manageScroll;
      proto.manageScroll = function(){
        try{
          if (origManage) return origManage.apply(this, arguments);
        }catch(e){
          // fallback behaviour below
        }
        var menuInner = document.querySelector('.menu-inner');
        var bp = (window.Helpers && window.Helpers.LAYOUT_BREAKPOINT) || 992;
        if (window.innerWidth < bp){
          safeDestroy(this._scrollbar);
          this._scrollbar = null;
          if (menuInner) menuInner.classList.add('overflow-auto');
        } else {
          if (!this._scrollbar && typeof window.PerfectScrollbar !== 'undefined' && menuInner){
            try{ this._scrollbar = new window.PerfectScrollbar(menuInner, {suppressScrollX:true, wheelPropagation:false}); }catch(e){}
          }
          if (menuInner) menuInner.classList.remove('overflow-auto');
        }
      };

      var origDestroy = proto.destroy;
      proto.destroy = function(){
        safeDestroy(this._scrollbar);
        this._scrollbar = null;
        return origDestroy ? origDestroy.apply(this, arguments) : undefined;
      };

      return true;
    }
    return false;
  }

  function waitAndPatch(times){
    if (patch()) return;
    if (times>0) setTimeout(function(){waitAndPatch(times-1);},200);
  }
  waitAndPatch(25);
})();
