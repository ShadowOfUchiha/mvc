<?php

?>

<div class="flex flex-col w-8/12 m-auto">
    <span class="my-16">
        <h1 class="text-5xl">Create product</h1>
    </span>
    <form id="createform" class="flex flex-col border p-3">
        <label for="product_name">Product name</label>
        <input name="product_name" type="text" class="border border-black p-2 m-2">

        <label for="product_type_code">Product type code</label>
        <input name="product_type_code" type="number" class="border border-black p-2 m-2">

        <label for="supplier_id">Supplier id</label>
        <input name="supplier_id" type="number" class="border border-black p-2 m-2">

        <label for="product_price">Product price</label>
        <input name="product_price" type="number" step="0.01" class="border border-black p-2 m-2">

        <label for="other_product_details">Other product details</label>
        <input name="other_product_details" type="text" class="border border-black p-2 m-2">
    </form>
    <span class="flex flex-row justify-around">
        <button onclick="loadPage('index.php?action=read', sendToContent)" class="p-2 m-2 bg-red-500 text-white rounded">Back</button>
        <button onclick="submitForm('createform', 'index.php?action=create', sendToContent)" class="p-2 m-2 bg-blue-500 text-white rounded">Create</button>
    </span>
</div>

