{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
 
  <title>Home</title>
</head>
<body>

  @auth
     <p>Congrats you are Login!</p>

     <form action="/logout" method="POST">
      @csrf
      <button>Log out</button>
    </form>

    <div style="border: 3px solid black">
      <h2>Create a New Post</h2>
      <form action="create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="post title">
        <textarea name="body" placeholder="body content...."></textarea>
        <button>Save Post</button>
      </form>
    </div>

    <div style="border: 3px solid black">
      <h2>All Posts</h2>
      @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
        <h3>{{$post['title']}} by {{$post->user->name}}</h3>
        {{$post['body']}}
        <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
        <form action="/delete-post/{{$post->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button>Delete</button>
        </form>
        </div>
      @endforeach

    </div>

  @else

  <div style="border: 3px solid black">
    <h2>Register</h2>
    
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="email" type="email" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Register</button>
    </form>
  </div>

  <div style="border: 3px solid black">
    <h2>Login</h2>
    
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
      <input name="loginpassword" type="password" placeholder="password">
      <button>Login</button>
    </form>`
  </div>
  @endauth
  
</body>
</html> --}}


<!-- home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
  <title>Home</title>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    @auth
    <p class="text-green-500 mb-4">Congrats you are Login!</p>

    <form action="/logout" method="POST" class="mb-6">
      @csrf
      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Log out
      </button>
    </form>

    <div class="bg-white p-6 rounded-lg shadow mb-6">
      <h2 class="text-2xl font-bold mb-4">Create a New Post</h2>
      <form action="create-post" method="POST">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="title">
            Title
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px -3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="title" placeholder="Post title">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="body">
            Body
          </label>
          <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" name="body" rows="5" placeholder="Body content..."></textarea>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Save Post
        </button>
      </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-2xl font-bold mb-4">All Posts</h2>
      @foreach($posts as $post)
      <div class="bg-gray-200 p-4 rounded mb-4">
        <h3 class="text-xl font-bold">{{$post['title']}} by {{$post->user->name}}</h3>
        <p>{{$post['body']}}</p>
        <div class="flex justify-end">
          <a href="/edit-post/{{$post->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2 focus:outline-none focus:shadow-outline">Edit</a>
          <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>

    @else

    <div class="bg-white p-6 rounded-lg shadow mb-6">
      <h2 class="text-2xl font-bold mb-4">Register</h2>
      <form action="/register" method="POST">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="name">
            Name
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="email">
            Email
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">
            Password
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password">
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Register
        </button>
      </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-2xl font-bold mb-4">Login</h2>
      <form action="/login" method="POST">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="loginname">
            Name
          </label>
          <input class="shadow appearance-none border rounded w-full py-2" name="loginname" type="text" placeholder="name">
          <input class="shadow appearance-none border rounded w-full py-2" name="loginpassword" type="password" placeholder="password">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Login
          </button>
        </form>

     @endauth

        </body>
        </html>