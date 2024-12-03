<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-400">Sign in to your account</h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <label for="email" class="block mb-2 text-sm font-medium text-slate-900">Email</label>
                <x-text-input name="email" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-8">
                <label for="password" class="block mb-2 text-sm font-medium text-slate-900">Password</label>
                <x-text-input name="password" type="password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded-sm border border-slate-400" >
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <a class="text-indigo-600 hover:underline">Forget password</a>
                </div>
            </div>

            <x-button class="w-full bg-green-50">Login</x-button>
        </form>
    </x-card>
</x-layout>
