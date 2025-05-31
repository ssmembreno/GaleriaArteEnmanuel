<div class="slider">
    <!-- list Items -->
    <div class="list">
    <div class="item active">
        <img src="{{asset('img/Enmanuel1.jpg')}}" alt="Obra de arte Enmanuel 1 - realismo">
        <div class="content">
            <p>{{__('messages.ART_HOME')}}</p>
            <h2>Enmanuel Membreño</h2>
            <p>
                {{__('messages.SLIDE1')}}
            </p>
        </div>
    </div>
    <div class="item">
        <img src="{{asset('img/Enmanuel2.webp')}}" alt="Obra de arte Enmanuel 2">
        <div class="content">
            <p>{{__('messages.ART_HOME')}}</p>
            <h2>{{__('messages.TITTLE_SLIDE2')}}</h2>
            <p>
                {{__('messages.SLIDE2')}}
            </p>
        </div>
    </div>
    <div class="item">
        <img src="{{asset('img/Enmanuel3.jpg')}}" alt="Obra de arte Enmanuel 3">
        <div class="content">
            <p>{{__('messages.ART_HOME')}}</p>
            <h2>{{__('messages.TITTLE_SLIDE3')}}</h2>
            <p>
                {{__('messages.SLIDE3')}}
            </p>
        </div>
    </div>
</div>
    <!-- button arrows -->
    <div class="arrows">
        <button id="prev" aria-label="Ver obra anterior"><</button>
        <button id="next" aria-label="Ver obra siguiente">></button>
    </div>

    <div class="scroll-down-indicator">
        <i class='fas fa-angle-double-down' style='font-size:40px; color: white'></i>
    </div>

</div>
