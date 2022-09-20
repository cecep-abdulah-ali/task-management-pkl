<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task-Manager</title>
    {{-- css boostrap --}}
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <main>
      <div class="px-4 py-5 my-5 text-center">
      <img class="d-block mx-auto mb-4" src="images/image2.jpg" alt="" width="72" height="65">
      <h1 class="display-5 fw-bold">Task Manager</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">This application is very simple to use, making it easier for us to organize and manage your tasks. You can collaborate with the team to complete tasks.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-lg px-4 gap-3">Home</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Sign in</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        </div>
        </div>
      </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>