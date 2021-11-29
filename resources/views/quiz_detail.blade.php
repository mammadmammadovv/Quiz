<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>

    <div class="card">
        <div class="card-body">

            <p class="card-text">
            <div class="row">
                <div class="col-lg-8">
                    {{ $quiz->description }}</p>
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block">Quiz'ə başla</a>
                </div>
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Son giriş tarixi
                            <span title="{{$quiz->finished_date}}" class="badge bg-secondary rounded-pill">{{$quiz->finished_date ? $quiz->finished_date->diffForHumans() : "Qeyd edilməyib"}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sual sayı
                            <span class="badge bg-secondary rounded-pill">{{$quiz->questions_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A second list item
                            <span class="badge bg-secondary rounded-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A third list item
                            <span class="badge bg-secondary rounded-pill">1</span>
                        </li>
                    </ul>
                </div>
                
            </div>
            

        </div>
    </div>

</x-app-layout>
