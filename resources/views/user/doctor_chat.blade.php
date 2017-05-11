@extends('templates.user')
@section('title', 'Doctor Search - DocON')
@section('content')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/

libs/jquery/1.3.0/jquery.min.js"></script>

    <script type="text/javascript">

        var auto_refresh = setInterval(

            function ()

            {

                $('#load_tweets6').load('../response/{{ $users['doctorid'] }}').fadeIn("slow");

            }, 5000); // refresh every 10000 milliseconds

    </script>
    <div class="row">
          <div class="col-md-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                                    <span class="glyphicon glyphicon-comment"></span> Chat

                  </div>
                  <div class="panel-body" id="bottom">
                      <ul class="chat" id="load_tweets6">
                          <?php
                              $demessages=json_decode($messages,true);
                              $msize=sizeof($demessages);
                              $i=0;
                              while ($i<$msize){
                                  if($demessages[$i]['sender']=="doctor"){
                          ?>
                          <li class="left clearfix">
                              <span class="chat-img pull-left">
                            <img src="{{ URL::asset('/DoctorImages/'.$users['profile_pic'])}}" alt="User Avatar" class="img-circle" style="height: 50px;width: 50px" />
                              </span>
                              <div class="chat-body clearfix">
                                  <div class="header">
                                      <small class="text-muted"></small>
                                                    <strong class="primary-font">{{$users['docname']}}</strong> <small class="pull-right text-muted">
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
                            <img src="{{ URL::asset('/UserImages/'.$users['user_prof'])}}" alt="User Avatar" class="img-circle" style="height: 50px;width: 50px" />
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
                                    </ul>
                                </div>

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

                                <script>

                                    $(document).ready(function() {

                                        $("#submit").click(function() {
                                            var userid=$("#userid").val();

                                            var doctorid=$("#doctorid").val();

                                            var msg1 = $("#msg").val();

                                            if ( msg == '') {

                                                alert("Send Failed Message Field is Blank....!!");

                                            } else {

// Returns successful data submission message when the entered information is stored in database.

                                                $.get("../chat_message", {
                                                    userid1:userid,

                                                    doctorid1:doctorid,

                                                    msg2: msg1

                                                }, function(data) {

                                                    console.log(data);

                                                    $('#form')[0].reset(); // To reset form fields

                                                });

                                            }

                                        });

                                    }); </script>
                                <div class="panel-footer">
                                    <div class="row">

                                        <div class="col-lg-12">

                                            <form id="form" name="clock" onkeypress="return event.keyCode != 13;">

                                                <div class="form-group">

                                                    <input autocomplete="off" style="width:93%; float:left" required type="text" id="msg" name="msg" class="form-control">

                                                    <input class="btn btn-warning" style="float:right" id="submit" type="button" value="Send">

                                                    <input type="hidden" id="userid" name="userid" value="{{$users['userid']}}">
                                                    <input type="hidden" id="doctorid" name="doctorid" value="{{$users['doctorid']}}">

                                                </div>

                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection