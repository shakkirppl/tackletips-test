
<form method="post" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
    <input type="hidden" name="encRequest" value="{{ $encrypted_data }}">
    <input type="hidden" name="access_code" value="{{ $access_code }}">
    <button type="submit">Pay Now</button>
</form>