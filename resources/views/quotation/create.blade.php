<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>quote</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
</head>
<body>
    <form method="POST" action="/quotation">
        @csrf
        <h1 class="heading is-1">Create a Quotation</h1>

        <div class="field">
            <label class="label" for="product_image">Picture</label>

            <div class="control">
                <input type="text" class="input" name="product_image" placeholder="Picture">
            </div>
        </div>
        <div class="field">
            <label class="label" for="quantity">Quantity</label>

            <div class="control">
                <input type="text" class="input" name="quantity" placeholder="Quantity">
            </div>
        </div>
        <div class="field">
            <label class="label" for="shipping_method">Shipping Method</label>

            <div class="control">
                <div class="select is-primary">
                  <select name="shipping_method">
                    <option value="air">By Air</option>
                    <option value="ship">By Ship</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create</button>
            </div>
        </div>

    </form>
</body>
</html>
