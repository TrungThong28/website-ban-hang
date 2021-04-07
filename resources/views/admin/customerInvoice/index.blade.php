@extends('admin.layouts.main')
@section('content')
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Danh sách thông tin đặt hàng</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                </div>
                <!-- /.float-right -->
              </div>

              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  	<tr>
                  		<th>STT</th>
	                    <th>Thông tin khách hàng</th>
	                    <th>Mã đơn hàng</th>
	                    <th>Loại thanh toán</th>
	                    <th>Tổng số tiền</th>
	                    <th>Ngày đặt</th>
	                    <th class="text-center">Hành động</th>
	                 </tr>

	                  <tr>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td class="text-center">
	                    	<a href="" class="btn btn-default">Xem</a>
	                    	<a href="" class="btn btn-default">Chi tiết</a>
                          	<a href="javascript:void(0)" class="btn btn-danger" onclick="">Xóa</a>
	                    </td>
	                  </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                  <div class="btn-group">
                   
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
@endsection