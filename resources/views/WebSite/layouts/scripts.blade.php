
<script src="{{URL::asset('WebSite/js/jquery.js')}}"></script>
<script src="{{URL::asset('WebSite/js/popper.min.js')}}"></script>
<script src="{{URL::asset('WebSite/js/jquery-ui.js')}}"></script>
<script src="{{ URL::asset('WebSite/js/bootstrap.min.js') }}"></script>
<script src="{{URL::asset('WebSite/js/jquery.fancybox.js')}}"></script>
<script src="{{URL::asset('WebSite/js/parallax.min.js')}}"></script>
<script src="{{URL::asset('WebSite/js/jquery.paroller.min.js')}}"></script>
<script src="{{URL::asset('WebSite/js/owl.js')}}"></script>
<script src="{{URL::asset('WebSite/js/wow.js')}}"></script>
<script src="{{URL::asset('WebSite/js/nav-tool.js')}}"></script>
<script src="{{URL::asset('WebSite/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('WebSite/js/main.js')}}"></script>
<script src="{{URL::asset('WebSite/js/swiper.min.js')}}"></script>
<script src="{{URL::asset('WebSite/js/appear.js')}}"></script>
<script src="{{URL::asset('WebSite/js/script.js')}}"></script>
<script src="{{URL::asset('WebSite/js/color-settings.js')}}"></script>

<script>
// Normalize numbers with thousands separators before submit across website forms
(function(){
  function stripThousands(val){
    if(typeof val !== 'string') return val;
    if(val.indexOf(',') === -1) return val;
    var noCommas = val.replace(/,/g,'');
    return isNaN(Number(noCommas)) ? val : noCommas;
  }
  function preprocessForm(form){
    form.addEventListener('submit', function(){
      var elements = form.querySelectorAll('input, textarea, select');
      elements.forEach(function(el){
        if(el.disabled || el.readOnly) return;
        var t = (el.getAttribute('type')||'').toLowerCase();
        if(['checkbox','radio','file','password','email','date','datetime-local','time','month'].indexOf(t) !== -1) return;
        var v = el.value;
        if(typeof v !== 'string' || v.length === 0) return;
        var cleaned = stripThousands(v.trim());
        if(cleaned !== v) el.value = cleaned;
      });
    }, {capture:true});
  }
  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('form').forEach(preprocessForm);
  });
})();
</script>
