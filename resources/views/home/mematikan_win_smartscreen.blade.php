@extends('layouts.index')

@section('content')
<style>
    body{
       	 background-color: rgba(173, 216, 230, 0.295);
    	}
    ol li{
        margin-bottom:100px;
    }
</style>
    <div class="container shadow-sm p-3 mb-5 bg-body rounded">
        <h2 class="mb-5 text-center">Cara mematikan windows smartscreen di windows 10</h2>

        <ol>
            <li>
                Klik logo windows yang berada pada pojok kiri desktop > lalu klik setting
                <img src="{{asset('img/tutorial/smartscreen/1.png')}}" alt="">
            </li>

            <li>
                Pilih Update & Security <br>
                <img src="{{asset('img/tutorial/smartscreen/2.png')}}" alt="">
            </li>

            <li>
                Pilih Windows Security > pilih App & Browser Control <br>
                <img src="{{asset('img/tutorial/smartscreen/3.png')}}" alt="">
            </li>
            <li>
                Setelah ditampilin ini, klik Reputation-based protection settings <br>
                <img src="{{asset('img/tutorial/smartscreen/4.png')}}" alt="">
            </li>
            <li>
                Non aktifkan Check apps and files, sehingga dari yang awal nya On menjadi Off <br>
                <img src="{{asset('img/tutorial/smartscreen/5.png')}}" alt="">
            </li>
        </ol>
    </div>
@endsection