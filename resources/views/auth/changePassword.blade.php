@section('content')
    <form action="" novalidate="novalidate" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="exampleInputEmail1">پسورد:</label>
            <input name="password" type="password" class="form-control text-left" style="font-family: Tahoma" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">پسورد جدید:</label>
            <input name="newpassword" type="password" class="form-control text-left" style="font-family: Tahoma">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">پسورد جدید:</label>
            <input name="retypepassword" type="password" class="form-control text-left" style="font-family: Tahoma">
        </div>
        <button type="submit" class="btn btn-default">تغییر رمز</button>
    </form>
@endsection