@section('content')
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-right">
                    <h4 class="panel-title">مدیریت منابع سیستمی</h4>
                </div>
                <div class="pull-left">
                    <a href=""><span class="fa fa-search"></span></a>
                    <a href=""><span class="fa fa-refresh"></span></a>
                    <a href="{{ url(getCurrentURL('controller').'/NewLesson') }}"><span class="fa fa-plus-square"></span></a>
                </div>
                <div class="row"></div>
            </div>
            <div class="panel-body">
                <div class="box-body">
                    <div style=" display: none" class="search-box"></div>
                    <div class="ajax-content">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><a data-field="id" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> ردیف </a></th>
                                    <th><a data-field="title" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> عنوان </a></th>
                                    <th><a data-field="type_id" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> نوع رستوران </a></th>
                                    <th class="last-left">اکشن</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>6002</td>
                                    <td>پیتزا ناپولی</td>
                                    <td></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/6002"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/6002"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <ul class="pagination">
                                    <li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=2" onclick="Admin.paginate(event, this)">2</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=3" onclick="Admin.paginate(event, this)">3</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=4" onclick="Admin.paginate(event, this)">4</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=5" onclick="Admin.paginate(event, this)">5</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=6" onclick="Admin.paginate(event, this)">6</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=7" onclick="Admin.paginate(event, this)">7</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=8" onclick="Admin.paginate(event, this)">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=305" onclick="Admin.paginate(event, this)">305</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=306" onclick="Admin.paginate(event, this)">306</a></li> <li><a rel="next" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=2" onclick="Admin.paginate(event, this)">»</a></li></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection