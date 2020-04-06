
      @foreach($data as $key=>$item)
      <div class="row item item-sidebar">
            <div class="col-sm-3 item-product-index">
                <a href="{{route('client.product.detail.getdetail',['metetitle'=>$item->MetaTitle,'id'=>$item->ID])}}">
                    <img class="img-responsive center" style="border: none; margin-left: -7%;
    height: 135px;width:80%" src="{{ url('/')}}/{{$images[$key][0]->image}}" alt="">
                </a>
            </div>
            <div class="col-sm-9">
                <div class="price-index">
                    <a href="{{route('client.product.detail.getdetail',['metetitle'=>$item->MetaTitle,'id'=>$item->ID])}}" class=""><h4  class="product-title">{{$item->Name}}</h4></a>
                    <span class="product-description">Navigation trong bootstrap 3</span>
                </div>
                <div class="info-detail">
                            
                                <span class="price" style="color:red"> {{number_format($item->Price, 2)}} đ</span>
                            <div class="row proinfo">
                                <div class="col-sm-4">
                                    <span class="info"> 
                                            <?php
                                                $time = gettime($item->CreatedDate);
                                                echo $time." trước";
                                               
                                            ?>
                                    </span>
                                </div> 
                                <div class="col-sm-4">
                                    <span class="info">{{$item->state}}</span>
                                </div>
                                <div class="col-sm-4">
                                    <span class="info"><i class="icon-class fa fa-map-marker-alt"></i> {{$item->districts->name}} - {{$item->districts->provinces->name}}</span>
                                </div>
                        </div>
                        </div>
                <!-- <p>{!! $item->Detail !!}</p> -->
                

            </div>
    
        </div>
        <br>
      @endforeach

     {!! $data->links() !!}

