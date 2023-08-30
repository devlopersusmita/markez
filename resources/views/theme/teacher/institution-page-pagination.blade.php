@if(!empty($institutions))
@include('frontend.notification')






<div class="episode">

@foreach($institutions as $institution)
<div class="episode-thumb-wrap">
                            <div class="episode-thumbnail" >
                                        <div class="episode-overlay"></div>


                                        <div class="avatar">
                                                        
                <img id="avatar_image_id" class="avatar-image" src="{{asset('assets/img/icons/activities/drinking.svg')}}"  alt="">
               
</div>
                            </div>
                            <div class="episode-meta">


                                <div class="info">
                                    <span class="info-title"> {{$institution['name']}} </span>
                                    <span   class="button is-solid blue-button raised view_modal_it"  data-toggle="modal" data-target="#modals-view_it" style="cursor: pointer;" data-id="<?php echo $institution['id']?>" data-type="private_sending" >Details</span>
                                   <a href="#"> <span   class="button is-solid green-button raised " data-toggle="modal" style="cursor: pointer;" data-type="private_sending" >Send Request</span></a>


                                </div>

                            </div>
</div>

                            @endforeach



</div>





        <div id="pagination">
            {{ $institutions->links() }}
        </div>





    @endif



