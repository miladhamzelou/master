@section('content')
    <div class="content">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-right">
                    <h4 class="panel-title">مدیریت منابع سیستمی</h4>
                </div>
                <div class="pull-left">
                    <a href=""><span class="fa fa-search"></span> </a>
                    <a href=""><span class="fa fa-refresh"></span></a>
                    <a href=""><span class="fa fa-plus-square"></span> </a>
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
                                    <th><a data-field="created_by" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> ایجاد کننده </a></th>
                                    <th><a data-field="created_at" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> تاریخ ایجاد </a></th>
                                    <th><a data-field="updated_at" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> به روزرسانی </a></th>
                                    <th><a data-field="rate" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> امتیاز </a></th>
                                    <th><a data-field="approve" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> فیلتر تایید </a></th>
                                    <th><a data-field="is_closed" onclick="Admin.sort(event, this)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index" class="has-sort active" data-sort="DESC"> باز بودن </a></th>
                                    <th class="last-left">اکشن</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>6002</td>
                                    <td>پیتزا ناپولی</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 17:00</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/6002" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/6002" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/6002"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/6002"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6001</td>
                                    <td>صاحارا</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 15:48</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/6001" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/6001" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/6001"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/6001"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6000</td>
                                    <td>اوشان</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 15:35</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/6000" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/6000" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/6000"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/6000"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5999</td>
                                    <td>پیکانته</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 15:23</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5999" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5999" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/5999"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/5999"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5998</td>
                                    <td>خوانسالار</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 14:59</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5998" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5998" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/5998"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/5998"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5997</td>
                                    <td>تای گارودا</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 14:51</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5997" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5997" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/5997"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/5997"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5996</td>
                                    <td>بیچه</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 14:44</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5996" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5996" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/5996"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/5996"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5995</td>
                                    <td>ناهید</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 14:31</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5995" data-status="0" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-minus text-danger "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5995" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/5995"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/5995"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5994</td>
                                    <td>چارسوق</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 14:19</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5994" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5994" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/5994"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/5994"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5993</td>
                                    <td>رستوران ساحل</td>
                                    <td></td>
                                    <td>sepidehfathi</td>
                                    <td>1395/07/04 14:09</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5993" data-status="1" data-field="approve" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/changeEnum/5993" data-status="0" data-field="is_closed" onclick="Admin.changeEnum(this, event)"><span class="fa  fa-check-circle text-success "></span></a></td>
                                    <td class="table-action">
                                        <a onclick="Admin.delete(this,event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/destroy/5993"><span class="fa fa fa-trash-o"></span></a>
                                        <a onclick="Admin.show(this, event)" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/show/5993"><span class="fa fa-tv"></span></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=2" onclick="Admin.paginate(event, this)">2</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=3" onclick="Admin.paginate(event, this)">3</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=4" onclick="Admin.paginate(event, this)">4</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=5" onclick="Admin.paginate(event, this)">5</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=6" onclick="Admin.paginate(event, this)">6</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=7" onclick="Admin.paginate(event, this)">7</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=8" onclick="Admin.paginate(event, this)">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=305" onclick="Admin.paginate(event, this)">305</a></li><li><a href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=306" onclick="Admin.paginate(event, this)">306</a></li> <li><a rel="next" href="http://118food.basalamat.com/Admin/RestaurantBundle/Restaurant/Index?page=2" onclick="Admin.paginate(event, this)">»</a></li></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection