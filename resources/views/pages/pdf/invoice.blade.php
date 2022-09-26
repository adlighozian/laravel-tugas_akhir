<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body>
    <div class="container p-2">
        <div class="grid grid-flow-row auto-rows-max">
            <div class="grid grid-cols-2 gap-4">
                <div class="grid grid-flow-row auto-rows-max flex content-center ">
                    <div class="text-5xl font-bold text-green-700">Invoice</div>
                    <div class="text-2xl font-semibold mt-5 text-black">Chawaa Cafe</div>
                    <div class="text-lg text-black">Cipadung Wetan, Panyileukan, Bandung City, West Java 40614</div>
                </div>
                <div class="flex justify-end">
                    <img src="{{ asset('assets/img/logo.jfif') }}" alt="">
                </div>
            </div>
            <div>
                <hr class="border border-gray-500">
            </div>
            <div class="mt-5 grid grid-cols-2 gap-4">
                <div class="grid grid-flow-row auto-rows-max text-lg">
                    <div class="grid grid-cols-6">
                        <div class="col-span-2">Billed To</div>
                        <div>: {{ $name }}</div>
                    </div>
                    <div class="grid grid-cols-6">
                        <div class="col-span-2">Table Number</div>
                        <div>: {{ $table_number }}</div>
                    </div>
                </div>
                <div class="text-end text-xl font-semibold">{{ $date }}</div>
            </div>
            <div class="mt-5">
                <table class="w-full table-fixed text-lg">
                    <tr>
                        <th class="border border-gray-400 " style="width: 10%">No</th>
                        <th class="border border-gray-400" style="width: 50%">Menu</th>
                        <th class="border border-gray-400" style="width: 10%">QTY</th>
                        <th class="border border-gray-400" style="width: 30%">Price</th>
                    </tr>
                    @foreach ($orders as $key => $order)
                    <tr>
                        <td class="text-center border border-gray-400 p-1">{{ $key+1 }}</td>
                        <td class="border border-gray-400 p-1">{{ $order->menu->name }}</td>
                        <td class="text-center border border-gray-400 p-1">{{ $order->total_order }}</td>
                        <td class="text-end border border-gray-400 p-1">Rp. @convert($order->total_price)</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="mt-3 text-end text-2xl font-semibold">
                <span>Total</span>: <span class="text-green-700">Rp. @convert($total)</span>
            </div>
        </div>
    </div>
</body>

</html>
