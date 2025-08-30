<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('Dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('Dashboard/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('Dashboard/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('Dashboard/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('Dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('Dashboard/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('Dashboard/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('Dashboard/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('Dashboard/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('Dashboard/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('Dashboard/plugins/side-menu/sidemenu.js')}}"></script>


<!-- Internal Data tables -->
<script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>


@livewireScripts

<script>
// Global online/offline handling: disable realtime when offline
(function(){
  function setOfflineUI(isOffline){
    document.documentElement.classList.toggle('offline', isOffline);
    // Disable UI elements marked as online-only
    document.querySelectorAll('[data-online-only]').forEach(function(el){
      if(isOffline){ el.setAttribute('disabled','disabled'); }
      else { el.removeAttribute('disabled'); }
    });
    // Header indicator update
    var ind = document.getElementById('online-indicator');
    if(ind){
      var dot = ind.querySelector('.status-dot');
      var text = document.getElementById('online-indicator-text');
      if(dot){ dot.style.background = isOffline ? '#dc3545' : '#28a745'; }
      if(text){ text.textContent = isOffline ? 'غير متصل' : 'متصل'; }
      ind.title = isOffline ? 'غير متصل' : 'متصل';
    }
  }

  function disconnectRealtime(){
    try{
      if(window.Echo && window.Echo.connector){
        if(window.Echo.connector.pusher && typeof window.Echo.connector.pusher.disconnect==='function'){
          window.Echo.connector.pusher.disconnect();
        } else if(typeof window.Echo.disconnect==='function'){
          window.Echo.disconnect();
        }
      }
    }catch(e){}
  }

  function onNetChange(){
    var offline=!navigator.onLine;
    setOfflineUI(offline);
    if(offline){ disconnectRealtime(); }
    else { window.dispatchEvent(new Event('app:online')); }
  }

  window.addEventListener('online', onNetChange);
  window.addEventListener('offline', onNetChange);
  document.addEventListener('DOMContentLoaded', onNetChange);
})();
</script>
