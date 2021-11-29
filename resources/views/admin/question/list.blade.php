<x-app-layout>
    <x-slot name="header">
      {{$quiz->title}} Quizinə aid suallar
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between">
                <a href="{{route('quizzes.index')}}" class="btn btn-secondary"><i class="fas fa-undo"></i> Geri</a>
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-success"><i class="fa fa-plus"></i> Sual əlavə et</a>
            </div>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Sual</th>
                    <th scope="col">Şəkil</th>
                    <th scope="col">1. Cavab</th>
                    <th scope="col">2. Cavab</th>
                    <th scope="col">3. Cavab</th>
                    <th scope="col">4. Cavab</th>
                    <th scope="col">Düzgün Cavab</th>
                    <th scope="col">Əməliyyatlar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>@if ($question->image)
                            <a href="{{asset($question->image)}}" target="_blank" class="btn btn-sm btn-light">Bax</a>
                        @endif</td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td>{{substr($question->correct_answer, -1) .". cavab" }}</td>
                        <td class="text-center">
                          <a class="btn btn-sm btn-primary" href="{{route('questions.edit',[$quiz->id , $question->id])}}"><i class="fa fa-edit"></i> Dəyiş</a>
                          <a class="btn btn-sm btn-danger" href="{{route('questions.destroy',[$quiz->id , $question->id])}}"><i class="fa fa-trash"></i> Sil</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              
        </div>
    </div>
</x-app-layout>