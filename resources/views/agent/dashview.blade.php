@extends('agent.layout.agentmain')
@section('title', 'View Purchase')
@section('section')


    <div class="col-lg-12">
        <div id="barcodeContainer"></div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="add" style="display: flex; align-items: center;">
                    {{-- <h5 class="card-title">TRANSACTION</h5> --}}
                    <div class="btns" style="margin-left: auto;">
                    </div>
                </div>
                <div class="table-responsive">
                    @if (isset($data) && count($data) > 0)

                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>Draw Time</th>
                                    {{-- <th>Username</th> --}}
                                    <th>Qty</th>
                                    <th>Points</th>
                                    <th>WinPoints</th>
                                    <th>Requestid</th>
                                    <th>Barcode</th>

                                    <th>Status</th>
                                    <th>Datetime</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td><b>{{ $user->drawtime }}</b></td>


                                        <td><b>{{ $user->qty }}</b></td>
                                        <td><b>{{ $user->points }}</b></td>
                                        <td><b>{{ $user->winpoints }}</b></td>
                                        <td><b>{{ $user->requestid }}</b></td>
                                        <td><b>{{ $user->barcode }}</b></td>
                                        <td><b>{{ $user->status }}</b></td>
                                        <td><b>{{ $user->created_at->format('d-m-Y H:i') }}</b></td>
                                        <td><button onclick="generateBarcode({{ json_encode($user) }})">view</button></td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="pag mt-4" style="float: right">
                {{ $data->links() }}
               </div> --}}
                    @else
                        <p>No Ticket Purchase</p>
                    @endif
                </div>
            </div>
        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
    <script>
        function generateBarcode(barcodeValue) {
            var containerElement = document.getElementById('barcodeContainer');

            if (containerElement) {
                // Clear previous barcode
                containerElement.innerHTML = '';

                // Generate new barcode
                JsBarcode("#barcodeContainer", "1235", {
                    format: "auto",
                    displayValue: false
                });
            } else {
                console.error('Target element not found.');
            }
        }
    </script>


@endsection
