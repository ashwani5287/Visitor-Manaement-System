
<style>
    
     .copy-right {
            background-color: #f1f1f1;
            text-align: center;
            padding: 2px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>


<div class="copy-right">
    
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background-color:black">
                
                <span style="color:#fff; ">Powered By <a href="https://mdhp.in/" target="_blank" style="color:inherit"><strong>MDHP</strong> </a></span>
            </div>
        </div><!--./row-->
   
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<style>
     .toast-info, .toast-success, .toast-warning, .toast-error {
        color: rgb(248, 1, 1) !important;  /* Text color */
        
    }
</style>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.options.timeOut = 10000;
                toastr.info("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();
                break;
            case 'success':
                toastr.options.timeOut = 10000;
                toastr.success("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();
                break;
            case 'warning':
                toastr.options.timeOut = 10000;
                toastr.warning("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();
                break;
            case 'error':
                toastr.options.timeOut = 10000;
                toastr.error("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();
                break;
        }
    @endif
</script>

      {{-- <script>
        toastr.error();
toastr.success();
toastr.info();
toastr.warning();
      </script>
      --}}
</body>
</html>