@extends('master')
@section('content')

<table class="table">

    <tbody>
      <tr>
        <td>Price</td>
        <td>{{ $total }} Rupees</td>

      </tr>
      <tr>
        <td>Tax: </td>
        <td>0 Rupees</td>
      </tr>
      <tr>
        <td>Delivery</td>
        <td>100</td>
      </tr>

      <tr>
        <td>Total Amount</td>
        <td>{{ $total +100 }}</td>
      </tr>

    </tbody>
  </table>


  <form method="POST" action="orderplace">
    @csrf
    
        <div class="mb-3">
            <textarea name="address" id="" cols="70" rows="5" placeholder="Please Enter The Address Here....."></textarea>
        </div>
    
    <div class="mb-3">
      <label for="" class="form-label">Payment Method</label>
      <p><input type="radio" name="payment" value="onlinepayment"><span>Online Payment</span></p>
      <p><input type="radio" name="payment" value="inspayment"><span>Installment<span></p>
      <p><input type="radio" name="payment" value="cashpayment"><span>Cash On Delivery</span></p>
    </div>
   
    <button type="submit" class="btn btn-primary">Order Now</button>
  </form>

@endsection
