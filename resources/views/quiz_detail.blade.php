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
                    @if ($quiz->myResult)
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning btn-block">Quiz'ə bax</a>
                    @else
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block">Quiz'ə başla</a>
                    @endif
                </div>
                <div class="col-lg-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sıralamam
                                <span class="badge bg-primary rounded-pill">{{ $quiz->my_rank }}</span>
                            </li>
                        @endif

                        @if ($quiz->myResult)

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Topladığınız bal
                                <span
                                    class="badge bg-primary rounded-pill">{{ $quiz->myResult->point ? $quiz->myResult->point : 'Yoxdur' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Doğru/Yanlış cavablar
                                <div class="float-right">
                                    <span
                                        class="badge bg-success rounded-pill">{{ $quiz->myResult->correct ? $quiz->myResult->correct : 'Yoxdur' }}
                                        doğru</span>
                                    <span
                                        class="badge bg-danger rounded-pill">{{ $quiz->myResult->wrong ? $quiz->myResult->wrong : 'Yoxdur' }}
                                        yanlış</span>
                                </div>
                            </li>
                        @endif

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son giriş tarixi
                            <span title="{{ $quiz->finished_date }}"
                                class="badge bg-secondary rounded-pill">{{ $quiz->finished_date ? $quiz->finished_date->diffForHumans() : 'Qeyd edilməyib' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sual sayı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->questions_count }}</span>
                        </li>
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Quizə qatılanların sayı
                                <span class="badge bg-secondary rounded-pill">{{ $quiz->details['join_count'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama toplanan bal
                                <span class="badge bg-secondary rounded-pill">{{ $quiz->details['average'] }}</span>
                            </li>
                        @endif
                    </ul>

                    @if (count($quiz->topTen) > 0)

                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">İlk 10</h5>
                                <ul class="list-group">
                                    @foreach ($quiz->topTen as $user)
                                        <li class="list-group-item d-flex  justify-content-between align-items-center">
                                            <strong class="h5">{{ $loop->iteration }}.</strong>
                                            <img class="w-8 h-8 rounded-full"
                                                src="{{ $user->user->profile_photo_url }}" alt="">
                                            <span @if (auth()->user()->id == $user->user_id) class="text-success" @endif >{{ $user->user->name }}</span>
                                            <span
                                                class="badge bg-success rounded-pill float-right">{{ $user->point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>

            </div>


        </div>
    </div>

</x-app-layout>
