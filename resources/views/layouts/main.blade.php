<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>Test - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="container-fluid">
	
	@if ($errors->any())
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</div>
				</div>				
			</div>			
		</div>
	@endif

    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
</body>
</html>
