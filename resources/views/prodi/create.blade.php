<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row pt-4">
            <div class="col">
                <h2>Form Prodi</h2>
                <form action="{{ url('prodi/store') }}" method="post" enctype="multipart/form-data"> 
                    @csrf   
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto">Gambar/Logo</label>
                        <input type="file" name="foto" class="form-control">
                    </div>   
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>