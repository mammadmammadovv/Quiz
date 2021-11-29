<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>

    <div class="card">
        <div class="card-body">

                <form action="{{route('quiz.result',$quiz->slug)}}" method="POST">
                    @csrf
                @foreach ($quiz->questions as $item)
                    
                <strong>#{{$loop->iteration}}</strong> {{$item->question}}
                @if ($item->image)
                <img src="{{asset($item->image)}}" alt="">
                @endif
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="{{$item->id}}" id="{{$item->id}}1" value="answer1" required>
                    <label for="quiz{{$item->id}}1" class="form-check-label">{{$item->answer1}}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="{{$item->id}}" id="{{$item->id}}2" value="answer2" required>
                    <label for="quiz{{$item->id}}2" class="form-check-label">{{$item->answer2}}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="{{$item->id}}" id="{{$item->id}}3" value="answer3" required>
                    <label for="quiz{{$item->id}}3" class="form-check-label">{{$item->answer3}}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="{{$item->id}}" id="{{$item->id}}4" value="answer4" required>
                    <label for="quiz{{$item->id}}4" class="form-check-label">{{$item->answer4}}</label>
                </div>
                <hr>
                @endforeach

                <button type="submit" class="btn btn-success float-right btn-sm">Quizi bitir</button>
            </form>

        </div>
    </div>

</x-app-layout>
