<div class="transaction-list table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">{{ __('Date') }}</th>
            <th scope="col">{{ __('Gateway') }}</th>
            <th scope="col">{{ __('Amount') }}</th>
            <th scope="col">{{ __('Type') }}</th>
            <th scope="col">{{ __('Status') }}</th>
            <th scope="col">{{ __('Trx Id') }}</th>
        </tr>
        </thead>
        <tbody>


        @if($transactions->isEmpty())
            <tr class="centered">
                <td colspan="12">
                    {{ __('No Data Found') }}
                </td>
            </tr>
        @else
            @foreach($transactions as $transaction)

                @php
                    $currency = \App\Models\Wallet::where('name',$transaction->wallet_name)->first()->currency ?? ''
                @endphp

                <tr class="trn-model" data-toggle="modal" data-target="#exampleModalCenter-{{$transaction->id}}"
                    data-item="{!! $transaction->id !!}">
                    <td><span>{{$transaction->created_at->diffForHumans()}}</span></td>
                    <td>
                        <strong>{{ ucwords($transaction->gateway)  }}</strong>
                    </td>
                    <td><strong class="{{amount_status($transaction->type)}}">{{ amount_status($transaction->type) == 'cl-primary' ? '+' : '-'}}  {{ $transaction->amount . ' '. $currency  }}</strong></td>
                    <td> <strong>{{ underscoreToCamelCase($transaction->type) }}</strong> </td>
                    <td><i class="{{ status_class($transaction->status) }}" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="{{ ucwords($transaction->status == 'fail' ? 'Failed' : $transaction->status) }}"></i></td>
                    <td><strong class="cl-blue">{{$transaction->trxid}}</strong></td>
                </tr>

                <div class="modal fade" id="exampleModalCenter-{{$transaction->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="row no-gutters">
                                <div class="col-sm-5 d-flex justify-content-center blue-bg-2 py-4">
                                    <div class="transaction-modal-left my-auto centered">
                                        <div class="mb-30"><i class="flaticon-006-wallet"></i></div>
                                        <h3 class="my-3">{{ $transaction->description }}</h3>
                                        <h4 class="{{amount_status($transaction->type)}} my-4">{{ amount_status($transaction->type) == 'cl-primary' ? '+' : '-'}}  {{ $transaction->amount . ' '. $currency  }}</h4>
                                        <p>{{$transaction->created_at->diffForHumans()}}</p>
                                        <div class="{{$transaction->status}}">{{  ucwords($transaction->status == 'fail' ? 'Failed' : $transaction->status) }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="exampleModalCenterTitle">{{ __('Transaction Details') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="transaction-modal-details">
                                        <div class="faq-contents">
                                            <ul class="accordion">
                                                <li>
                                                    <a class="active" href="" > {{ __('Transaction details') }}</a>
                                                    <p  class="d-block">
                                                        <strong>{{ __('Transaction ID') }}</strong>
                                                        <br><span>{{$transaction->trxid}}</span><br><br>
                                                        <strong>{{ __('Currency') }}</strong><br>
                                                        <span>{{$currency}}</span><br><br>

                                                        <strong>{{ __('Description') }}</strong>
                                                        <br><span>{{$transaction->description}}</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /Transaction Details Modal -->
                </div>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="mt-20">
        <nav aria-label="Page navigation example">

            <div class="pagination justify-content-center">
                {{ $transactions->links() }}
            </div>
        </nav>
    </div>


</div>
