<div class="flex flex-col gap-y-12 items-center justify-center mx-auto">
    <h2 class="text-4xl font-bold">Berapa Umurmu Sekarang?</h2>
    <div>
        <input type="number" name="age" id="age" placeholder="Umur" min="1" max="99"
            class="text-3xl p-6 text-center border-black border-4 rounded-md w-48" value="{{ session('age') ?? '' }}">
        @error('age')
            <div class="text-sm text-red-500 mt-2 text-center">{{ $message }}</div>
        @enderror
    </div>
    <p class="text-center text-gray-400 text-xl">Tidak perlu malu... dengan umurmu membantu kami lebih
        memahami tentang kulitmu.</p>
</div>
