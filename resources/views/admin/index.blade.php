@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">Dashboard</h4>                  
        </div>
      </div>
      <div class="col-md-12">
        <div class="page-header-toolbar">                  
          <div class="sort-wrapper">
            <button type="button" class="btn btn-primary toolbar-item">New</button>                    
          </div>
        </div>
      </div>
    </div>     
    <div class="row">
      <div class="col-md-8">
        <div class="row">                                    
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h4 class="card-title mb-0">Invoice</h4>
                  <a href="#"><small>Show All</small></a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est quod cupiditate esse fuga</p>
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Invoice ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>INV-87239</td>
                        <td>Viola Ford</td>
                        <td>Paid</td>
                        <td>20 Jan 2019</td>
                        <td>$755</td>
                      </tr>
                      <tr>
                        <td>INV-87239</td>
                        <td>Dylan Waters</td>
                        <td>Unpaid</td>
                        <td>23 Feb 2019</td>
                        <td>$800</td>
                      </tr>
                      <tr>
                        <td>INV-87239</td>
                        <td>Louis Poole</td>
                        <td>Unpaid</td>
                        <td>25 Mar 2019</td>
                        <td>$463</td>
                      </tr>
                      <tr>
                        <td>INV-87239</td>
                        <td>Vera Howell</td>
                        <td>Paid</td>
                        <td>27 Mar 2019</td>
                        <td>$235</td>
                      </tr>
                      <tr>
                        <td>INV-87239</td>
                        <td>Allie Goodman</td>
                        <td>Unpaid</td>
                        <td>1 Apr 2019</td>
                        <td>$657</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                                    
        </div>
      </div>             
    </div>            
  </div>
  <!-- content-wrapper ends -->
@endsection