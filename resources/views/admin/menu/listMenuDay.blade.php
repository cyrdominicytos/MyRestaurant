@extends('admin.layout.mail')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">    
                <h3 class="card-title" style="color: #014463; font-size:25px;font-weight:bold">Liste des Menu</h3>      
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Liste des Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="form-group">
            <label>Choisisez Jour</label>
            <div class="input-group date">
                <select class="form-control select2" style="width: 70%;" name="role">
                  <label for="">Jour</label>
                  <option value="">Lundi</option>
                  <option value="">Mardi</option>
                  <option value="">Mercredi</option>
                  <option value="">Jeudi</option>        
                </select>
          </div>
    </div>
    <style>
        .listMenu h1 {
            font-size: 28px;
            color: #000000;
            font-family: monospace;
            background-image: linear-gradient(to right, rgb(253, 193, 73) , rgb(54, 196, 206));
            /* background-color: rgb(54, 196, 206); */
            text-align: center;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 10px;
            box-shadow: 8px 8px 8px rgb(31, 30, 30);
            
        }
        .listMenu p {
            margin-left: 18px;
            font-family: serif;
            font-weight: 900;
            color: rgb(255, 255, 255);
            
        }
        .row .card-body {
            background-image:url(' {{asset('dist/img/food7.jpg')}}');
            background-size: cover;
        
         
        }
        .row .titre {
            text-align: center;
             color:#017bff;
             font-family: monospace;
             font-weight: bold
        }
        .footer{
            text-align: center;
            color: #000000;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
        }
        
    </style>
    @if (count($result)!=1)
      <div class="row">
        @foreach ($result as $key=>$value)
          <div class="col-md-6 ">
              <div class="card card-info">
                <div class="card-header" style="background-color:#014463">
                    <h3 class="card-title" style="font-size:25px">Restaurant Name</h3>
                  </div>
                  <div class="card-body" style="">
                    <h1 class="titre">Menu {{ metJour($key) }}</h1>
                     <div class=""> 
                       @foreach ($value as $index=>$metvalue)

                        <div class=" listMenu">
                            <h1>{{ metType($index) }}</h1>
                            @foreach ($metvalue as $key1=>$value1)
                            <div class="row">
                                <div class="col-md-9">
                                    <p>{{ $value1->met->met_name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <p>{{ $value1->met->met_price }} </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        @endforeach
                 </div>
                    <h3 class="footer">Bon appétit!!!</h3>
                  </div>
              </div>
              <div class="row" style="margin-left: 15px; margin-bottom:15px">
                  {{-- <div class="col-md-4"><button type="submit" class="btn btn-info">Modifer</button></div> --}}
                  <div class="col-md-4"><a href="#" type="submit" class="btn btn-danger">Supprimer {{ $key }}</a></div>
                  <div class="col-md-4"><a href="#" type="submit" class="btn btn-success">Publier {{ $key }}</a></div>
              </div>
          </div>
          @endforeach

          {{-- Colunm right --}}
      </div>
    </div>
    @else
    <div class="alert alert-info">
        Aucun menu du jour disponible
    </div>
    @endif
</section>

@endsection