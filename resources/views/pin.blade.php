@extends('layouts.login')

@section('content')
    <div
        x-data="pinInput"
        class="flex flex-col items-center justify-center min-h-screen gap-y-5 text-lg"
    >
        <span>Entrer PIN:</span>

        <!-- Affichage de l'erreur -->
        <div
            x-show="error"
            x-transition
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded"
        >
            <span x-text="errorMessage"></span>
        </div>

        <!-- Cases du PIN -->
        <div class="flex gap-x-3">
            <template x-for="index in maxLength" :key="index">
                <div
                    class="bg-white rounded-lg h-12 w-12 flex items-center justify-center text-lg font-bold"
                    x-text="pin[index-1] || ''"
                ></div>
            </template>
        </div>

        <!-- Clavier numérique -->
        <div
            class="grid grid-cols-3 gap-3 bg-white rounded-lg p-5"
            :class="{ 'pointer-events-none opacity-50': loading }"
        >
            <!-- Chiffres 1-9 -->
            <template x-for="n in 9" :key="n">
                <button
                    @click="addDigit(n)"
                    class="bg-white rounded-lg h-14 w-14 flex items-center justify-center hover:bg-gray-100"
                    x-text="n"
                ></button>
            </template>

            <!-- Case vide -->
            <div class="bg-white rounded-lg h-14 w-14"></div>

            <!-- Bouton 0 -->
            <button
                @click="addDigit(0)"
                class="bg-white rounded-lg h-14 w-14 flex items-center justify-center hover:bg-gray-100"
            >
                0
            </button>

            <!-- Bouton retour -->
            <button
                @click="removeDigit"
                class="bg-white rounded-lg h-14 w-14 flex items-center justify-center hover:bg-gray-100"
            >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 9L11 15M11 9L17 15M2.72 12.96L7.04 18.72C7.392 19.1893 7.568 19.424 7.79105 19.5932C7.9886 19.7432 8.21232 19.855 8.45077 19.9231C8.72 20 9.01334 20 9.6 20H17.2C18.8802 20 19.7202 20 20.362 19.673C20.9265 19.3854 21.3854 18.9265 21.673 18.362C22 17.7202 22 16.8802 22 15.2V8.8C22 7.11984 22 6.27976 21.673 5.63803C21.3854 5.07354 20.9265 4.6146 20.362 4.32698C19.7202 4 18.8802 4 17.2 4H9.6C9.01334 4 8.72 4 8.45077 4.07689C8.21232 4.14499 7.9886 4.25685 7.79105 4.40675C7.568 4.576 7.392 4.81067 7.04 5.28L2.72 11.04C2.46181 11.3843 2.33271 11.5564 2.28294 11.7454C2.23902 11.9123 2.23902 12.0877 2.28294 12.2546C2.33271 12.4436 2.46181 12.6157 2.72 12.96Z" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                </svg>
            </button>
        </div>

        <!-- Indicateur de chargement -->
        <div x-show="loading" class="mt-4">
            <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-blue-500"></div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pinInput', () => ({
                pin: [],
                maxLength: 8,
                error: false,
                errorMessage: '',
                loading: false,

                addDigit(digit) {
                    if (this.pin.length < this.maxLength) {
                        this.pin.push(digit);
                        this.error = false;

                        if (this.pin.length === this.maxLength) {
                            this.verifyPin();
                        }
                    }
                },

                removeDigit() {
                    this.pin = this.pin.slice(0, -1);
                    this.error = false;
                },

                async verifyPin() {
                    this.loading = true;
                        const response = await fetch('/pin/verify', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                pin: this.pin.join('')
                            })
                        });

                        const data = await response.json();

                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            this.error = true;
                            this.errorMessage = data.message || 'Code PIN incorrect';
                            this.pin = [];
                        }

                        this.loading = false;
                }
            }))
        })
    </script>
@endsection
