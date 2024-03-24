<div class="container">
    <div class="row">
        <!-- Begin Category Menu Area -->
        <div class="col-lg-3">
            <!--Category Menu Start-->
            <div class="category-menu">
                <div class="category-heading">
                    <h2 class="categories-toggle"><span>categories</span></h2>
                </div>
                <div id="cate-toggle" class="category-menu-list">
                    <ul>
                        @foreach ($categories as $category)
                        <li class="right-menu"><a href="shop-left-sidebar.html">{{$category->category_name}}</a>
                            <ul class="cat-mega-menu">
                                @foreach($category->subcategory as  $scat)
                                <li class="right-menu cat-mega-title">

                                   <a href="shop-left-sidebar.html"> {{$scat->subcategory_name}}</a>
                                    <ul>
                                        @foreach($scat->childcategory as $childcat)
                                        <li><a href="#">{{$childcat->childcategory_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        <li class="rx-child"><a href="#">Mobile & Tablets</a></li>
                        <li class="rx-child"><a href="#">Accessories</a></li>
                        <li class="rx-parent">
                            <a class="rx-default">More Categories</a>
                            <a class="rx-show">Less Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Category Menu End-->
        </div>
        <!-- Category Menu Area End Here -->
    </div>
</div>