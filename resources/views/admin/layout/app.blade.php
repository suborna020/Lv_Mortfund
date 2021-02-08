<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
   @include('admin.layout.components.header')

   @yield('content')

   @include('admin.layout.components.footer')
</body>
</html>