<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000;  margin-top: 20px;">
    <div style="max-width: 680px;margin:auto;">
        <h1 style="text-align: center; margin-top:100px;"> Product Details </h1>
        <table style="border:1px; width: 100%; ">
            <tbody>
                <tr>
                    <th>Product Name</th>
                    <td style="text-transform: capitalize">{{ $product->product_name}}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $product->quantity}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $product->price}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
