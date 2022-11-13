@extends('layouts.main')
@section('contents')
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="hero"
                    src="https://images.unsplash.com/photo-1588720516255-fc99581c9716?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Hi, I’m Morty. Nice to meet you.
                </h1>
                <p class="mb-8 leading-relaxed">Since beginning my journey as a freelance designer over 22 years ago, I've
                    done remote work for agencies, consulted for startups, and collaborated with talented people to create
                    digital products for both business and consumer use. I'm quietly confident, naturally curious, and
                    perpetually working on improving my chops one design problem at a time.</p>
                <div class="flex justify-center">
                    <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Buy
                        Me A Coffee</button>
                </div>
            </div>
        </div>
    </section>
@endsection
