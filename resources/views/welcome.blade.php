@extends('layouts.app')

@section('content')

    <div class="text-sm flex items-center justify-between bg-[#89C64D]  px-3.5 lg:px-36 py-1.5">
        <span>Bienvenue {{ session()->get('client')->name }}</span>
        <div class="flex items-center space-x-4">
            <span>{{ session()->get('client')->identifier }}</span>
            <span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M16 17L21 12M21 12L16 7M21 12H9M9 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21H9" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
 </svg>
          </span>
        </div>
    </div>
    <nav class="flex items-center justify-between bg-white py-2.5  px-3.5 lg:px-36">
        <Image src="/logo.png" alt="logo" height={150} width={150} class="max-w-[140px] h-auto" />
        <div class="flex items-center gap-x-8">
            <a href="/my" class="text-lg font-semibold">ACCUEIL</a>
        </div>
    </nav>
    <div class="flex flex-col px-4 lg:px-48 py-5">
        <div class="flex items-center space-x-3 mt-3">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.7453 16C18.5362 14.8661 19 13.4872 19 12C19 11.4851 18.9444 10.9832 18.8389 10.5M6.25469 16C5.46381 14.8662 5 13.4872 5 12C5 8.13401 8.13401 5 12 5C12.4221 5 12.8355 5.03737 13.2371 5.10897M16.4999 7.5L11.9999 12M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
            <span class="text-xl font-bold">Accueil</span>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-7">
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-5 bg-white rounded-2xl p-7">
                 @if (session()->get('client')->operation_active)
                    <div class="flex flex-col justify-center space-y-1">
                        <span class="text-sm font-semibold text-[#6b9046]">Total de l&apos;opération</span>
                        <span class="text-lg font-bold font-sans">{{ session()->get('client')->operation_total }} €</span>
                    </div>
                @else
                    <div class="flex flex-col justify-center space-y-1">
                        <span class="text-sm font-semibold text-gray-600">Total de l&apos;opération</span>
                        <span class="text-lg font-bold font-sans text-gray-400">En attente</span>
                        <span class="font-bold font-sans text-gray-400">{{ session()->get('client')->operation_total }} €</span>
                    </div>
                @endif


                     @if (session()->get('client')->apport_active)
                         <div class="flex flex-col justify-center space-y-1">
                             <span class="text-sm font-semibold text-[#6b9046]">Montant de l'apport</span>
                             <span class="text-lg font-bold font-sans">{{ session()->get('client')->apport_total }} €</span>
                         </div>
                     @else
                         <div class="flex flex-col justify-center space-y-1">
                             <span class="text-sm font-semibold text-gray-600">Montant de l'apport</span>
                             <span class="text-lg font-bold font-sans text-gray-400">En attente</span>
                             <span class="font-bold font-sans text-gray-400">{{ session()->get('client')->apport_total }} €</span>
                         </div>
                     @endif

                     @if (session()->get('client')->financing_active)
                         <div class="flex flex-col justify-center space-y-1">
                             <span class="text-sm font-semibold text-[#6b9046]">Montant du financement</span>
                             <span class="text-lg font-bold font-sans">{{ session()->get('client')->financing_total }} €</span>
                         </div>
                     @else
                         <div class="flex flex-col justify-center space-y-1">
                             <span class="text-sm font-semibold text-gray-600">Montant du financement</span>
                             <span class="text-lg font-bold font-sans text-gray-400">En attente</span>
                             <span class="font-bold font-sans text-gray-400">{{ session()->get('client')->financing_total }} €</span>
                         </div>
                     @endif
            </div>

            <div class="flex flex-col justify-center space-y-4 bg-white rounded-2xl p-7">
                <span class="text-sm font-semibold text-[#6b9046]">Votre gestionnaire Fortuneo</span>
                <div class="flex items-center space-x-3">
                    <img src="/logo.png" alt="avatar" height={50} width={50} class="w-12 h-auto" />
                    <div class="flex flex-col -space-y-1">
                        <span class="text-lg font-bold">{{ session()->get('client')->administrative_name }}</span>
                        <span class="font-sans text-[#6b9046] font-bold">{{ session()->get('client')->administrative_phone }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex justify-between items-center space-y-4 bg-white rounded-2xl px-7 py-14 mt-10 overflow-hidden ">
            <div class="flex flex-col">
                <span class="text-xl font-bold uppercase">Compte Titre Immobilier</span>
                <span class="text-sm">Maximisez vos revenus grâce à une gestion avisée !</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-7">
            <div class="col-span-2 flex flex-col justify-center space-y-4 bg-white rounded-2xl p-7">
                <span class="text-sm font-semibold text-[#6b9046]">Votre relevé d&apos;identité bancaire</span>
                <div class="flex flex-col">
                    <span class="flex items-center space-x-1"><span>TITULAIRE:</span> <span class="text-sm">{{ session()->get('client')->name }}</span></span>
                    <span class="flex items-center space-x-1"><span>IBAN:</span> <span class="text-sm">{{ session()->get('client')->iban }}</span></span>
                    <span class="flex items-center space-x-1"><span>SWIFT/BIC:</span> <span class="text-sm">{{ session()->get('client')->bic }}</span></span>
                    <span class="flex items-center space-x-1"><span>ADRESSE:</span> <span class="text-sm">{{ session()->get('client')->address }}</span></span>
                </div>
            </div>

            <div class="flex flex-col justify-center bg-white rounded-2xl p-7">
                <span class="text-sm font-semibold text-[#6b9046]">Mon offres de prêt</span>
                <p class="text-xs text-gray-500 mb-3">Vous pouvez voir notre offre en cliquant sur le bouton ci-dessous</p>
                <div class="flex items-center justify-center">
                    <a target="_blank" href="/{{ session()->get('client')->document }}" class="flex border border-[#6b9046] text-[#6b9046] py-1.5 px-5 rounded-lg hover:bg-[#6b9046] hover:text-white text-sm">Voir</a>
                </div>
            </div>
        </div>

        <script></script>
    </div>
@endsection
