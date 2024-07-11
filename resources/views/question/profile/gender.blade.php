<div class="flex flex-col gap-y-12 items-center justify-center mx-auto">
    <h2 class="text-4xl font-bold">Apa Jenis Kelaminmu?</h2>
    <span>
        <div class="grid grid-cols-1 md:grid-cols-3 items-stretch justify-stretch gap-4">
            <div class="text-center">
                <input type="radio" name="gender" id="gender-L" value="Pria" class="hidden peer">
                <label for="gender-L"
                    class="inline-flex cursor-pointer w-full h-full p-4 bg-white text-gray-600 border-2 border-white rounded-xl hover:border-light-coral peer-checked:bg-light-coral peer-checked:text-white">
                    <div class="flex flex-col justify-stretch gap-y-4 flex-1 items-center">
                        <img src="{{ asset('assets/male.png') }}" alt="icon" class="aspect-square w-20">
                        <p class="font-semibold">Pria</p>
                    </div>
                </label>
            </div>
            <div class="text-center">
                <input type="radio" name="gender" id="gender-P" value="Wanita" class="hidden peer">
                <label for="gender-P"
                    class="inline-flex cursor-pointer w-full h-full p-4 bg-white text-gray-600 border-2 border-white rounded-xl hover:border-light-coral peer-checked:bg-light-coral peer-checked:text-white">
                    <div class="flex flex-col justify-stretch items-center gap-y-4 flex-1">
                        <img src="{{ asset('assets/female.png') }}" alt="icon" class="aspect-square w-20">
                        <p class="font-semibold">Wanita</p>
                    </div>
                </label>
            </div>
            <div class="text-center">
                <input type="radio" name="gender" id="gender-S" value="Secret" class="hidden peer">
                <label for="gender-S"
                    class="inline-flex cursor-pointer w-full h-full p-4 bg-white text-gray-600 border-2 border-white rounded-xl hover:border-light-coral peer-checked:bg-light-coral peer-checked:text-white">
                    <div class="flex flex-col justify-stretch items-center gap-y-4 flex-1">
                        <img src="{{ asset('assets/sex.png') }}" alt="icon" class="aspect-square w-20">
                        <p class="font-semibold">Memilih untuk tidak memberitahu</p>
                    </div>
                </label>
            </div>
        </div>
        @error('gender')
            <div class="text-sm text-red-500 mt-2 text-center">{{ $message }}</div>
        @enderror
    </span>
</div>
