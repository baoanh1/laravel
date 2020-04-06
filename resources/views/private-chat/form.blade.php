@extends('layouts.app')
<!-- Latest compiled and minified CSS -->


@section('routes')
var fetchchatroom = "{{ route('fetch-private.chatroom') }}";
var deletechatroom = "{{ route('delete-private.chatroom') }}";
@if(isset($receiver))
var fetchChatURL = "{{ route('fetch-private.chat', $chatRoom->id) }}";

var postChatURL = "{{ route('private.chat.store', ['chatroomid'=>$chatRoom->id,'proid'=>$proid]) }}";
@endif
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="left col-md-4 hidden-xs hidden-sm">
    <div class="ThreadSection">

<ul class="nav nav-tabs">
    <li class="active menu2"><a data-toggle="tab" href="#menu2">Tôi mua</a></li>
    <li class="menu1"><a data-toggle="tab" href="#menu1">Tôi bán</a></li>
    
  </ul>

  <div class="tab-content">
    
    <div id="menu1" class="tab-pane fade">
      @foreach($myreceivechatrooms as $item)
      
    @if(($item->receiver_id == Auth::user()->id) && ($item->receiver_status == 1))
    <?php 
                                    $product = App\Product::find($item->product_id);
                                    ?>
      <a class="detail-chat-box-item" href="{{ route('private.chat.index', ['receiveid'=>$item->sender_id, 'proid'=>$product->ID]) }}">
        <input class="receiver-id" type="hidden" name="receiver-id" value="{{$item->receiver_id}}">
        <input class="product-id" type="hidden" name="product-id" value="{{$product->ID}}">
            <ul class="ThreadList media-list tab-content">
            <li class="row item-chat ThreadItem " id="5db1b3039ea40b000b96bd67">
                <div class="manageCheckBox hide ManageCheckBox">
                    <input id="5db1b3039ea40b000b96bd67" type="checkbox" href="#" class="threadCheckBox checkbox" value="5db1b3039ea40b000b96bd67">
                </div>
                <div class="ThreadItemContent">
                    <div class="Link-Message">
                        <div class="media-left"><img class="UserAvatar media-object img-circle" src="https://static.chotot.com/storage/chat/member-profile-avatar_140x140.png" alt="">
                        </div>
                        <div class="media-body">
                            <div class="ProductInfoDiv">
                                <p class="UserNameTime"><span class="userName"><?php $user = App\User::find($item->sender_id);echo $user->name?><span class="UpdateTime"> - <?php
                                $product = App\Product::find($item->product_id);
                            $time = gettime($product->CreatedDate);
                            echo $time." trước";
                                               
                        ?></span></span>
                                </p>
                                <p class="ProductName"><?php 
                                    $product = App\Product::find($item->product_id);
                                    echo $product->Name;
                                ?></p>
                                <div class="LastMessage "> </div>
                            </div>
                        </div>
                        <div class="ProductImageDiv" style="background-image: url(<?php 
                                    $product = App\Product::find($item->product_id);
                                    echo url($product->Image);
                                ?>)"></div>
                    </div>
                </div>
            </li>
        </ul>
        </a>
        @endif
        @endforeach
    </div>
    <div id="menu2" class="tab-pane fade in active">
        @foreach($myallchatrooms as $item)
        
        @if($item->sender_id == Auth::user()->id && $item->sender_status == 1)
        <?php 
                                    $product = App\Product::find($item->product_id);
                                    ?>
        <a class="detail-chat-box-item" href="{{ route('private.chat.index', ['receiveid'=>$item->receiver_id, 'proid'=>$product->ID]) }}">
        <input class="receiver-id" type="hidden" name="receiver-id" value="{{$item->sender_id}}">
        <input class="product-id" type="hidden" name="product-id" value="{{$product->ID}}">
            <ul class="ThreadList media-list tab-content">
            <li class="row item-chat ThreadItem " id="5db1b3039ea40b000b96bd67">
                <div class="manageCheckBox hide ManageCheckBox">
                    <input id="5db1b3039ea40b000b96bd67" type="checkbox" href="#" class="threadCheckBox checkbox" value="5db1b3039ea40b000b96bd67">
                </div>
                <div class="ThreadItemContent">
                    <div class="Link-Message">
                        <div class="media-left"><img class="UserAvatar media-object img-circle" src="https://static.chotot.com/storage/chat/member-profile-avatar_140x140.png" alt="">
                        </div>
                        <div class="media-body">
                            <div class="ProductInfoDiv">
                                <p class="UserNameTime"><span class="userName"><?php $user = App\User::find($item->receiver_id);echo $user->name?><span class="UpdateTime"> - <?php
                                
                            $time = gettime($product->CreatedDate);
                            echo $time." trước";
                                               
                        ?></span></span>
                                </p>
                                <p class="ProductName"><?php 
                                    
                                    echo $product->Name;
                                ?></p>
                                <div class="LastMessage "> </div>
                            </div>
                        </div>
                        <div class="ProductImageDiv" style="background-image: url(<?php 
                                    
                                    echo url($product->Image);
                                ?>)"></div>
                    </div>
                </div>
            </li>
        </ul>
    </a>
    @endif
        @endforeach
      
    </div>
    
  </div>





        
        
        <div class="menu-footer ThreadMenuFooter">
            <div role="toolbar" class="btn-toolbar">
                <button type="button" class="btn btn-xs btn-xoa btn-default"><i class="glyphicon glyphicon-trash"></i> Xóa cuộc trò chuyện</button>
                <button id="delete-checkbox" type="button" class="col-xs-6 pull-left hide btn-chotot btn btn-xs btn-default" style=""> Xóa</button>
                <button type="button" class="col-xs-5 pull-right hide btn btn-xs btn-huy btn-default"> Hủy</button>
            </div>
        </div>
    </div>
</div>

        <!-- /* right */ -->
        <div id="show-data" class="col-md-8 ">
            
                @if(isset($receiver))
<?php 
                                    $product = App\Product::find($proid);
                                    
                                    ?>
            <div class="MessageSectionHeader MessageHeader">
    <div id="ChatNameSection" class="col-xs-12 center-text ChatNameSection">
        <div class="visible-xs-inline-block visible-sm-inline-block pull-left"><a class="pull-left visible-xs-inline-block visible-sm-inline-block backBtnWrapper" href="/messages"><span class="glyphicon glyphicon-menu-left"></span></a></div>
        <div class="NameWrapper"><img src="https://static.chotot.com/storage/chat/member-profile-avatar_140x140.png" alt="avatar" class="PartnerAvatar">
            <div class="NameFeild">{{$receiver->name}}
                <p class="ActiveTime"><span class="OnlineStatus Offline"></span><?php
                                $time = checkStateusers($product->users->last_sign_in_at,$product->users->last_log_out_at);
                                
                                if($time=="active")
                                        {
                                            echo "<span style='color:green'>" ."Đang hoạt động..."."</span>";
                                        }
                        else{
                            echo "Hoạt động ". $time ." trước";
                        }
                                
                            ?></p>
            </div>
        </div>
        <div class="RightTopHeaderWrapper">
            <a class="item CallButton"><img src="https://static.chotot.com/storage/chotot-icons/png/call-green.png" alt="call-icon" class="headerIcon">Gọi điện</a>
            <div class="report-wrapper PrivacyBtn">
                <div class="dropdown btn-group btn-group-btn-no-boder">
                    <button id="bg-nested-dropdown" role="button" aria-haspopup="true" aria-expanded="false" type="button" class="reportDropDown glyphicon glyphicon-option-vertical btn-lg dropdown-menu-right dropdownMenu dropdown-toggle btn btn-btn-no-boder"></button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="bg-nested-dropdown">
                        <li role="presentation" class=""><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-ban-circle"></span> Chặn người này<span class="dropdown-header">Chặn gửi hoặc nhận tin nhắn từ người này</span></a></li>
                        <li role="presentation" class=""><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-flag"></span> Báo xấu<span class="dropdown-header">Báo cáo cho chúng tôi biết về người này</span></a></li>
                        <li role="presentation" class=""><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-trash"></span> Xoá trò chuyện<span class="dropdown-header">Xoá cuộc trò chuyện với người này</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="ChatTitleSection" class="ChatTitleSection col-xs-12 vertical-align">
        <div>
            <div class="media-left">
                <a target="blank" href="https://www.chotot.com/49602720.htm">
                    <div class="ProductImageDiv" style="background-image: url('{{url($product->Image)}}')"></div>
                </a>
            </div>
            <div class="media-body">
                <a class="productTitleUrl" target="blank" href="https://www.chotot.com/49602720.htm">
                    <p class="productTitleHeader">{{$product->Name}}</p>
                </a>
                <div class="productPrice">{{$product->Price}}</div>
            </div>
        </div>
    </div>
</div>
            <div class="panel panel-default">
                <div class="panel-heading">Private Chat with {{ $receiver->name }}</div>
                <div class="panel-body">

                    <form id="group-chat" class="form-horizontal" role="form" method="POST" @submit.prevent="sendMessage">
                        {{ csrf_field() }}
                        <div id="messages">
                            <div v-if="messages.length">
                                <message v-for="message in messages" key="message.id" :sender="message.sender.name" :message="message.message" :createdat="message.created_at"></message>
                            </div>
                            <div v-else>
                                <div class="alert alert-warning">No chat yet!</div>
                            </div>
                        </div>
                        <span class="typing" v-if="isTyping"><i><span>@{{ isTyping }}</span> is typing</i></span>
                        <hr/>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} chat-box">
                            <div class="col-md-10">
                                <textarea v-model="message" type="textarea" class="form-control" name="message" @keyup.enter="sendMessage" @keypress="userIsTyping({{$chatRoom->id}})" required autofocus></textarea>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2 chat-btn">
                                <button type="submit" class="sendchat btn btn-primary" :disabled="!message">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
 @else
 
 <div class="MessageSectionHeader MessageHeader">
 <div id="ChatNameSection" class="col-xs-12 center-text ChatNameSection">
    <div class="EmptyChatRoom"></div>
</div>
</div>
@endif
           
        </div>
    </div>
</div>
@endsection
<script>
    
</script>

@section('script')
<script>
      $('.btn-xoa').on('click',function(){
            
            $.ajax({
               url:fetchchatroom,
               // url:"{{route('client.category.pagination.detail','id')}}"+page,
               // data:{id:id},
               success:function(data)
               {
                
                    $('.Link-Message').each(function(index){
                        var $this = $(this);
               
                        $this.append("<input class='checkbox' type='checkbox' value='"+data[index].id+"' />");
                    });


                    $('.btn-huy').removeClass("hide");
                    $('.btn-xoa').addClass("hide");
                    $('input[type="checkbox"]').click(function(e){
                        var anyBoxesChecked = false;
                        $('.checkbox').each(function(i){
                            
                            var $this = $(this);
                                if ($this.is(':checked')) {
                                    anyBoxesChecked = true;
                                    $('#delete-checkbox').removeClass("hide");
                                }else{

                                }
                            });
                        if(anyBoxesChecked==false)
                        {
                            $('#delete-checkbox').addClass("hide");
                        }                             
                    });
                
               }
          });

        
        // $('.Link-Message').append("<input class='checkbox' type='checkbox' value='' />");
        
    });
    $('.btn-huy').on('click',function(){

        $('.Link-Message').children(".checkbox").remove();
        // $("input[type='checkbox']").remove();
        $('.btn-huy').addClass("hide");
        $('.btn-xoa').removeClass("hide");
        $('#delete-checkbox').addClass("hide");

    });
    $('#delete-checkbox').on('click',function(){
        var itemchecked = [];
        $('.checkbox').each(function(){
            
            var $this = $(this);
            if ($this.is(':checked')) {
                itemchecked.push($this.val());
            }
        });
        
       
        $.ajax({
           url:deletechatroom,
           // url:"{{route('client.category.pagination.detail','id')}}"+page,
           data:
           {
                items:itemchecked,
               
           },
           success:function(data)
           {
                if(data > 0)
                {
                    window.location.href = "{{route('get-list-private.chat')}}";
                }
                
           }
        });
    });
</script>
@if(isset($receiver))
<script>

    window.Echo.private(`private-chat-room-{{$chatRoom->id}}`)
    .listen('.user.registered', (e) => {
        app.updateChat(e);
          fetch_data();
    });
    window.Echo.private(`typing-room-{{$chatRoom->id}}`)
    .listenForWhisper('typing', (e) => {
        app.isTyping = e.name;
        setTimeout(function() {
            app.isTyping = '';
        }, 1000);
    });
    function fetch_data()
    {
       $.ajax({
       url:"http://localhost/lara2/public/fetch-private-messages/21",
       // url:"{{route('client.category.pagination.detail','id')}}"+page,
       // data:{id:id},
       success:function(data)
       {
        $('.show-count-messages').html(data);
       }
      });
    }

    
  
    
</script>
@endif
@endsection
