@extends('layouts.header')

@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <b>Project</b>
            <small><b>Details</b></small><br><br>
          </h1>
              <div class="box">
               
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(isset($project) && !empty($project))
                      @foreach($project as $pro)
                      <tr>
                        <td>{{$pro->title}}</td>
                        <td>{{$pro->company_name}}</td>
                        @if(empty($pro->details))
                        <td>Sorry, details not mentioned</td>
                        @else
                        <td>{{$pro->details}}</td>
                        @endif
                        
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Details</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
</div>

<script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
</script>

@endsection
