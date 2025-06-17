<div class="row">
@foreach($product as $new_pro)
    <?php $pro_id = $new_pro->product_slug; ?>
    <div class="col-md-12">
       <a href="{{ url('product-view/'.$pro_id) }}">
          <div class="product-view">
             <div class="product-view-img">
                <img src="{{ url('uploads/product/thumb_images/'.$new_pro->product_image) }}" alt="{{ $new_pro->name }}">
             </div>
             <div class="product-view-details">
                <h1><a href="{{ url('product-view/'.$pro_id) }}">{{ $new_pro->name }} {{ $new_pro->sub_name }}</a></h1>
                <div class="product-price">
                   <p>₹{{ number_format($new_pro->product_price_offer, 2, '.', ',') }}</p>
                </div>
                <div class="reviews-icon">
                   <i class="i-color fa fa-star"></i><i class="i-color fa fa-star"></i><i class="i-color fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                </div>
                <div>
                   <a href="{{ url('product-view/'.$pro_id) }}">
                      <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                   </a>
                </div>
             </div>
          </div>
       </a>
    </div>
@endforeach
</div>
<div class="paginationclass">
    {{ $product->links() }}
</div>
