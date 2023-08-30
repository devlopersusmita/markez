@if(!empty($private_sending))
@include('frontend.notification')






<div class="episode">

@foreach($private_sending as $teacher)
<div class="episode-thumb-wrap">
                            <div class="episode-thumbnail" >
                                        <div class="episode-overlay"></div>


                                        <div class="avatar"><img id="avatar_image_id" class="avatar-image" src="{{asset('assets/img/icons/activities/drinking.svg')}}"  alt=""></div>
                            </div>
                            <div class="episode-meta">


                                <div class="info">
                                    <span class="info-title"> {{$teacher['name']}} </span>
                                    <span  class="button is-solid blue-button raised view_modal_it"  data-toggle="modal" data-target="#modals-view_it" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" data-type="private_sending" >Details</span>
                                    <span class="button is-solid green-button raised send_modal_it" data-toggle="modal" data-target="#modals-send_it" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" data-type="private_sending">Send Request</span>


                                </div>

                            </div>
</div>

                            @endforeach



</div>





        <div id="pagination">
            {{ $private_sending->links() }}
        </div>





    @endif



