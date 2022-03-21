        @extends('layout.main')
        
        @section('container')

        <h1>Halaman About</h1>
                <h2>Profile</h2>
                <img src="img/{{$image}}" alt="potoibra" width="200px" class="img-thumbnail rounded-circle" >
                <h3>Data Diri: </h3>
                <p>{{$nama}}</p>
                <p>{{$email}}</p>
        @endsection