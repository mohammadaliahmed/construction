<div class="main">

    <div class="card m-3 p-3">
        <h3>Add Product</h3>
        <form enctype="multipart/form-data" method="post">
            @csrf

            <div class="row p-3">
                <div class="col-md-12 mb-2">

                </div>
                <div class="col-12">
                    <div class="card m-2">

                        <center>
                            <img src="{{url('/')}}/images/upload.png" width="150">
                            <h4>Upload images </h4>
                            <input id="image" type="file"  class="form-control w-25 m-4"  onchange="readmultifiles(this.files)" name="image[]" multiple>
                            <div class="row" id="pickedImages">

                            </div>

                        </center>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <label>Product title</label>
                    <input type="text" name="title" class="form-control">

                </div>
                <div class="col-lg-6 col-12">
                    <label>Product subtitle</label>
                    <input type="text" name="subtitle" class="form-control">

                </div>
                <div class="col-12">
                    <label>Product description</label>
                    <textarea type="text" name="description" class="form-control"></textarea>

                </div>
                <div class="col-lg-6 col-12">
                    <label>Product Price</label>
                    <input type="number" name="price" class="form-control">

                </div>
                <div class="col-lg-6 col-12">
                    <label>Product quantity</label>
                    <input type="number" name="quantity" class="form-control">

                </div>
                <hr class="mt-5">
                <h3>Add Variations</h3>
                <div class="col-12" id="variations">

                </div>
                <div class="d-flex justify-content-end mt-5">
                    <button id="addOption" class="btn btn-primary">Add field</button>
                </div>

            </div>

            <div class="card-footer p-4">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success w-50">
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
                var html='<img class="col-2 m-2" src="'+event.target.result+'">';
                $('#pickedImages').append(html);

            };

        }
    }



</script>
</div>
<script>
    var count = 1;
    $("#addOption").click(function () {


        var html = '<div class="row">' +
            '<div class="col-3">' +
            '<label>Key</label>' +
            '<input type="text" name="key' + count + '" class="form-control">' +
            '</div><div class="col-8">' +
            '<label>Value</label>' +
            '<input type="text" name="value' + count + '" class="form-control">' +
            '</div><div class="col-1"><label class="text-white">.</label><br>' +
            '<button class="btn btn-danger">Delete</button></div></div>';

        $("#variations").append(html);
        count++;

    });
</script>
