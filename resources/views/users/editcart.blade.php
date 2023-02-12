@extends('layouts.users')
@section('content')
    <div class="container mb-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-8">
                            <div class="col-md-8">
                                <form action="{{ route('users.updatecart',$cart->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <div class="col-md-4">
                                            <label for="Quantity">Quantité</label>
                                            <div class="input-group text-center mb-3" style="width: 130px;">
                                                <input type="number" name="quantity" class="form-control qty-input text-center @error('quantity') is-invalid @enderror" value="{{ $cart->quantity}}" min="1">
                                                @error('qantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="date reserv">Date de réservation</label>
                                            <div class="input-group text-center mb-3" style="width: 200px;">
                                                <input type="datetime-local" name="date_reserv" value="{{ $cart->date_reserv}}" class="form-control qty-input text-center @error('date_reserv') is-invalid @enderror" required>
                                                @error('date_reserv')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary me-3 float-start"><i class="fa fa-shopping-cart "></i> Réserver</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#datetimepicker').data("DateTimePicker").FUNCTION()
        // $(document).ready(function () {
        //     $('.increment-btn').click(function (e) {
        //         e.preventDefault();
        //         var inc_value = $('.qty-input').val();
        //         var value = parseInt(inc_value, 10);
        //         value = isNaN(value) ? 0 : value;
        //         if(value < 10)
        //         {
        //             value++;
        //             $('.qty-input').val(value);
        //         }
        //     });

        // });
    </script>
@endsection
