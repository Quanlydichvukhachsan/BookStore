<div class="left-sidebar">
    <h2>Thể Loại Sách</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

          @foreach($products->getListCategory() as $item)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <input type="hidden" name="parent-name" value="{{$item->getId()}}">
                    <a data-value="{{$item->getId()}}" data-toggle="collapse" data-parent="#accordian" href="#{{$item->getId()}}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                         {{$item->getName()}}
                    </a>
                </h4>
            </div>


            <div id="{{$item->getId()}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        @foreach($item->getChilds() as $child)
                        <li><a href="" data-value="{{$child->getId()}}">{{$child->getName()}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
        @endforeach


    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Hình Thức</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=""> <span class="pull-right">(50)</span>Bìa Mềm</a></li>
                <li><a href=""> <span class="pull-right">(56)</span>Bìa Cứng</a></li>
            </ul>
        </div>
    </div><!--/brands_products-->



</div>
