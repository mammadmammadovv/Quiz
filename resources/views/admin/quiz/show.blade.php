<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>

    <div class="card">
        <div class="card-body">
                <a  href="{{route('quizzes.index')}}" class="btn btn-secondary"><i class="fas fa-undo"></i> Geri</a>
            <p class="card-text">
            <div class="row">
                <div class="col-lg-8">
                    {{ $quiz->description }}<br>
                    <h4 class="mt-3">Quiz'ə qatılanlar</h4>

                    <table class="table table-bordered mt-2">
                        
                        <thead>
                            
                          <tr>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Topladığı bal</th>
                            <th scope="col">Düzgün cavablar</th>
                            <th scope="col">Yanlış cavablar</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->results as $item)
                            <tr>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->point}}</td>
                                <td>{{$item->correct}}</td>
                                <td>{{$item->wrong}}</td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </p>
                    
                </div>
                <div class="col-lg-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sıralamam
                                <span class="badge bg-primary rounded-pill">{{ $quiz->my_rank }}</span>
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
