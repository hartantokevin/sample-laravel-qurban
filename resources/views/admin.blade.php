@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($user as $u)
                        <a href="?page={{ $i++ }}">{{ $u->name }}</a><span> | </span>
                    @endforeach
                    <br/>
                    <br/>
                    <table class="bordered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Fare</th>
                            <th>Instalment</th>
                            <th>Status Payment</th>
                            <th>Confirmation</th>
                        </tr>

                        @php
                            $first = true;
                            $i = 0;
                        @endphp
                        @foreach($transaction as $t)
                        <tr>
                            @php
                                if($first && $i%10 == 0) {
                                    echo "<td rowspan='10'>".$t->name."</td>";
                                    echo "<td rowspan='10'>".$t->email."</td>";
                                    $first = false;
                                }
                                else if(!$first && $i%10 == 0) {
                                    echo "<td rowspan='10'>".$t->name."</td>";
                                    echo "<td rowspan='10'>".$t->email."</td>";
                                }
                                // echo "<td>".$t->name."</td>";
                                // echo "<td>".$t->email."</td>";
                                // echo "<td>".$i."</td>";
                                $i++;
                            @endphp

                            <td>{{ 'Rp. '.number_format($t->fare, 0, ',', '.') }}</td>
                            <td>{{ $t->instalment }}</td>
                            @if ($t->status)
                                <td style="background-color:green"><span style="color: white">Completed</span></td>
                                <td><a href="updateStatusPayment/{{ $t->email }}/{{ $t->instalment }}" style="color:black" class="btn btn-primary">Undo</a></td>
                            @else
                                <td><span class="text-danger">Uncompleted</span></td>
                                <td><a href="updateStatusPayment/{{ $t->email }}/{{ $t->instalment }}" style="color:black" class="btn btn-primary">Confirm</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    <br/>
                    {{ $transaction->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection