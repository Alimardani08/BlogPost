<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    

    <!-- Styles -->
    <style>
        .post, div > h2{
            border: 2px solid purple;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
        }
        *{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

   
    </style>
</head>

<body>
    
    @auth

    
        <p style="font-size: 35px">you are logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        
        
        <div class="post">
                <h3>create new post</h3>
                <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="title">
                <textarea name="body" placeholder="body content...."></textarea>
                <button >Create Post</button>
                </form>
        </div>
        
        <div class="post">
            <div class="posts">
                <h3>All posts</h3>
                @foreach ($posts as $post)
                <div class="posts" style="background-color: rgba(33, 128, 154, 0.63) ; padding : 10px ; margin : 10px ; border-radius: 10px; ">
                    <h4>{{$post['title']}} by {{$post->user->name}}</h4>
                    <p>{{$post['body']}}</p>    
                    {{-- <p><a href="/edit-post/{{$post->getKey()}}">Edit</a></p>    --}}
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>


                    {{-- <form action="/delete-post/{{$post->getKey()}}" method="POST"> --}}
                    <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
                </div>

                @endforeach
            </div>
        </div>      


    @else
      
        <div>   
        <h2>
            <p>register</p>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button type="submit">register</button>
            </form>
        </h2>
       </div>
       <div>
        <h2>
            <p>login</p>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <button type="submit">Login</button>
            </form>
        </h2>
       </div>
    @endauth
</body>
</html>