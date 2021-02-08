<div class="bottom-0 right-0 left-0 mt-12 bg-blue-400 z-20 text-white py-12">
    {{-- <div class="subscribe container text-center w-full">
        <h1 class="text-xl sm:text-2xl">
            Je ungependa kujulishwa kuhusu maendeleo ya
            <span class="font-semibold">Shiwaki</span> ?
        </h1>
 
        <form class="flex justify-center mt-6 mx-6" method="POST" action="{{route('contact')}}">
            @csrf
            <input
                name="email"
                class="rounded-lg pl-3 py-2 sm:py-3 w-4/5 sm:w-1/4 text-gray-800"
                type="email"
                placeholder="Weka barua pepe yako"
            />

            <button
                class="rounded-lg bg-blue-600 shadow -ml-2 z-20 px-6 uppercase font-semibold leading-6"
                type="submit"
            >
                Jiunge
            </button>
        </form>
        
        @error('email')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
        @if (session('message'))
            <span>{{session('message')}}</span>
        @endif
    </div> --}}
    <div
        class="container sm:flex sm:justify-around mt-6 sm:mt-12 border-b border-gray-400 tracking-wide"
    >
        <div class="left sm:w-1/3 pb-6 text-lg">
            <h1 class="text-4xl">Shiwaki</h1>
            <div class="text-base">
                <p>
                    SHIWAKI (Shirika La Waandishi wa Kiswahili) ni muungano wa
                    waandishi wa lugha ya kiswahili. Jukumu kubwa la muungano
                    huu ni kutoa nafasi ya kuonyesha kwa ufasaha kazi za Fasihi
                    kutoka kwa waandishi mbalimbali pamoja na kufasiri kazi
                    zilizo kwenye lugha tofauti.
                </p>
                <p>
                    Ufasiri huu, umelengwa katika kuongeza hadhira ya wasomaji
                    wa nathari na shairi katika lugha ya kiswahili.
                </p>
                <p>
                    SHIWAKI ina malengo ya kuipeleka Fasihi ya Kiswahili duniani
                    kote kutokana na uongezeko wa kuthaminiwa kwa lugha hii
                    ulimwenguni.
                </p>
            </div>
        </div>
        <div class="right text-white mb-6 sm:w-1/3">
            <h1 class="text-4xl">Wasisiliana nasi</h1>
            <div class="text-base text-white">
                <p>
                    Kwa maswala ya kawaida au kutusalimia tu, tuma barua pepe
                    kwa
                    <span class="font-semibold underline"
                        ><a
                            class="hover:text-white text-white"
                            target="_"
                            href="mailto:semanasi@shiwaki.org"
                            >semanasi@shiwaki.org</a
                        ></span
                    >
                </p>
                <p>Unaweza kuwasiliana nasi kupitia njia zifuatazo</p>

                <p>
                    Kuwasilisha malalamiko, tuma ujumbee wako kwa
                    <span class="font-semibold underline "
                        ><a
                            class="hover:text-white text-white"
                            target="_"
                            href="mailto:lalamika@shiwaki.org"
                            >lalamika@shiwaki.org</a
                        ></span
                    >
                </p>
            </div>
            <div class="mt-6">
                <h1 class="text-4xl">Mitandao ya kijamii</h1>
                <div class="text-white leading-6">
                    <p>Tembelea kurasa zetu kwenye mitandao ya kijamii</p>
                    <div class="social mt-1">
                        <span><a href=""><i class="fab 2x text-4xl mr-3 hover:text-white fa-facebook"></i></a></span>
                        <span><a target="_" href="https://twitter.com/Shi_Wa_Ki"><i class="fab 2x text-4xl mr-3 hover:text-white fa-twitter"></i></a></span>
                        <span><a target="_" href="https://www.instagram.com/shi_wa_ki/"><i class="fab 2x text-4xl mr-3 hover:text-white fa-instagram"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-6 mx-auto">
        <div class="text-center text-gray-400">
            <p>&copy; Shiwaki <script>document.write(new Date().getFullYear())</script>. Haki zote zimehifadhiwa.</p>
            <div class="flex justify-center items-center text-base">
                <p>
                    Imesafiniwa na kutengezwa kwa
                    <span class="inline-block text-sm"
                        ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="14"
                            height="13"
                            viewBox="0 0 14 13"
                        >
                            <path
                                fill="#FFF"
                                fill-rule="nonzero"
                                d="M13.59 1.778c-.453-.864-3.295-3.755-6.59.431C3.54-1.977.862.914.41 1.778c-.825 1.596-.33 4.014.823 5.18L7.001 13l5.767-6.043c1.152-1.165 1.647-3.582.823-5.18z"
                            /></svg
                    ></span>
                    na
                    <span
                        ><a
                            class="hover:no-underline hover:text-white underline"
                            href="https://twitter.com/kasule_boy"
                            >Abu Junaid</a
                        ></span
                    >
                </p>
            </div>
        </div>
    </div>
</div>
