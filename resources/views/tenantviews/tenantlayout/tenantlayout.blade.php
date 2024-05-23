<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tenant Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Tenant/css/navbar1.css">
  <link rel="stylesheet" href="Tenant/css/sidebar1.css">
  <link rel="stylesheet" href="Tenant/css/maincontent.css">
</head>
<body>
    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
      <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
          <img src="Tenant/resource/Main_logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top ">
          {{ $tenantName }} Dashboard
        </a>
  
        <!-- Toggler button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- Dropdown menu for profile -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <!-- Dropdown menu for profile -->
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" alt="Profile" class="rounded-circle" width="30" height="30">
            </a>
  
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="{{ route('tenantlogout') }}">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  
    <!-- Content -->
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2 sidebar">
          <div class="list-group">
            <a href="tenantdashboard" class="list-group-item list-group-item-action text-white">Dashboard</a>
            <a href="tenanttourlist" class="list-group-item list-group-item-action text-white">Tourist Spots</a>
            <!-- Add more sidebar links as needed -->
          </div>
        </aside>
        <!-- Main Content -->
        <main class="col-md-9">
          <div class="container">
            @yield('content')
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
