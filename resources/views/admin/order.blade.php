<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap 5.3 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    

    @section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Order List</h1>

        @foreach ($users as $user)
            @if($user->role !== 'admin' && $user->orders->count())
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <strong>User:</strong> {{ $user->name }} ({{ $user->email }})
                    </div>

                    <div class="card-body">
                        @foreach ($user->orders as $order)
                            <div class="border rounded p-3 mb-3">
                                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                <p><strong>Name:</strong> {{ $order->name }}</p>
                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                <p><strong>Number:</strong> {{ $order->number }}</p>
                                <p><strong>Address:</strong> {{ $order->address }}</p>
                                <p><strong>Payment Method:</strong> {{ $order->payment }}</p>
                                <p><strong>Product Id:</strong> {{ $product->name }}</p>
                                <p><strong>Status:</strong> 
                                    <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : 'success' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </p>
                                <p><strong>Date:</strong> {{ $order->created_at ? $order->created_at->format('Y-m-d') : 'No date' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        @if($users->where('role', '!=', 'admin')->count() === 0)
            <div class="alert alert-info">No users with orders found.</div>
        @endif
    </div>


</body>
</html>