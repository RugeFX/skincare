<div class="flex flex-col gap-y-12 items-center justify-center mx-auto">
    <h2 class="text-4xl font-bold">Hai, Kami {{ config('app.name') }}! Kalau Kamu?</h2>
    <span>
        <input type="text" name="name" id="name" placeholder="Nama" maxlength="30"
            class="text-3xl p-6 text-center border-black border-4 rounded-md" value="{{ session('name') ?? '' }}">
        @error('name')
            <div class="text-sm text-red-500 mt-2 text-center">{{ $message }}</div>
        @enderror
    </span>
    <p class="text-center text-gray-400 text-xl">Dapatkan analisis kulit dengan
        menjawab beberapa pertanyaan tentang dirimu, gayahidup, dan kondisi kulitmu.</p>
</div>
