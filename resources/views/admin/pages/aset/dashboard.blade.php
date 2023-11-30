@extends('admin.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <ul class="nav nav-tabs" id="myTabs" role="tablist"></ul>
        <div class="tab-content" id="myTabContent">
            <div class="container">

            </div>
        </div>
    </main>

    <div class="modal"  id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="tombol btn btn-primary" id="">SUBMIT</button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
