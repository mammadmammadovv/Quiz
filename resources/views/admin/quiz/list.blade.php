<x-app-layout>
    <x-slot name="header">
       Quizlər
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Quiz əlavə et</a>
            </div>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Status</th>
                    <th scope="col">Son tarix</th>
                    <th scope="col">Əməliyyatlar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->finished_date}}</td>
                        <td class="text-center">
                          <a class="btn btn-sm btn-warning" href="{{route('questions.index',$item->id)}}"><i class="fa fa-question"></i> Suallar</a>
                          <a class="btn btn-sm btn-primary" href="{{route('quizzes.edit',$item->id)}}"><i class="fa fa-edit"></i> Dəyiş</a>
                          <a class="btn btn-sm btn-danger" href="{{route('quizzes.destroy', $item->id)}}"><i class="fa fa-trash"></i> Sil</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{$quizzes->links()}}
        </div>
    </div>
</x-app-layout>