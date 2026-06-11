<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="{{ route('admin.addCategory') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Name</label>

        <input type="text"
               name="name"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Image</label>

        <input type="file"
               name="image"
               class="form-control">
    </div>

    <button class="btn btn-success">
        Save Category
    </button>

</form>

</body>
</html>