<?php
$demessages=json_decode($messages,true);
$msize=sizeof($demessages);
$i=0;
while ($i<$msize){
if($demessages[$i]['sender']=="user"){
?>
<li class="left clearfix">
                              <span class="chat-img pull-left">
                            <img src="{{ URL::asset('/UserImages/'.$users['user_prof'])}}" alt="User Avatar" class="img-circle" style="height: 50px;width: 50px" />
                              </span>
    <div class="chat-body clearfix">
        <div class="header">
            <small class="text-muted"></small>
            <strong class="primary-font">{{$users['username']}}</strong> <small class="pull-right text-muted">
            </small>
        </div>
        <p>
            <?php echo $demessages[$i]['message']; ?>
        </p>
    </div>
</li>
<?php }
else{?>
<li class="right clearfix"><span class="chat-img pull-right">
                            <img src="{{ URL::asset('/DoctorImages/'.$users['profile_pic'])}}" alt="User Avatar" class="img-circle" style="height: 50px;width: 50px" />
                        </span>
    <div class="chat-body clearfix">
        <div class="header">
            <small class=" text-muted">&nbsp;</small>
            <strong class="pull-right primary-font"><?php echo "Me" ?></strong>
        </div>
        <p style="text-align: right;">
            <?php echo $demessages[$i]['message']; ?>
        </p>
    </div>
</li>
<?php
}
$i++;
}
?>