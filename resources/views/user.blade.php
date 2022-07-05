@extends('layouts.app')

@if (session('statusOrder'))
    <div class="alert alert-success">
        {{ session('statusOrder') }}
    </div>
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <!-- Product Start -->
                <div class="container-fluid pt-5">
                    <div class="text-center mb-4">
                        <h2 class="section-title px-5"><span class="px-2">Eid al-Adha Products</span></h2>
                    </div>
                    <div class="row px-xl-5 pb-3">
                        @foreach ($menu as $m)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid h-100" src="img/{{ $m->foto }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $m->name }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{ 'Rp. '.number_format($m->price, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="" class="btn btn-sm text-dark p-0" data-toggle="modal" data-target="#product-{{ $m->menu_code }}"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                                    <!-- Modal Start -->
                                    <div class="modal fade" id="product-{{ $m->menu_code }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($feedback as $fb)
                                                    @if ($fb->menu_code == $m->menu_code)
                                                        <h1>{{ $fb->name }}</h1>
                                                        <h2>{{ $fb->comment }}</h2>
                                                        <h2>&nbsp;</h2>
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if ($count == 0)
                                                    <h1>NO COMMENT</h1>
                                                @endif

                                                <form action="comment" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="email" value={{ Auth::user()->email }} />
                                                    <input type="hidden" name="menu_code" value={{ $m->menu_code }} />
                                                    <input type="text" name="comment" placeholder="Your Comment" />
                                                    <input type="submit" value="Submit"/>
                                                </form>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->
                                    
                                    <a href="" class="btn btn-sm text-dark p-0" data-toggle="modal" data-target="#order-{{ $m->menu_code }}"><i class="fas fa-shopping-cart text-primary mr-1"></i>Order</a>
                                    <!-- Modal Start -->
                                    <div class="modal fade" id="order-{{ $m->menu_code }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <h2 style="text-align: center; padding: 20px">Are you sure?</h2>
                                                <span style="white-space: nowrap;">
                                                    <a href="order/{{ $m->menu_code }}" style="color:white; margin-right:-4px" class="btn btn-info col-sm-6">Yes</a>
                                                    <button type="button" class="btn btn-danger col-sm-6" data-dismiss="modal">No</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Product End -->
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <style>
                        table {
                            border-collapse: separate !important;
                            border-spacing: 0;
                            width: 100%;
                        }
                        .bordered {
                            border: solid #ccc 1px;
                            -moz-border-radius: 6px;
                            -webkit-border-radius: 6px;
                            border-radius: 6px;
                            -webkit-box-shadow: 0 1px 1px #ccc;
                            -moz-box-shadow: 0 1px 1px #ccc;
                            box-shadow: 0 1px 1px #ccc;
                        }
                        .bordered tr:hover {
                            background: #ECECEC;    
                            -webkit-transition: all 0.1s ease-in-out;
                            -moz-transition: all 0.1s ease-in-out;
                            transition: all 0.1s ease-in-out;
                        }
                        .bordered td, .bordered th {
                            border-left: 1px solid #ccc;
                            border-top: 1px solid #ccc;
                            padding: 10px;
                            text-align: center;
                        }
                        .bordered th {
                            background-color: #ECECEC;
                            background-image: -webkit-gradient(linear, left top, left bottom, from(#F8F8F8), to(#ECECEC));
                            background-image: -webkit-linear-gradient(top, #F8F8F8, #ECECEC);
                            background-image: -moz-linear-gradient(top, #F8F8F8, #ECECEC);    
                            background-image: linear-gradient(top, #F8F8F8, #ECECEC);
                            -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
                            -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;
                            box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
                            border-top: none;
                            text-shadow: 0 1px 0 rgba(255,255,255,.5);
                        }

                        .bordered th:first-child {
                            -moz-border-radius: 6px 0 0 0;
                            -webkit-border-radius: 6px 0 0 0;
                            border-radius: 6px 0 0 0;
                        }
                        .bordered th:last-child {
                            -moz-border-radius: 0 6px 0 0;
                            -webkit-border-radius: 0 6px 0 0;
                            border-radius: 0 6px 0 0;
                        }
                        .bordered th:only-child{
                            -moz-border-radius: 6px 6px 0 0;
                            -webkit-border-radius: 6px 6px 0 0;
                            border-radius: 6px 6px 0 0;
                        }
                        .bordered tr:last-child td:first-child {
                            -moz-border-radius: 0 0 0 6px;
                            -webkit-border-radius: 0 0 0 6px;
                            border-radius: 0 0 0 6px;
                        }
                        .bordered tr:last-child td:last-child {
                            -moz-border-radius: 0 0 6px 0;
                            -webkit-border-radius: 0 0 6px 0;
                            border-radius: 0 0 6px 0;
                        } 
                    </style>

                    <table class="bordered">
                        <tr>
                            <th>Order</th>
                            <th>Fare</th>
                            <th>Instalment</th>
                            <th>Status Payment</th>
                        </tr>

                        @php
                            $first = true;
                        @endphp
                        @foreach($transaction as $t)
                        <tr>
                            <td>{{ $t->order }}</td>
                            <td>{{ 'Rp. '.number_format($t->fare, 0, ',', '.') }}</td>
                            <td>{{ $t->instalment }}</td>
                            @if ($t->status)
                                <td style="background-color:green"><span style="color: white">Completed</span></td>
                            @else
                            <td><span class="text-danger">Uncompleted</span></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
