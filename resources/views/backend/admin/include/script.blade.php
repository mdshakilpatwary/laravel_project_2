<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="{{asset('backend/assets')}}/js/scripts.js"></script>
        <script src="{{asset('backend/assets')}}/js/custom.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/assets')}}/js/datatables-simple-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
  
  



<script>
  @if(Session::has('message'))
  toastr.options ={
  	"closeButton" : true,
  	"progressBar" : true
  }
  
  let type ="{{Session::get('type')}}";
  switch (type) {
	case 'success':
      	toastr.success("{{ Session::get('message') }}");
  	break;
	case 'info':
      	toastr.info("{{ Session::get('message') }}");
   	 
    	break;
	case 'error':
      	toastr.error("{{ Session::get('message') }}");
   	 
    	break;
	case 'warning':
      	toastr.warning("{{ Session::get('message') }}");
    	break;

  }
 
  @endif 
</script>
  

  
    </body>
</html>