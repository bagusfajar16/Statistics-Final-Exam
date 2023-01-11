<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-5">
      <h1 class="text-center mb-5">Number Data</h1>
      <a href="{{ route ('hitung.index') }}" class="btn btn-primary mb-3">See Data</a>
      <div class="card">
        <div class="card-body">
            <form action="{{ route ('hitung.update', $hitung->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $hitung->name }}" id="name">
                </div>
                <div class="mb-3">
                    <label for="Number" class="form-label">Number</label>
                    <input type="text" class="form-control" name="number" value="{{ $hitung->number }}" id="number">
                </div>
                <button type="submit" class="btn btn-primary float-end">Save Changes</button>
            </form>
        </div>
      </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>