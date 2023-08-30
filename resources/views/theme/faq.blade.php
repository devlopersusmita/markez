@extends('theme.default')

@section('content')




        <div class="store-sections" style="margin-top:100px;">
            <div class="container is-desktop">

          
            <div class="column header-text">
                <h1>FAQ</h1>
            </div>
               

          

             <div class="column">

                    <!-- About sections -->
                    <div class="profile-about side-menu">
                        <div class="left-menu">
                            <div class="left-menu-inner">
                               
                            <?php 
                            $total_no = 0;
                            if(!empty($faqs))
                            {
                                $no = 0;

                                foreach($faqs as $key=>$value)
                                {
                                    $no++;
                                    $total_no++;
                                  
                                    ?>
                                     <div class="menu-item <?php if($no==1){echo 'is-active';}?>" style="cursor:pointer;" id="data-content-<?php echo $no;?>">
                                        <div class="menu-icon" onclick="opentab(<?php echo $no;?>);">    
                                            <span><?php echo $value->title;?></span>
                                        </div>
                                    </div>
                                    <?php 

                                }
                            }
                            ?>
                             

                            </div>
                        </div>
                         <div class="right-content">
                         
                             <?php 
                          
                            if(!empty($faqs))
                            {
                                $no = 0;

                                foreach($faqs as $key=>$value)
                                {
                                    $no++;
                                   
                                    ?>
                                    

                                     <div id="content-<?php echo $no;?>" class="content-section <?php if($no==1){echo 'is-active';}?>">
                                        <?php echo $value->contents;?>
                                    </div>

                                    <?php 

                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>


              
            </div>
        </div>

<script>
    function opentab(no)
    {
        var  total_no= '<?php echo $total_no;?>';
        total_no = parseInt(total_no);

        if(total_no > 0)
        {
            for(var a=1; a <= total_no; a++)
            {
                document.getElementById('content-'+a).style.display='none';                
                document.getElementById('data-content-'+a).removeAttribute('class','is-active'); 

                if(a!=no)
                {
                    document.getElementById('data-content-'+a).setAttribute("class", "menu-item");
                }
            }
        }
        

        

        document.getElementById('content-'+no).style.display='block';
        document.getElementById('data-content-'+no).setAttribute("class", "menu-item is-active");
    }
</script>

@endsection