<x-app-layout>
    <x-slot name="header">
       Əsas səhifə
    </x-slot>

    <div class="row">
        <div class="col-lg-8">
            <div class="list-group">
                @foreach ($quizzes as $item)
                <a href="{{route('quiz_detail', $item->slug)}}" class="list-group-item list-group-item-action mb-3 " aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{$item->title}}</h5>
                      <small>{{$item->finished_date ? "Son tarix: ".$item->finished_date->diffForHumans() : null}}</small>
                    </div>
                    <p class="mb-1">{{Str::limit($item->description,100)}}</p>
                    <small>{{$item->questions_count}} sual</small>
                  </a>
                @endforeach
                {{$quizzes->links()}}
          </div>
        </div>
        <div class="col-lg-4">Test</div>
    </div>
    
</x-app-layout>
