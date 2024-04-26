<!DOCTYPE html>
<html>

<head>
</head>

<body>
<script>
    localStorage.removeItem("cart");
    var orderId = new URLSearchParams(window.location.search).get('orderId');
    window.location.href = 'progressbar?orderId=' + orderId; 
</script>
</body>

</html>