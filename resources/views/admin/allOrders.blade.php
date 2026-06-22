@extends('admin.layouts.master')
@section('allorders_section')
<main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Orders</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <!-- Summary cards -->
            <div class="row g-3 mb-3">
              <div class="col-md-3 col-6">
                <div class="card h-100">
                  <div class="card-body">
                    <p class="text-secondary small mb-1">Pending Orders</p>
                    <h3 class="mb-0 fw-bold">{{$orders->where('status', 'pending')->count()}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="card h-100">
                  <div class="card-body">
                    <p class="text-secondary small mb-1">On track</p>
                    <h3 class="mb-0 fw-bold text-success">3</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="card h-100">
                  <div class="card-body">
                    <p class="text-secondary small mb-1">Approved</p>
                    <h3 class="mb-0 fw-bold text-warning">{{$orders->where('status', 'approved')->count()}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="card h-100">
                  <div class="card-body">
                    <p class="text-secondary small mb-1">Completed</p>
                    <h3 class="mb-0 fw-bold text-secondary">1</h3>
                  </div>
                </div>
              </div>
            </div>

            <!-- Toolbar -->
            <div class="card">
              <div class="card-header d-flex flex-wrap gap-2 align-items-center">
                <h3 class="card-title mb-0 me-auto">All Orders</h3>
                <div class="input-group input-group-sm" style="width: 16rem">
                  <span class="input-group-text">
                    <i class="bi bi-search" aria-hidden="true"></i>
                  </span>
                  <input
                    type="search"
                    class="form-control"
                    placeholder="Search projects…"
                    aria-label="Search projects"
                  />
                </div>
                <select
                  class="form-select form-select-sm"
                  style="width: 10rem"
                  aria-label="Filter by status"
                >
                  <option value="">All statuses</option>
                  <option>On track</option>
                  <option>At risk</option>
                  <option>Delayed</option>
                  <option>Completed</option>
                </select>
                <button class="btn btn-primary btn-sm" type="button">
                  <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                  New project
                </button>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table align-middle mb-0">
                    <thead>
                      <tr>
                        <th>SrNo#</th>
                        <th>Order Id#</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Order Amount</th>
                        <th>Due</th>
                        <th>Priority</th>
                        <th class="text-end">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                          <a href="#" class="fw-semibold text-decoration-none">
                          {{$order->id}}
                          </a></td>
                        <td>
                          <span class="badge text-bg-success"> {{ucfirst($order->status)}} </span>
                        </td>
                      
                        <td>
                          <div class="d-inline-flex">
                            <span
                              class="rounded-circle d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary fw-semibold"
                              style="
                                width: 1.75rem;
                                height: 1.75rem;
                                font-size: 0.7rem;
                                border: 2px solid var(--bs-body-bg);
                                margin-left: 0;
                              "
                              title="JD"
                            >
                               {{$order->user->name}}</span
                            >
                            
                          </div>
                        </td>
                        <td class="text-nowrap">Rs  {{$order->total_amount}} </td>
                        <td class="text-nowrap">Jun 14, 2026</td>
                        <td>
                          <span class="badge text-bg-danger"> High </span>
                        </td>
                        <td class="text-end">
                          <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-secondary" type="button" title="View">
                            <a href="{{route('admin.orderdetails',$order->id)}}">  <i class="bi bi-eye" aria-hidden="true"></i>
                            </button></a>
                            <button class="btn btn-outline-secondary" type="button" title="Edit">
                              <i class="bi bi-pencil" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-outline-secondary" type="button" title="More">
                              <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <p>No orders Yet</p>
@endforelse
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <small class="text-secondary"> Showing 6 of 6 </small>
                <nav aria-label="Pagination">
                  <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item active">
                      <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item disabled">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </main>
@endsection