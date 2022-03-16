<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=d, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <div class="container">
         @foreach ($user as $users)
             <h1>
                 {{ $users->role->role_name }}
             </h1>
         @endforeach
    </div>
    <div class="container">
        @foreach ($perm as $role )
            <h3>
                {{ getPermissionById($role)->permission_name }} 
            </h3>
        @endforeach
    </div> --}}

    <div class="container">
         @foreach (permissionModule() as $index => $permission )
         <h1>{{ $index }}</h1>
         <h3>
            @foreach ($permission as $value )
                <h4>{{ $value }}</h4>
            @endforeach
        </h3>
         @endforeach

    </div>
</body>
</html>