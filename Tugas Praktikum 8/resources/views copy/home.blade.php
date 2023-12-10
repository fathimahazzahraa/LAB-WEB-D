@extends('layouts.main')
<style>
    .title-word {
        animation: color-animation 4s linear infinite;
    }

    .title-word-1 {
        --color-1: #DF8453;
        --color-2: #3D8DAE;
        --color-3: #E4A9A8;
    }

    .title-word-2 {
        --color-1: #DBAD4A;
        --color-2: #ACCFCB;
        --color-3: #17494D;
    }

    .title-word-3 {
        --color-1: #ACCFCB;
        --color-2: #E4A9A8;
        --color-3: #ACCFCB;
    }

    .title-word-4 {
        --color-1: #3D8DAE;
        --color-2: #DF8453;
        --color-3: #E4A9A8;
    }

    @keyframes color-animation {
        0% {
            color: var(--color-1)
        }

        32% {
            color: var(--color-1)
        }

        33% {
            color: var(--color-2)
        }

        65% {
            color: var(--color-2)
        }

        66% {
            color: var(--color-3)
        }

        99% {
            color: var(--color-3)
        }

        100% {
            color: var(--color-1)
        }
    }

    /* Here are just some visual styles. 🖌 */


    .title {
        text-align: center;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 50px;
        text-transform: uppercase;
    }
</style>

@section('container')
        <h2 class="title mb-5 mt-5">
            <span class="title-word title-word-1">Selamat</span>
            <span class="title-word title-word-2">Datang</span>
            <span class="title-word title-word-3">di</span>
            <span class="title-word title-word-4">ClassicModels!</span>
        </h2>
    <h5 class="mb-3">Dunia Kendaraan Klasik! Kami adalah sumber utama bagi para pecinta kendaraan klasik yang
        bersemangat. Di
        ClassicModels, kami memahami pesona yang melekat dalam setiap kendaraan klasik. Dari mobil-mobil bersejarah
        hingga
        motor klasik yang ikonik, kami menyajikan koleksi yang memukau untuk memenuhi gairah Anda.</h5>
    <h5 class="mb-3">Kami mengundang Anda untuk menjelajahi koleksi kami yang penuh pesona. Setiap kendaraan klasik
        yang kami tawarkan
        adalah sebuah karya seni yang mewakili keanggunan, desain yang tak tertandingi, dan nilai historis yang tak
        ternilai. Kami bangga menjadi destinasi Anda untuk menemukan kendaraan klasik yang memukau dari berbagai era.
    </h5>
    <h5 class="mb-3">Di ClassicModels, kami memahami bahwa kendaraan klasik adalah lebih dari sekadar alat
        transportasi; mereka adalah
        warisan budaya dan cinta yang abadi akan keindahan. Terima kasih telah bergabung dengan kami dalam perjalanan
        ini.
        Selamat menemukan pesona klasik di dunia kendaraan bersama kami!</h5>
@endsection
