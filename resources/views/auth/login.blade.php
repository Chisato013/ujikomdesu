@extends("layout.main")
@section("content")
<div class="min-h-screen bg-gray-900 flex items-center justify-center py-12 px-4">
	<div class="max-w-md w-full">
		<div class="bg-gray-800 rounded-2xl shadow-xl p-8">
			<div class="text-center mb-6">
				<h1 class="text-2xl font-bold text-white">Welcome Back</h1>
				<p class="text-sm text-gray-300 mt-1">Please enter your details to sign in.</p>
			</div>

			@if ($errors->any())
				<div class="mb-4">
					@foreach ($errors->all() as $error)
						<div class="text-sm text-red-300 bg-red-900/30 border border-red-800 rounded px-3 py-2 mb-2">
							{{ $error }}
						</div>
					@endforeach
				</div>
			@endif

			<form action="" method="post" class="space-y-4">
				@csrf
				<div>
					<label for="email" class="block text-xs font-medium text-gray-300 mb-1">Email Address</label>
					<input id="email" name="email" type="email" value="{{ old('email') }}" required
						class="w-full px-4 py-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="name@example.com">
				</div>

				<div>
					<div class="flex items-center justify-between mb-1">
						<label for="password" class="text-xs font-medium text-gray-300">Password</label>
						<a href="#" class="text-xs text-indigo-400 hover:underline">Forgot password?</a>
					</div>
					<input id="password" name="password" type="password" required
						class="w-full px-4 py-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your password">
				</div>

				<div class="flex items-center text-sm text-gray-300">
					<input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-500 focus:ring-indigo-500 border-gray-600 rounded bg-gray-700">
					<label for="remember" class="ml-2">Stay signed in for 30 days</label>
				</div>

				<div>
					<button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition">
						Sign In
					</button>
				</div>
			</form>

			<hr class="my-6 border-gray-700">
			</div>
	</div>
</div>
@endsection
