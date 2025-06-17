<form method="post" name="redirectForm" action="{{ env('CCAVENUE_PAYMENT_URL') }}">
    <input type="hidden" name="encRequest" value="{{ $encryptedData }}">
    <input type="hidden" name="access_code" value="{{ $accessCode }}">
</form>
<script type="text/javascript">
    document.redirectForm.submit();
</script>
