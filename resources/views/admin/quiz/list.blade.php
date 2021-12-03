<x-app-layout>
    <x-slot name="header">
       Quizlər
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title float-right">
                <a href="{{route('quizzes.create')}}" class="btn btn-success "><i class="fa fa-plus"></i> Quiz əlavə et</a>
            </div>

            <form action=""  method="GET" >
              <div class="form-row d-flex">
                <div class="col-lg-2 me-2">
                  <input type="text" name="title" value="{{request()->get('title')}}" id="" placeholder="Quiz adı" class="form-control">
                </div>
                <div class="col-lg-2 me-2">
                  <select name="status" id="" class="form-control" onchange="this.form.submit()">
                  <option value="">Status seçin</option>
                  <option @if(request()->get('status')=='publish') selected @endif value="publish">Aktiv</option>
                  <option @if(request()->get('status')=='passive') selected @endif value="passive">Passiv</option>
                  <option @if(request()->get('status')=='draft') selected @endif value="draft">Qaralama</option>
                  </select>
                </div>
                @if (request()->get('title') || request()->get('status'))
                <div class="col-lg-2">
                  <a href="{{route('quizzes.index')}}" class="btn btn-secondary">Sıfırla</a>
                </div>
            @endif
              </div>
            </form>

           

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sual sayı</th>
                    <th scope="col">Son tarix</th>
                    <th scope="col">Əməliyyatlar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>
                        @switch($item->status)
                            @case('publish')
                            @if (!$item->finished_date)
                            <span class="badge bg-success">Aktiv</span>
                            @elseif($item->finished_date > now())
                            <span class="badge bg-success">Aktiv</span>
                            @else
                            <span class="badge bg-secondary text-white">Vaxtı bitib</span>
                            @endif
                            @break
                            @case('passive')
                                <span class="badge bg-danger">Passiv</span>
                            @break
                            @case('draft')
                                <span style="color: black" class="badge bg-warning">Qaralama</span>
                            @break
                        @endswitch  
                        </td>
                        <td>{{$item->questions_count}}</td>
                        <td>
                          <span title="{{$item->finished_date}}">{{$item->finished_date ? $item->finished_date->diffForHumans() : "-"}}</span>
                        </td>
                        <td class="text-center">
                          <a class="btn btn-sm btn-secondary" href="{{route('quizzes.details',$item->id)}}"><i class="fa fa-info-circle"></i> İnfo</a>
                          <a class="btn btn-sm btn-warning" href="{{route('questions.index',$item->id)}}"><i class="fa fa-question"></i> Suallar</a>
                          <a class="btn btn-sm btn-primary" href="{{route('quizzes.edit',$item->id)}}"><i class="fa fa-edit"></i> Dəyiş</a>
                          <a class="btn btn-sm btn-danger" href="{{route('quizzes.destroy', $item->id)}}"><i class="fa fa-trash"></i> Sil</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{$quizzes->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>