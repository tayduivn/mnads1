@extends('admin_layout', ['title' => 'ChatFaceBook'])
@section('content')
<div class="row container">
    <form id="form1" action="{{route("maplog.index")}}" method="get" class="form-group">
        <div class="col-md-12" style="display: flex">
            <div class="col-md-6">
                <select id="paginate" class="form-control">
                    <option {{(Session::Get('paginator_maps') == 1)?'selected':''}}  value="1">20</option>
                    <option {{(Session::Get('paginator_maps') == 2)?'selected':''}} value="2">30</option>
                    <option {{(Session::Get('paginator_maps') == 3)?'selected':''}} value="3">40</option>
                    <option {{(Session::Get('paginator_maps') == 4)?'selected':''}} value="4">50</option>
                </select>
                <input id="paginator_maps" type="hidden" name="paginator_maps" value="">
            </div>
{{--            <div class="col-md-6">--}}
{{--                <a class="btn btn-primary" href="{{route('second', ['maplog', 'download'])}}">{{trans('message.download')}}</a>--}}
{{--            </div>--}}
        </div>

    </form>
  <table class="table table-bordered" style="word-break: break-all">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">{{trans('message.map_id')}}</th>
        <th scope="col">Ip</th>
        <th scope="col">{{trans('message.location')}}</th>
        <th scope="col">{{trans('message.date')}}</th>
      </tr>
    </thead>
    <tbody id="load_map">
      <?php $stt = 1; ?>
      @foreach ($data as $item)
       <tr>
        <th scope="row">{{ $stt++ }}</th>
           <td>{{$item->Maps->map_title}} </td>
        <td>{{$item->ip}} </td>
        <td>{{$item->location}} </td>
        <td>{{$item->created_at}} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    <div id="hidden-pagination">
        <span>{!! $data->render() !!}</span>
    </div>
</div>
@endsection
<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $("#paginate").change(function () {
            $("select option:selected").each(function () {
                var paginator_maps = $("#paginate").val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: 'GET',
                    cache: false,
                    url: "{{route('maplog.index.ajax') }}",
                    data: {
                        "_token": _token,
                        "paginator_maps":paginator_maps,
                    },
                    success: function (data) {
                        console.log(data['data']);
                        $("#load_map").html(data);
                    },
                    error: function (data) {
                        console.log('An error occurred.');
                        console.log(data);
                    }
                });
                // str = $(this).val();
                // $("#paginator_maps").val(str);
                // var form = $('#form1');
                // //$(document.body).append(form);
                // form.submit();
            });
        })
    })
</script>
<script>
    $(document).ready(function() {

        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            fetch_data(page);
        });

        function fetch_data(page)
        {
            $.ajax({
                type: "GET",
                url: 'maplog/index-ajax?page=' + page,
                success: function (data) {
                    $('#load_map').html(data);
                    $('#hidden-pagination').hide(data);
                }
            });
        }

    });
</script>
<style type="text/css">
    #paginate {
        width: 150px;
    }
    .pagination{
        margin-block-end: 0;
        margin-inline-start: 0;
        margin-inline-end: 0;
        padding-inline-start: 0;
        margin-block-start: 0;
        width: 75px;
    }
</style>
