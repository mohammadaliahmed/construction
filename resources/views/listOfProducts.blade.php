<div class="main">
    <div class="card m-3 p-3">
        <div class="d-flex justify-content-between">
            <h2>List of products</h2>
            <a href="{{url('/')}}/products/addProduct">
                <button class="btn btn-primary">Add Product</button>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Subtitle</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $counter=1;
            @endphp
            @foreach($Products as $Product)
                <tr>
                    <th scope="row">{{$counter}}</th>
                    <td><img width="60" src="{{url('/').'/'.$Product->images[0]->url}}"></td>
                    <td>{{$Product->title}}</td>
                    <td>{{$Product->subtitle}}</td>
                    <td>Rs. {{$Product->price}}</td>
                    <td>{{$Product->status}}</td>
                    <td>
                        <a href="{{url('/').'/products/editProduct/'.$Product->id}}"><i class="bi bi-pencil-square m-2"></i>
                        </a>
                        <a href="{{url('/').'/products/editProduct/'.$Product->id}}"><i class="bi bi-eye-fill m-2"></i>
                        </a>
                    </td>
                </tr>
                @php
                    $counter++;
                @endphp
            @endforeach


            </tbody>
        </table>
    </div>

</div>
