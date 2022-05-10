<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h2>Form Prodi </h2>
<form action= "{{url('prodi/store')}}"methode="post">
    @call_user_func<div class="form-group">
        <label for="nama">Nama</label>
        <input type= "text" name="nama" id="nama" class="form-control" value="{{old('nama')}}">
        @error('nama')
        <div class="text-danger">{{$message}} </div>
        @enderror
</div>
<button type="submit" class="btn-primary mt-2">Simpan</button>
</form>