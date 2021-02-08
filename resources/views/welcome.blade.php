@extends('layouts.app') 

@section('content')
<div class="">
    <div class="slider py-8 bg-white" styles="height:450px; opacity:.3; background:url('{{asset('/images/banner_new.jpeg')}}') center/cover no-repeat">
        <div class="main-carousel h-full" data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'>
            @foreach ($slider_poems as $poem)
            <a
                href="{{route('show-poem',$poem->slug)}}"
                class="carousel-cell no-underline hover:no-underline w-full sm:w-1/3 mx-1 px-2  my-2"
            >
                @include('includes.poems._poem-card')
            </a>
            @endforeach
        </div>
    </div>
</div>

<div class="container p-3">
    <div class="news border-b border-blue-200 border-dashed">
        <div class="flex justify-between">
            <h1 class="text-blue-400 mt-2 sm:ml-8 text-2xl">Habari</h1>
            <a
                class="hidden sm:block text-lg text-gray-600 shadow mt-2 sm:mr-8 hover:no-underline bg-green-400 px-4 text-white rounded-full py-1 text-center text-xl font-semibold"
                href="{{route('articles')}}
            
            "
                >Habari zaidi</a
            >
        </div>

        <div
            class="sm:px-6 lg:px-8 mx-w-lg mx-auto py-6 grid gap-4 lg:grid-cols-3 lg:mx-w-none hover:translate-x-2"
        >
            @foreach ($articles as $article)
            <a
                href="{{route('show-article',$article->slug)}}"
                class="no-underline hover:no-underline"
            >
                @include('includes.articles._article-card')
            </a>
            @endforeach
            <a
                class="sm:hidden text-lg text-gray-600 shadow mt-2 sm:mr-8 hover:no-underline bg-green-400 px-4 text-white rounded-full py-1 text-center text-xl font-semibold pb-1"
                href="{{route('articles')}}
            
            "
                >Habari zaidi</a
            >
        </div>
    </div>
    <!-- Stories come here-->

    <div class="stories border-b border-blue-200 border-dashed mt-4">
        <div class="flex justify-between">
            <h1 class="text-blue-400 mt-2 sm:ml-8 text-2xl">Hadithi</h1>
            <a
                class="hidden sm:block text-lg text-gray-600 shadow mt-2 sm:mr-8 hover:no-underline bg-blue-400 px-4 text-white rounded-full py-1 text-center text-xl font-semibold"
                href="{{route('stories')}}
            
            "
                >Hadithi zaidi</a
            >
        </div>

        <div
            class="sm:px-6 lg:px-8 mx-w-lg mx-auto py-6 grid gap-4 lg:grid-cols-3 lg:mx-w-none hover:translate-x-2"
        >
            @foreach ($stories as $story)
            <a
                href="{{route('show-story',$story->slug)}}"
                class="no-underline hover:no-underline"
            >
                @include('includes.stories._story-card')
            </a>
            @endforeach
            <a
                class="sm:hidden text-gray-600 shadow mt-2 sm:mr-8 hover:no-underline bg-blue-400 px-4 text-white rounded-full py-1 text-center text-xl font-semibold pb-1"
                href="{{route('stories')}}
            
            "
                >Hadithi zaidi</a
            >
        </div>
    </div>
    
    <!-- Reviews come here-->
    <div class="reviews border-b border-blue-200 border-dashed mt-4">
        <div class="flex justify-between">
            <h1 class="text-blue-400 mt-2 sm:ml-8 text-2xl">Makala</h1>
            <a
                class="hidden sm:block text-lg text-gray-600 shadow mt-2 sm:mr-8 hover:no-underline bg-indigo-400 px-4 text-white rounded-full py-1 text-center text-xl font-semibold"
                href="{{route('reviews')}}
            
            "
                >Makala zaidi</a
            >
        </div>

        <div
            class="sm:px-6 lg:px-8 mx-w-lg mx-auto py-6 grid gap-4 lg:grid-cols-3 lg:mx-w-none hover:translate-x-2"
        >
            @foreach ($reviews as $review)
            <a
                href="{{route('show-review',$review->slug)}}"
                class="no-underline hover:no-underline"
            >
                @include('includes.reviews._review-card')
            </a>
            @endforeach
            <a
                class="sm:hidden text-lg text-gray-600 shadow mt-2 sm:mr-8 hover:no-underline bg-indigo-400 px-4 text-white rounded-full py-1 text-center text-xl font-semibold pb-1"
                href="{{route('reviews')}}
            
            "
                >Makala zaidi</a
            >
        </div>
    </div>
</div>

<div class="container">
    <div class="rounded overflow-hidden bg-white my-6 shadow-sm">
        <h1 class="py-6 text-center text-lg text-gray-800">
            Wanachosema wadau wa Kiswahili kuhusu <span>Shiwaki</span>
        </h1>
        <div class="bg-blue-300 sm:flex p-3 mt-6">
            <div
                class="-md:ml-32 sm:w-1/3 flex flex-col items-center relative py-12"
            >
                <div class="avatar text-center">
                    <img
                        class="z-40 absolute rounded-full text-cente border-4 object-cover border-white w-20 h-20"
                        src="{{asset('images/testimonials/lubna.jpeg')}}"
                        alt=""
                        style="top:1%; left: 38%;"
                    />
                </div>
                <div class="bg-white rounded-lg px-3 py-12 z-0 shadow flex-1">
                    <div class="quote text-gray-700 h-ful">
                        <blockquote class="text-base">
                            <i
                                class="fas text-sm text-gray-400 fa-quote-left"
                            ></i>
                            Uandishi wa Kiswahili umekuwa ukiwachwa nyuma kwa
                            muda mrefu sana. Talanta zimeenda patupu na nafasi
                            za kujikuza zimekuwa nadra. Ni kwa sababu kama hizi
                            ndio chama cha SHIWAKI kimeungwa; ili kuwaleta
                            pamoja waandishi wa Kiswahili, kuwapa nafasi
                            wanazostahili, kuwapa mwelekeo mwafaka na kuwapa
                            motisha kuendelea kutumia lugha hii tamu. Kwa
                            hakika, ni jambo la busara sana na linalohitajika.
                            <i
                                class="fas text-sm text-gray-400 fa-quote-right"
                            ></i>
                        </blockquote>
                    </div>
                    <div
                        class="text-center mt-16 border-t border-green-300 pt-3"
                    >
                        <p class="text-xl text-gray-700">Lubnah Abdulhalim</p>

                        <p class="text-base text-gray-600 italic font-semibold">
                            Mwanzilishi
                        </p>
                        <p>
                            <a
                                class="text-blue-300 text-sm hover:no-underline hover:text-blue-300"
                                href="http://creativewritersleague.co.ke/"
                                >Creative Writers League</a
                            >
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="sm:w-1/3 flex relative flex-col items-center relative py-12 sm:ml-3"
            >
                <div class="avatar text-center">
                    <img
                        class="z-40 absolute rounded-full text-cente border-4 object-cover border-white w-20 h-20"
                        src="{{asset('images/testimonials/abu.jpeg')}}"
                        alt=""
                        style="top:1%; left: 38%;"
                    />
                </div>
                <div class="bg-white rounded-lg px-3 py-12 z-0 shadow flex-1">
                    <div class="quote text-gray-700 h-ful">
                        <blockquote class="text-base mb-3">
                            <i
                                class="fas text-sm text-gray-400 fa-quote-left"
                            ></i>
                            Kuanzishwa kwa SHIWAKI, muungano wa waandishi wa
                            lugha ya Kiswahili ni jambo muhimu sana katika
                            kukuza lugha pamoja na kukithirisha ubunifu katika
                            Pwani. Kiswahili ni lugha adheem ambayo imependwa
                            sana duniani na kuwepo kwa SHIWAKI ni jambo la kutia
                            moyo tikizingatia namna lugha inaweza kutumika
                            kuunganisha jamii duniani.
                            <i
                                class="fas text-sm text-gray-400 fa-quote-right"
                            ></i>
                        </blockquote>
                    </div>
                    <div
                        class="text-center sm:mt-24 border-t border-green-300 pt-3"
                    >
                        <p class="text-xl text-gray-700">Abu Amirah</p>

                        <p class="text-base text-gray-600 italic font-semibold">
                            Mhariri Mkuu
                        </p>
                        <p>
                            <a
                                class="text-blue-300 text-sm hover:no-underline hover:text-blue-300"
                                href="https://hekaya.co.ke/"
                                >Hekaya Arts Initiative</a
                            >
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="sm:w-1/3 flex flex-col items-center relative py-12 sm:ml-3"
            >
                <div class="avatar text-center">
                    <img
                        class="z-40 absolute rounded-full text-cente border-4 object-cover border-white w-20 h-20"
                        src="{{asset('images/testimonials/zukiswa.jpeg')}}"
                        alt=""
                        style="top:1%; left: 38%;"
                    />
                </div>
                <div class="bg-white rounded-lg px-3 py-12 z-0 shadow flex-1">
                    <div class="quote text-gray-700 h-ful">
                        <blockquote class="text-base mb-3">
                            <i
                                class="fas text-sm text-gray-400 fa-quote-left"
                            ></i>
                            Kuanzwa kwa SHIWAKI, muungano wa waandishi wa lugha
                            ya Kiswahili ni jambo ambalo limekuwa likisubiriwa
                            kwa mda mrefu sana. Kuweko kwa shirika hili
                            kunaonyesha kwa uwazi kuwa tuna waandishi vijana
                            wanaoukuza uandishi kutumia lugha zetu. Shirika hili
                            pia litafungua milango mengi ikiwemo uandishi wa
                            lugha ya Kiswahili na pia Kiswahili cha Pwani
                            hususan tukiangazia kwenye Sanaa na Miradi ya
                            kufasiri kazi zisizo katika lugha ya Kiswahili..
                            <i
                                class="fas text-sm text-gray-400 fa-quote-right"
                            ></i>
                        </blockquote>
                    </div>
                    <div
                        class="text-center sm:mt-12 border-t border-green-300 pt-3"
                    >
                        <p class="text-xl text-gray-700">Zukiswa Wanner</p>

                        <p class="text-base text-gray-600 italic font-semibold">
                            Mwandishi,Mhariri na mtunzi wa sanaa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
