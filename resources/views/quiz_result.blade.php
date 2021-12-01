<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title . ' Quizinin nəticəsi' }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h4>Topladığınız bal: <strong>{{$quiz->myResult->point}}</strong></h4>
            <div class="alert bg-light">
                <i class="fa fa-square"></i>  Sizin cavabınız<br> 
                <i class="fa fa-check text-success"></i> Doğru cavab<br> 
                <i class="fa fa-times text-danger"></i>  Yanlış cavab
            </div>

            @foreach ($quiz->questions as $item)
                @if ($item->correct_answer == $item->myAnswer->answer)
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-times text-danger"></i>
                @endif
                <strong>#{{ $loop->iteration }}</strong> 
                {{ $item->question }} <br>
                @if ($item->image)
                    <img src="{{ asset($item->image) }}" alt="">
                @endif
                <small class="ml-4">Bu suala <strong>{{$item->true_answer_percent}}%</strong> iştirakçı düzgün cavab verib.</small>
                <div class="form-check">
                    @if ('answer1' == $item->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer1' == $item->myAnswer->answer)
                        <i class="fa fa-square"></i>
                    @endif
                    <label for="quiz{{ $item->id }}1" class="form-check-label">{{ $item->answer1 }}</label>
                </div>
                <div class="form-check">
                    @if ('answer2' == $item->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer2' == $item->myAnswer->answer)
                        <i class="fa fa-square"></i>
                    @endif
                    <label for="quiz{{ $item->id }}2" class="form-check-label">{{ $item->answer2 }}</label>
                </div>
                <div class="form-check">
                    @if ('answer3' == $item->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer3' == $item->myAnswer->answer)
                        <i class="fa fa-square"></i>
                    @endif
                    <label for="quiz{{ $item->id }}3" class="form-check-label">{{ $item->answer3 }}</label>
                </div>
                <div class="form-check">
                    @if ('answer4' == $item->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer4' == $item->myAnswer->answer)
                        <i class="fa fa-square"></i>
                    @endif
                    <label for="quiz{{ $item->id }}4" class="form-check-label">{{ $item->answer4 }}</label>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endforeach


        </div>
    </div>

</x-app-layout>
