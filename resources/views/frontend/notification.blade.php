@if(session('success'))


  <div class="box-heading margin_top_10 margin_bottom_10">
      <h4>{{session('success')}}</h4>
      
  </div>
                              

@elseif(session('error'))

  <div class="box-heading margin_top_10 margin_bottom_10">
      <h4>{{session('error')}}</h4>
      
  </div>

@endif