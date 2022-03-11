@php
  $tags_en = App\Models\Product::select('product_tags_en')->distinct()->get();
  $tags_bng = App\Models\Product::groupBy('product_tags_bng')->select('product_tags_bng')->get();
@endphp 


<div class="sidebar-widget product-tag wow fadeInUp">
  <h3 class="section-title">Product tags</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="tag-list"> 
      @if(session()->get('language') == 'bengali') 

        @foreach($tags_bng as $tag)
        <a class="item active" title="Phone" href="{{ route('product.tag', $tag->product_tags_bng) }}">
          {{ str_replace(',',' ',$tag->product_tags_bng)  }}</a> 
        @endforeach

      @else 

        @foreach($tags_en as $tag)
        <a class="item active" title="Phone" href="{{ route('product.tag', $tag->product_tags_en) }}">
          {{ str_replace(',',' ',$tag->product_tags_en)  }}</a> 
        @endforeach

      @endif
    </div>
    <!-- /.tag-list --> 
  </div>
  <!-- /.sidebar-widget-body --> 
</div>
<!-- /.sidebar-widget -->