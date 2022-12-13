<div class="main">
    <div class="card m-3 p-3">
        <h3>Edit Product</h3>
        <form enctype="multipart/form-data" method="post">
            @csrf
            <div class="row p-3">

                <div class="col-12">
                    <div class="card m-2">
                        <center>
                            <img src="{{url('/')}}/images/upload.png" width="150">
                            <h4>Upload images </h4>
                            <input id="image" type="file" class="form-control w-25 m-4"
                                   onchange="readmultifiles(this.files)" name="image[]" multiple>
                            <div class="row" id="pickedImages">
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <h4>Uploaded images</h4>
                    @foreach($Product->images as $image)
                        <div class="col-2 border">
                            <div class="d-flex justify-content-end">
                                <a href="{{url('/').'/deleteImage/'.$image->id}}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                            <img src="{{url('/').'/'.$image->url}}" width="100" height="100">

                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-12">
                    <label>Product title</label>
                    <input type="text" value="{{$Product->title}}" name="title" class="form-control">

                </div>
                <div class="col-lg-6 col-12">
                    <label>Product subtitle</label>
                    <input type="text" value="{{$Product->subtitle}}" name="subtitle" class="form-control">

                </div>
                <div class="col-12">
                    <label>Product description</label>
                    <textarea type="text" name="description" class="form-control">{{$Product->description}}</textarea>

                </div>
                <div class="col-lg-6 col-12">
                    <label>Product Price</label>
                    <input type="number" value="{{$Product->price}}" name="price" class="form-control">

                </div>
                <div class="col-lg-6 col-12">
                    <label>Product quantity</label>
                    <input type="number" value="{{$Product->quantity}}" name="quantity" class="form-control">

                </div>
                <hr class="mt-5">
                <h3>Add Variations</h3>
                <div class="col-12" id="variations">
                    @php
                        $counter=1;
                    @endphp
                    @foreach($Product->additionalInfo as $additionalInfo)
                        <div id="row{{$counter}}" class="row">
                            <div class="col-3">
                                <label>Key</label>
                                <input value="{{$additionalInfo->key}}" type="text" name="key[]" class="form-control">
                            </div>
                            <div class="col-8">
                                <label>Value</label>
                                <input value="{{$additionalInfo->value}}" type="text" name="value[]" class="form-control">
                            </div>
                            <div class="col-1"><label class="text-white">.</label><br>
                                <view onClick="deleteRow({{$counter}})" class="btn btn-danger">Delete</view>
                            </div>
                        </div>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <view id="addOption" class="btn btn-primary">Add field</view>
                </div>

            </div>

            <div class="card-footer p-4">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success w-50">
                        Save Product
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>
<script type="text/javascript">

    function readmultifiles(files) {
        for (file of files) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.fileName = file.name;
            reader.onload = (event) => {
                var html = '<img class="col-2 m-2" src="' + event.target.result + '">';
                $('#pickedImages').append(html);
            };
        }
    }

</script>
</div>
<script>
    var count = {{sizeof($Product->additionalInfo)+1}};
    var deleteRow = function (value, object) {

        $('#row' + value).remove();
    };
    $("#addOption").click(function () {

        var html = '<div id="row' + count + '" class="row">' +
            '<div class="col-3">' +
            '<label>Key</label>' +
            '<input type="text" name="key[]" class="form-control">' +
            '</div><div class="col-8">' +
            '<label>Value</label>' +
            '<input type="text" name="value[]" class="form-control">' +
            '</div><div class="col-1"><label class="text-white">.</label><br>' +
            '<view  onClick="deleteRow(' + count + ')" class="btn btn-danger">Delete</view></div></div>';

        $("#variations").append(html);
        count++;

    });
</script>
