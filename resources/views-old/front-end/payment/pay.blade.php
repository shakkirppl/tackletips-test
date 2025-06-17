<form action="{{ route('payment.initiate') }}" method="post">
    @csrf
    <button type="submit">Pay Now</button>
</form>
